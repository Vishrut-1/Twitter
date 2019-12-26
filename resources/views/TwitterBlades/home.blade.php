@include('TwitterBlades.nav')

<style>

    .container {
        margin-left: 300px;
        margin-top: 80px;

    }

    textarea {
        border-color: lightgray;
        resize: none;
    }

    .fonts {
        font-size: 17px;
        font-family: 'Nunito', sans-serif;
    }

    .btn-info {
        margin-bottom: 30px;
    }

    .like-btn:hover {
        font-size: 25px;
        color: #6cb2eb;

    }

    .reTweet-btn:hover {
        font-size: 25px;
        color: #6cb2eb;

    }

    .comment-btn:hover {
        font-size: 25px;
        color: #6cb2eb;

    }

    #links {

        font-size: 20px;
        align-content: center;
    }

</style>


<div class="container">

    <form enctype="multipart/form-data" id="TweetForm">
        @csrf
        <input type="hidden" class="form-control" id="user_id" name="user_id">
        <textarea rows="4" cols="80" placeholder="What's Happening ?" name="tweet" id="tweet"></textarea> &nbsp;
        <input type="button" name="submit" id="tweetBtn" value="Tweet" class="btn btn-info">
        <input type="file" name="image" value="file" id="image"><br>
    </form>

    <div class="div">
        @foreach($tweet as  $tweets)
            <div class="fonts">
                <div class="col-lg-7">
                    <div class="card tweet">
                        <div class="card-body ">
                            <a href="{{ route('GetProfile',$tweets->user->id) }}"
                               style=" text-decoration: black; font-size: 20px; color: black"
                               class="tweet-name">{{ $tweets->user->name }}</a>
                            @ {{$tweets->user->name}}<br>
                            @if($tweets->parent_id !=0 )  @ {{$tweets->parent->user->name}} @endif<br><br>
                            <tr class="tweet-content">
                                {{ $tweets->content }}   @if($tweets->parent_id!=0)  {{$tweets->parent->content}} @endif
                            </tr>
                            <span class="tweet-id" data-tweet_id={{$tweets->id}}>
                            </span>
                            <br><br>
                            <img src="{{ url('/public/images') }}/{{$tweets->image}}" alt=""
                                 width="590px" height="300px">

                            @if($tweets->parent_id != 0)

                                <img src="{{ url('/public/images') }}/{{$tweets->parent->image}}"
                                     alt=""
                                     width="590px" height="300px" class="image">

                            @endif<br><br>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <span class="pull" id="changes">
                                <span class="like-btn">
                                    <i id="like" class="glyphicon glyphicon-thumbs-up"
                                       onClick="onLike({{$tweets->id}})"></i>
                                        <p id="like_count" style="display: inline">{{ $tweets->likeCount }}</p>
                                </span>
                                    <span class="like-btn">
                                            <i id="dislike" class=" glyphicon glyphicon-thumbs-down }}"
                                               onClick="onDislike({{$tweets->id}})"></i>
                                        <p id="dislike_count" style="display: inline">{{ $tweets->DislikeCount }}</p>
                                    </span>

                                    <span class="reTweet-btn">
                                        <i id="RetweetBtn" class="fa fa-retweet ReTweetBtn"
                                           data-tweet_id="{{$tweets->id}} "></i>
                                        <p id="retweet_count" style="display: inline">{{$tweets->parent()->count()}}</p>
                                    </span>

                                     <span class="comment-btn">
                                      <i class="far fa-comment-dots commentBtn" data-toggle="modal"> {{$tweets->comments->count()}}</i>
                                    </span>
                            </span><br><br>
                            <br>
                            <button type="button" name="slide" class="btn-info">Comments & Reply</button>

                            @foreach($tweets->comments as $comment)

                                <div class="display-comments"
                                @if($comment->parent_id !=null)  @endif>

                                    <strong>@ {{ $comment->user->name }}</strong><br>
                                    <p>{{$comment->comment}}</p><br>

                                    @if ( $comment->replies )
                                        <div class="align" style="margin-left: 10px;">
                                            @foreach($comment->replies as $rep1)
                                                <p style="background-color:#6cb2eb"> Reply
                                                    :-</p> {{$rep1->user->name}}
                                                : {{ $rep1->comment }}<br>
                                            @endforeach
                                        </div>
                                    @endif
                                    <div class="form-group" id="replytext">
                                        <input type="text" name="comment" class="form-control reply"
                                               placeholder="Reply"><br>
                                        <input type="button" name="replyBtn" class="btn btn-warning ReplyBtn"
                                               data-tweets_id="{{$tweets->id}}"
                                               data-parent_id="{{$comment->id}}"
                                               value="Reply">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Add Comments</h2>
                    <button type="button" class="close"
                            data-dismiss="modal">&times;
                    </button>
                </div>
                <div class="modal-body">

                    <b>
                        <p id="modal-tweet"></p>
                    </b>
                    <br>

                    <p id="modal-tweet-content"></p>

                    <br>

                    <span style="display: none" id="modal-tweet-id"></span>

                    <textarea name="comment" class="comment" cols="30" rows="5"
                              placeholder="Tweet your Reply"></textarea><br>

                    <input type="button" class="formComment"
                           value="Add Comment"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="follow">

        <h2>Who To Follow</h2>

        @foreach($userData  as $users)

            @if($users->id !=null)

                <a href="{{route('GetProfile',$users->id)}}" id="links"><br>{{ $users->name }} </a><br>

            @endif

            @if(count($users->followersAuthUser)===0)

                <button class="btn btn-info FollowBtn" data-user_id="{{$users->id}}" style="margin-bottom: 10px;">
                    Follow
                </button>
            @else
                <button class="btn btn-danger UnFollowBtn" data-user_id="{{$users->id}}"
                        style="margin-bottom: 10px;">
                    UnFollow
                </button>
            @endif


        @endforeach

    </div>
