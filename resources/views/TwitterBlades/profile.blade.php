@include('TwitterBlades.nav')

<style>

    .container {
        margin-left: 250px;
    }

    .modal-body {

        padding: 25px;
        height: 100%;
        /*overflow-y: auto;*/
        max-height: calc(100vh - 200px);
        overflow-y: auto;
    }

    .fonts {

        font-family: 'Nunito', sans-serif;
        font-size: 15px;
        padding: 10px;
    }

    body {
        padding: 2rem 0rem;
    }

    .avatar {
        border: 0.3rem solid rgba(#fff, 0.3);
        margin-top: -6rem;
        margin-bottom: 1rem;
        max-width: 20rem;
    }

    .avatar:hover {
        color: #424242;
        -webkit-transition: all .3s ease-in;
        -moz-transition: all .3s ease-in;
        -ms-transition: all .3s ease-in;
        -o-transition: all .3s ease-in;
        transition: all .3s ease-in;
        opacity: 1;
        transform: scale(1.15);
        -ms-transform: scale(1.15); /* IE 9 */
        -webkit-transform: scale(1.15); /* Safari and Chrome */
    }

</style>

<div class="container">
    @foreach($user as  $data)
        <div class="fonts">
            <div class="div">
                <div class="col-12 col-sm-12 col-md-12 col-lg-10">
                    <div class="row"><h2><b>{{ isset($data->profile) ? $data->profile->name :''}}</b></h2>
                        <div class="card">
                            <img class="card-img-top"
                                 src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/oslo.jpg"
                                 alt="Bologna">
                            <div class="card-body text-center">
                                <img class="avatar rounded-circle"
                                     src="{{ url('/public/images') }}/{{ isset($data->profile) ? $data->profile->display_picture:''}}"
                                     alt="Bologna"><br>
                                <i class="glyphicon glyphicon-user"></i>&nbsp;{{isset($data->profile) ? $data->profile->name:''}}
                                <br>
                                <i class="fa fa-birthday-cake"></i>
                                &nbsp;{{isset($data->profile) ? $data->profile->dob :''}}<br>
                                <i class="fa fa-map-marker"
                                   style="font-size:15px"></i>&nbsp;{{isset($data->profile) ? $data->profile->location :''}}
                                <br>
                                <i class="glyphicon glyphicon-cloud"></i>
                                &nbsp;{{isset($data->profile) ? $data->profile->bio :''}}<br>
                                <i class="fa fa-calendar"
                                   aria-hidden="true"></i>&nbsp;{{ isset($data->profile) ? $data->profile->created_at :''}}
                                <br>

                                <p>Followers: {{$data->followers_count}}</p>
                                <p>Following : {{$data->followings_count}} </p>

                                @if(count($data->followersAuthUser)===0)

                                    <button class="btn btn-info FollowBtn" data-user_id="{{$data->id}}"
                                            style="margin-bottom: 10px;">
                                        Follow
                                    </button>
                                @else
                                    <button class="btn btn-danger UnFollowBtn" data-user_id="{{$data->id}}"
                                            style="margin-bottom: 10px;">
                                        UnFollow
                                    </button>
                                @endif

                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if($edit)
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                    id='openModal' style="margin-left: 400px;">Edit Profile
            </button>
        @endif

    @endforeach

</div>

<div class="modal fade" id="ajaxModel" aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Edit Profile</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div id="success-msg" class="hide">
                    <div class="alert alert-info alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <strong>Success!</strong>
                    </div>
                </div>

                <form id="profileForm" name="profileForm" class="form-horizontal">

                    @csrf
                    <input type="hidden" class="form-control" id="user_id" name="user_id">

                    <input type="hidden" name="id" id="id" class=form-control>

                    <div class="form-group has-feedback">
                        <label for="DP">Display Picture:</label><br>
                        <input class="form-control" id="fileinput" name="display_picture" type="file">
                        <p id="imageName"></p>
                        <span class="text-danger">
                                <strong id="file-error"></strong>
                            </span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="name">Name:</label><br>
                        <input type="text" name="name" id="name" placeholder="name" class="form-control">
                        <span class="text-danger">
                                <strong id="name-error"></strong>
                            </span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="bio">Bio:</label><br>
                        <input type="text" name="bio" id="bio" placeholder="Add Your Bio " class="form-control"
                               value="">
                        <span class="text-danger">
                                <strong id="bio-error"></strong>
                            </span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="location">Location:</label><br>
                        <input type="text" name="location" id="location" placeholder="Add Your Location"
                               class="form-control">
                        <span class="text-danger">
                                <strong id="location-error"></strong>
                            </span>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="Birth Date">Birth Date:</label><br>
                        <input type="date" name="dob" id="dob" class="form-control">
                        <span class="text-danger">
                                <strong id="dob-error"></strong>
                            </span>
                    </div>

                    <input type="submit" class="btn btn-success" name="add" id="saveBtn" value="Save Changes">
                </form>

            </div>

        </div>

    </div>

</div>

<br><br>

{{--@include('TwitterBlades.TweetsNavigation')--}}


<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" id="tweetModalData">

                    <form enctype="multipart/form-data" id="TweetForm">
                        @csrf

                        <input type="hidden" name="id" id="tweetid" class=form-control>

                        <textarea rows="4" cols="50" placeholder="What's Happening ?" name="tweet"
                                  id="tweet"></textarea> &nbsp

                        <p id="image_name"></p>
                        <input type="file" name="image" value="file" id="image"><br>

                        <input type="button" name="submit" id="tweetBtn" value="Tweet"
                               class="btn btn-info tweetBtn"><br><br>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

</div>
<div class="container">
    <ul class="nav nav-tabs" role="tablist">
        <li><a data-toggle="tab" href="#menu1">Tweets</a></li>
        {{--        <li><a data-toggle="tab" href="#menu2">Tweets & Replies</a></li>--}}
        {{--        <li><a data-toggle="tab" href="#menu3">Likes</a></li>--}}
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
        </div>
        <div id="menu1" class="tab-pane fade">

            @foreach($tweet as  $tweets)
                <div class="fonts">
                    <div class="col-lg-7">
                        <div class="card tweet">
                            <div class="card-body ">
                                <a href="{{ route('profileview') }}"
                                   style=" text-decoration: black; font-size: 20px; color: black"
                                   class="tweet-name">{{ $tweets->user->name }}</a>
                                @ {{$tweets->user->name}}<br>
                                @if($tweets->parent_id!=0)  @ {{$tweets->parent->user->name}} @endif<br><br>

                                <tr class="tweet-content">
                                    {{ $tweets->content }}  @if($tweets->parent_id!=0)
                                        {{$tweets->parent->content}} @endif
                                </tr>
                                <span class="tweet-id" data-tweet_id={{$tweets->id}}>
                            </span>
                                <br><br>
                                <img src="{{ url('/public/images') }}/{{$tweets->image}}" alt=""
                                     width="590px" height="300px"><br><br>
                                @if($tweets->parent_id!=0)
                                    <img src="{{ url('/public/images') }}/{{$tweets->parent->image}}"
                                         alt=""
                                         width="590px" height="300px">
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
                                         <p id="retweet_count"
                                            style="display: inline">{{$tweets->parent()->count()}}</p>
                                    </span>
                                     <span class="comment-btn">
                                      <i class="far fa-comment-dots commentBtn" data-toggle="modal" data-target="#CommentModal"> {{$tweets->comments->count()}}</i>
                                    </span>
                            </span><br><br>
                                <br>
                                <button type="button" name="slide" class="btn-info">Comments & Reply</button>
                                @if($edit)
                                    <button type="button" name="DeleteTweet" class="btn-info DeleteTweet"
                                            data-tweet-id="{{$tweets->id}}">Delete Tweet
                                    </button>
                                    <button type="button" name="EditTweet" data-toggle="modal"
                                            class="btn-primary EditTweet" id="editTweet"
                                            data-target="#myModal"
                                            data-tweet-id={{$tweets->id}} data-row-id="{{$tweets->id}}">Edit Tweet
                                    </button>

                                @endif
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
                                        <div class="form-group">
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


        <div class="modal fade" id="CommentModal" role="dialog">
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
        <div id="menu2" class="tab-pane fade">
            <h3>Menu 2</h3>
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                rem aperiam.</p>
        </div>
        <div id="menu3" class="tab-pane fade">
            <h3>Menu 3</h3>
        </div>
    </div>

</div>


<script>

    $(document).ready(function () {

        $(function () {

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#openModal').click(function () {

                var id = $(this).val();
                var user_id = $(this).val();

                $('#ajaxModel').modal('show');
                $('#modelHeading').show('hi');

                $.ajax({

                    url: '{{route('fetchprofile')}}',
                    method: 'get',
                    data: {user_id: user_id, id: id},
                    dataType: 'text',

                    success: function (data) {

                        if (data.profile == null) {

                            //create modal

                            CreateData();

                        } else (data.profile !== null)
                        {

                            var obj = JSON.parse(data);

                            // $('#display_picture').val(obj.display_picture[0]);
                            $('#imageName').text(obj.display_picture);
                            $('#id').val(obj.id);
                            $('#name').val(obj.name);
                            $('#bio').val(obj.bio);
                            $('#dob').val(obj.dob);
                            $('#location').val(obj.location);

                            console.log(obj);

                        }
                    }
                });

                $(".nav-tabs a").click(function () {
                    $(this).tab('show');
                });
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

            //Reply

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
            $('.DeleteTweet').click(function () {

                var tweets_id = $(this).data('tweet-id');
                console.log(tweets_id);

                $.ajax({

                    url: "tweet/delete/" + tweets_id,
                    data: {tweets_id: tweets_id, '_token': '{{ csrf_token() }}'},
                    type: 'DELETE',
                    dataType: 'json',

                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

                    success: function (data) {

                        console.log(data);
                        location.reload();

                    },

                    error: function (data) {
                        console.log(data);
                    }

                });
            });

            $('.EditTweet').click(function () {

                var tweetid = $(this).val();
                console.log(id);
                var tweets_id = $(this).data('tweet-id');
                console.log(tweets_id);

                $.ajax({

                    url: 'fetch/tweet/' + tweets_id,
                    method: 'get',
                    data: {tweets_id: tweets_id, id: tweetid},
                    dataType: 'html',

                    success: function (data) {

                        var obj = JSON.parse(data);

                        $('#tweetid').val(obj.id);

                        $('#tweet').val(obj.content);

                        $('#image_name').text(obj.image);

                        $('#myModal').modal('show');

                        console.log(obj);


                    },

                    error: function (data) {
                        console.log(data);
                    }
                });
            });


            $('.tweetBtn').click(function (e) {

                e.preventDefault();

                var myFile1 = $('#image').prop('files');

                var fData = new FormData();

                fData.append('image', myFile1[0]);

                var formValues = $('#TweetForm').serializeArray();

                $.each(formValues, (index, item) => {

                    fData.append(item['name'], item['value']);
                });

                $.ajax({

                    url: "{{route('updateTweet')}}",
                    type: 'POST',
                    data: fData,
                    contentType: false,
                    processData: false,
                    dataType: "json",

                    success: function (data) {
                        location.reload();
                        console.log(data);
                    },

                    error: function (data) {

                        console.log('Error:', data);
                    }

                });
            });

        });

        //Follow

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

        //unFollow

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


        function CreateData() {

            $('#saveBtn').click(function (e) {

                e.preventDefault();

                var myFile = $('#fileinput').prop('files');

                var fData = new FormData();

                fData.append('display_picture', myFile[0]);

                var formValues = $('#profileForm').serializeArray();

                $.each(formValues, (index, item) => {
                    fData.append(item['name'], item['value']);
                });

                $('#name-error').html("");
                $('#file-error').html("");
                $('#dob-error').html("");
                $('#location-error').html("");
                $('#bio-error').html("");

                $.ajax({

                    data: fData,
                    url: "{{ route('profileAdd') }}",
                    type: "POST",
                    dataType: 'json',
                    contentType: false,
                    processData: false,

                    success: function (data) {

                        if (data.errors) {
                            if (data.errors.name) {
                                $('#name-error').html(data.errors.name[0]);
                            }
                            if (data.errors.display_picture) {
                                $('#file-error').html(data.errors.display_picture[0]);
                            }
                            if (data.errors.dob) {
                                $('#dob-error').html(data.errors.dob[0]);
                            }
                            if (data.errors.location) {
                                $('#location-error').html(data.errors.location[0]);
                            }
                            if (data.errors.bio) {
                                $('#bio-error').html(data.errors.bio[0]);
                            }
                        }

                        if (data.success) {

                            $('#success-msg').addClass('show');
                        }

                    },
                    error: function (data) {
                        console.log('Error:', data);
                    },

                });

            });
        }
    });

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
