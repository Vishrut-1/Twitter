
<style>
    .nav-tabs {

        font-size: 20px;
        font-family: 'Nunito', sans-serif;
    }

    a {
        color: black;
    }

    a:hover {
        background-color: #5bc0de;
    }

</style>

<div class="modal fade" id="myModal" aria-hidden="true">

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
                                        <i id="tweetBtn" class="fa fa-retweet" onclick="ReTweet({{$tweets->id}})"></i>
                                    </span>
                                     <span class="comment-btn">
                                      <i class="far fa-comment-dots commentBtn" data-toggle="modal"></i>
                                    </span>
                            </span><br><br>
                                <br>
                                <button type="button" name="slide" class="btn-info">Comments & Reply</button>
                                <button type="button" name="DeleteTweet" class="btn btn-info DeleteTweet"
                                        data-tweet-id="{{$tweets->id}}">Delete Tweet
                                </button>
                                <button type="button" name="EditTweet" class="btn btn-info EditTweet"
                                        data-target="#myModal">Edit Tweet
                                </button>

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
        $(".nav-tabs a").click(function () {
            $(this).tab('show');
        });
    });

    $(".btn-info").click(function () {
        $(".display-comments").slideToggle();
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
            },

            error: function (data) {
                console.log(data);
            }

        });

    });


</script>