</div>


<script type="text/javascript">

    $(document).ready(function () {

        $(function () {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".btn-info").click(function () {

                $(".display-comments").slideToggle();
            });

            $('.commentBtn').click(function (e) {

                const tweet = $(this).closest('.tweet');
                console.log(tweet);
                const content = tweet.find('.tweet-content').html();
                const name = tweet.find('.tweet-name').html();
                const tweetSpan = tweet.find('.tweet-id').data();
                console.log(tweetSpan);

                $('#modal-tweet-content').html(content);
                $('#modal-tweet').html(name);
                $('#modal-tweet-id').html(tweetSpan['tweet_id']);
                $('#myModal').modal('show');

            });

            $('#tweetBtn').click(function (e) {

                e.preventDefault();

                var myFile1 = $('#image').prop('files');

                var fData = new FormData();

                fData.append('image', myFile1[0]);

                var formValues = $('#TweetForm').serializeArray();

                $.each(formValues, (index, item) => {

                    fData.append(item['name'], item['value']);

                });

                $.ajax({

                    url: "{{route('tweetAdd')}}",
                    type: 'POST',
                    data: fData,
                    contentType: false,
                    processData: false,
                    dataType: "json",

                    success: function (data) {

                        console.log(data);

                    },

                    error: function (data) {

                        console.log('Error:', data);
                    }

                });

            });

        });

        $('.formComment').on('click', function (e) {

            console.log('in modal');

            var tweets_id = $('#modal-tweet-id').html();

            console.log(tweets_id);

            var comment = $(this).parent().find('.comment').val();

            console.log(comment);

            $.ajax({

                url: "{{route('comment')}}",
                data: {tweets_id: tweets_id, comment: comment},
                type: 'POST',
                dataType: 'json',

                success: function (data) {

                    location.reload();
                    console.log(data);

                },

                error: function (data) {
                    console.log(data);
                }

            });

        });
    });

    //Reply On Comment

    $('.ReplyBtn').click(function () {

        var tweets_id = $(this).data('tweets_id');
        console.log(tweets_id);

        var parent_id = $(this).data('parent_id');
        console.log(parent_id);

        var comment = $(this).closest('.display-comments').find('.reply').val();
        console.log(comment);

        $.ajax({

            url: "{{route('comment')}}",
            data: {tweets_id: tweets_id, parent_id: parent_id, comment: comment},
            dataType: 'html',
            type: 'POST',

            success: function (data) {

                location.reload();
                console.log(data);
            },

            error: function () {
                console.log();
            }


        });

    });

    //ReTweet

    $('.ReTweetBtn').click(function () {

        var tweets_id = $(this).data('tweet_id');
        console.log(tweets_id);

        var parent_id = $(this).data('tweet_id');
        console.log(parent_id);

        $.ajax({
            url: "{{route('ReTweet')}}",
            data: {tweets_id: tweets_id, parent_id: parent_id},
            type: 'post',

            success: function (data) {
                console.log(data);
                location.reload();
            },
            error: function (data) {
                console.log(data)
            }

        });

    });

    // Follow User

    $('.FollowBtn').click(function () {

        var user_id = $(this).data('user_id');
        console.log(user_id);

        $.ajax({

            url: "{{route('FollowUser')}}",
            data: {user_id: user_id},
            dataType: 'json',
            type: 'POST',

            success: function (data) {

                location.reload();
                console.log(data);
            },

            error: function (data) {
                console.log(data);
            }


        });
    });

    //UnFollow User

    $('.UnFollowBtn').click(function () {

        var user_id = $(this).data('user_id');
        console.log(user_id);

        $.ajax({

            url: "{{route('UnFollowUser')}}",
            data: {user_id: user_id},
            dataType: 'json',
            type: 'POST',

            success: function (data) {

                location.reload();
                console.log(data);

            },

            error: function (data) {
                console.log(data);
            }

        });
    });

    //LikeDislike

    function onLike($tweet_id) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var count = 0;

        $.ajax({

            url: "{{route('likeData')}}",
            type: 'POST',
            dataType: 'html',
            data: {tweets_id: $tweet_id, like: 1},

            success: function (data) {

                // var oldLike = $("#like_count").text();
                //
                // var newLike = parseInt(oldLike) + 1;
                //
                // $("#like_count").text(newLike);

                location.reload();

                console.log(data);

            },

            error: function (data) {

                console.log('Error:', data);
            }

        });
    }

    //Dislike

    function onDislike($tweet_id) {

        $.ajax({

            url: "{{route('likeData')}}",
            data: {tweets_id: $tweet_id, like: 0},
            dataType: 'html',
            type: 'POST',

            success: function (data) {

                // var oldLike = $("#dislike_count").text();
                // var newLike = parseInt(oldLike) + 1;
                //
                // $("#dislike_count").text(newLike);

                console.log(data);
                location.reload();

            },

            error: function (data) {

                console.log(data);
            }

        });

    }


</script>


