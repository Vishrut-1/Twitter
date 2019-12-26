{{--    <!-- Modal -->--}}
{{--    <div class="modal fade" id="myModal" role="dialog">--}}
{{--        <div class="modal-dialog">--}}
{{--            <!-- Modal content-->--}}
{{--            <div class="modal-content">--}}


{{--                <div class="modal-header">--}}

{{--                    <h4 class="modal-title">Edit Profile</h4>--}}

{{--                </div>--}}

{{--                <div class="modal-body">--}}

{{--                    <form id="modalFormData"--}}
{{--                          enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" class="form-control" name="id">--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="DP">Display Picture:</label><br>--}}
{{--                            <input class="form-control" name="display_picture" type="file">--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="name">Name:</label><br>--}}
{{--                            <input type="text" name="name" placeholder="name" class="form-control">--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="bio">Bio:</label><br>--}}
{{--                            <input type="text" name="bio" placeholder="Add Your Bio " class="form-control">--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="location">Location:</label><br>--}}
{{--                            <input type="text" name="location" placeholder="Add Your Location" class="form-control">--}}
{{--                        </div>--}}

{{--                        <div class="form-group">--}}
{{--                            <label for="Birth Date">Birth Date:</label><br>--}}
{{--                            <input type="date" name="dob" class="form-control">--}}
{{--                        </div>--}}

{{--                        <button type="submit" class="btn btn-success" value="Add" id="save-btn">Add--}}
{{--                        </button>--}}

{{--                        <button type="submit" class="btn btn-primary" value="save changes" id="editBtn">Save Changes--}}
{{--                        </button>--}}

{{--                    </form>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--$identity = new Profile();--}}
{{--$identity->display_picture = $filename;--}}
{{--$identity->id = $proofData['id'];--}}
{{--$identity->user_id  =  Auth::id();--}}
{{--$identit->location = $data['location'];--}}
{{--$identitiy->dob = $data['dob'];--}}
{{--$identitiy->name = $data['name'];--}}
{{--$identitiy->bio = $data['bio'];--}}

{{--$identity->save();--}}



{{--            <div class="card">--}}
{{--                <img src="{{url('/public/images/1.jpg')}}" alt="image" style="width:20%">--}}

{{--                <span>&#64;&nbsp;{{$data->name}}</span><br>--}}
{{--                <span><i class="fa fa-birthday-cake"></i> &nbsp;{{$data->dob}}</span><br>--}}
{{--                <span class="glyphicon glyphicon-map-marker">&nbsp;{{$data->location}}</span><br>--}}
{{--                <span class="glyphicon glyphicon-list-altr">&nbsp;{{$data->bio}}</span><br>--}}
{{--                <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;{{$data->created_at}}<br>--}}
{{--            </div>--}}


//ReTweet

{{--function ReTweet($tweet_id) {--}}

{{--    alert($tweet_id);--}}

{{--    $.ajaxSetup({--}}

{{--        headers: {--}}
{{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--        }--}}
{{--    });--}}

{{--    alert($tweet_id);--}}

{{--    $.ajax({--}}

{{--        url: "{{route('ReTweet')}}",--}}
{{--        type: 'POST',--}}
{{--        dataType: 'json',--}}
{{--        data: {tweets_id: $tweet_id},--}}

{{--        success: function (data) {--}}

{{--            alert(data);--}}
{{--            console.log(data);--}}
{{--        },--}}

{{--        error: function () {--}}

{{--            alert();--}}
{{--            console.log(data);--}}

{{--        }--}}

{{--    });--}}

{{--}--}}

{{--//Follow--}}

{{--function follow($users_id) {--}}

{{--$.ajaxSetup({--}}
{{--headers: {--}}
{{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--}--}}
{{--});--}}


{{--$.ajax({--}}

{{--url: "{{ route('FollowUser') }}",--}}
{{--type: 'POST',--}}
{{--dataType: 'json',--}}
{{--data: {user_id: $users_id},--}}
{{--success: function (data) {--}}

{{--console.log(data);--}}

{{--},--}}

{{--error: function (data) {--}}

{{--console.log(data);--}}

{{--}--}}

{{--});--}}

{{--}--}}

{{--//UnFollow--}}

{{--function UnFollow($users_id) {--}}

{{--$.ajaxSetup({--}}
{{--headers: {--}}
{{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--}--}}

{{--});--}}


{{--$.ajax({--}}

{{--url: "{{ route('UnFollowUser') }}",--}}
{{--type: 'POST',--}}
{{--dataType: 'json',--}}
{{--data: {user_id: $users_id},--}}
{{--success: function (data) {--}}

{{--console.log(data);--}}
{{--},--}}

{{--error: function (data) {--}}

{{--console.log(data);--}}

{{--}--}}

{{--});--}}

{{--}--}}
{{--function follow($users_id) {--}}

{{--$.ajaxSetup({--}}
{{--headers: {--}}
{{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--}--}}
{{--});--}}


{{--$.ajax({--}}

{{--url: "{{ route('FollowUser') }}",--}}
{{--type: 'POST',--}}
{{--dataType: 'json',--}}
{{--data: {user_id: $users_id},--}}
{{--success: function (data) {--}}

{{--console.log(data);--}}

{{--},--}}

{{--error: function (data) {--}}

{{--console.log(data);--}}

{{--}--}}

{{--});--}}

{{--}--}}

{{--//UnFollow User--}}

{{--function UnFollow($users_id) {--}}

{{--$.ajaxSetup({--}}
{{--headers: {--}}
{{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--}--}}

{{--});--}}

{{--$.ajax({--}}

{{--url: "{{ route('UnFollowUser') }}",--}}
{{--type: 'POST',--}}
{{--dataType: 'json',--}}
{{--data: {user_id: $users_id},--}}
{{--success: function (data) {--}}

{{--console.log(data);--}}
{{--},--}}

{{--error: function (data) {--}}

{{--console.log(data);--}}

{{--}--}}

{{--});--}}

{{--}--}}

{{--                                <button class="btn btn-info" onClick="follow({{$data->id}})"--}}
{{--                                        style="margin-bottom: 10px;">--}}
{{--                                    Follow--}}
{{--                                </button>--}}

{{--                                <button class="btn btn-danger" onClick="UnFollow({{$data->id}})"--}}
{{--                                        style="margin-bottom: 10px;">UnFollow--}}
{{--                                </button>--}}
