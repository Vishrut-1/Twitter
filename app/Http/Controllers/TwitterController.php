<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Follow;
use App\Models\LikeDislike;
use App\Models\Profile;
use App\Models\Tweet;
use App\Repositories\TwitterRepository;
use App\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Response;


class TwitterController extends Controller
{

    protected $twitterRepository;

    public function __construct(TwitterRepository $twitterRepository)
    {
        $this->twitterRepository = $twitterRepository;
    }

    public function retrieveProfile($id = null)
    {

        $userEdit = false;

        if (is_null($id)) {
            $id = Auth::id();
            $userEdit = true;
        }

        $user = User::where('id', $id)->withCount('followers', 'followings')->get();

        $tweet = Tweet::where('user_id', '=', $id)->withCount([

            'LikeDislike as likeCount' => function ($query) {
                $query->where('like', 1);
            },

            'LikeDislike as DislikeCount' => function ($query) {

                $query->where('like', 0);
            }
        ])->latest()->get();

        return view('TwitterBlades.profile', ['user' => $user, 'tweet' => $tweet, 'edit' => $userEdit]);

    }

    public function destroy($id)
    {
        $tweet = Tweet::find($id)->delete($id);
        dd($tweet);
    }

    public function homeTwitter()
    {

        $tweet = Tweet::with([

            'user',

            'comments' => function ($q) {
                $q->orderBy('created_at', 'desc')->count();

            },

            'replies' => function ($query) {

                $query->where('parent_id', '!=', NUll);
            },

            'parent' => function ($qry) {
                $qry->with('user');
            }

        ])->withCount([

            'LikeDislike as likeCount' => function ($query) {
                $query->where('like', 1);
            },

            'LikeDislike as DislikeCount' => function ($query) {

                $query->where('like', 0);
            },

        ])->latest()->get();


        $userData = User::with('followersAuthUser')->where('id', '!=', Auth::id())->get();
        return view('TwitterBlades.home', ['tweet' => $tweet, 'userData' => $userData]);

    }


    public function fetch()
    {
        $profile = Profile::where('user_id', Auth::id())->first();

        return response()->json($profile);
    }


    public function fetchTweet($id)
    {
        $tweet = Tweet::find($id);

        return response()->json($tweet);

    }

    public function profileAdd(Request $request)
    {
        $data = $request->all();

        if ($request->ajax()) {

            $validator = Validator::make($data, [

                'name' => 'required',
                'bio' => 'required',
                'location' => 'required',
                'display_picture' => 'sometimes|nullable|required',
                'dob' => 'required',

            ]);

            if ($validator->passes()) {

                if ($request->hasFile('display_picture')) {
                    $image = $request->file('display_picture');
                    $fileName = $image->getClientOriginalName();
                    $image->move('public/images', $fileName);

                }

                $Alldata = [

                    'user_id' => Auth::id(),
                    'name' => $data['name'],
                    'bio' => $data['bio'],
                    'location' => $data['location'],
                    'dob' => $data['dob'],
                    'display_picture' => $fileName,

                ];

                $profile = Profile::updateOrCreate(['id' => $data['id']], $Alldata);

                return view('TwitterBlades.profile', ['profile' => $profile]);

            } else {
                return Response::json(['errors' => $validator->errors()]);
            }
        }

    }


    public function postTweet(Request $request)
    {

        $data = $request->all();

        if ($request->ajax()) {

            $validator = validator::make($data, [

                'tweet' => 'required',
                'image' => 'required',

            ]);

            if ($validator->passes()) {

                if ($request->hasFile('image')) {

                    $image1 = $request->file('image');
                    $filename = $image1->getClientOriginalName();
                    $image1->move('public/images', $filename);

                }

                $requestData = [

                    'user_id' => Auth::id(),
                    'content' => $data['tweet'],
                    'image' => $filename,

                ];

                $tweet = Tweet::create($requestData);
                dd($tweet);
                return view('TwitterBlades.profile', ['tweet' => $tweet]);

            } else {

                return Response::json(['errors' => 'Field Required']);

            }
        }
    }

    public function updateTweet(Request $request)
    {

        $data = $request->all();

        if ($request->ajax()) {

            $validator = validator::make($data, [

                'tweet' => 'required|sometimes',
                'image' => 'required|sometimes',

            ]);

            if ($validator->passes()) {

                if ($request->hasFile('image')) {

                    $image1 = $request->file('image');
                    $filename = $image1->getClientOriginalName();
                    $image1->move('public/images', $filename);

                }

                $requestData = [

                    'user_id' => Auth::id(),
                    'content' => $data['tweet'],
                    'image' => $filename,
                ];

                $tweet = Tweet::updateOrCreate(['id' => $data['id']], $requestData);

                dd($tweet);

                return view('TwitterBlades.profile', ['tweet' => $tweet]);

            } else {

                return Response::json(['errors' => $validator->errors()]);

            }
        }
    }


    public function ReTweet(Request $request)
    {
        $data = $request->all();


        $dataToAdd = [

            'user_id' => Auth::id(),
            'content' => null,
            'image' => null,
            'parent_id' => $data['parent_id'],

        ];


        $tweet = Tweet::create($dataToAdd);
        dd($tweet);

    }

    public function LikeDislike(Request $request)
    {
        $data = $request->all();

        $likeInfoToFind = [
            'user_id' => Auth::id(),
            'tweets_id' => $data['tweets_id'],

        ];

        $data = [

            'user_id' => Auth::id(),
            'tweets_id' => $data['tweets_id'],
            'like' => $data['like'],

        ];

        return LikeDislike::updateOrCreate($likeInfoToFind, $data);

    }

    public function follow(Request $request)
    {

        $data = $request->all();

        $user = User::findOrFail($data['user_id']);

        if ($user) {

            $user->followers()->attach(Auth::id());

        }

        $followers = $user->followers()->get();

        return ($followers);

    }

    public function unFollow(Request $request)
    {

        $data = $request->all();

        $user = User::find($data['user_id']);

        if ($user) {

            $user->followers()->detach(Auth::id());

            return redirect()->back()->with('success', 'Successfully unFollowed the user.');
        }

        return $data;

    }


    public function comment(Request $request)
    {
        $data = $request->all();

        if ($request->ajax()) {

            $validator = validator::make($data, [

                'comment' => 'sometimes|required',

            ]);

            if ($validator->passes()) {


                $data['user_id'] = Auth::id();

                $comment = Comment::create($data);

                dd($comment);

            } else {
                return Response::json(['errors' => $validator->errors()]);
            }
        }
        return $data;
    }

}
