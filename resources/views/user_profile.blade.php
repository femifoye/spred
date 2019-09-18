<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
    <body>
    @include('includes.navigation')
        <section class="page-section">
            <section class="section-inner">
                <div class="container">
                    <div class="profile-wrap">
                        <div class="profile-inner">
                            <div class="profile-top">
                                <div class="profile-id">
                                    <div class="profile-name">
                                        <h4>{{$user->name}}</h4>
                                        @if($user->is_admin)
                                        <div class="badge badge-secondary">Admin</div>
                                        @endif
                                    </div>
                                    <div class="profile-avatar-lg">
                                        @isset($profile->image)
                                            <img src="{{Storage::url($profile->image)}}" style="width:65px; height:65px; border-radius:100%;" alt="Spred Interactive User Avatar" class="profile-avatar">
                                        @else
                                            <i class="fa fa-user-circle dummy-user-icon" aria-hidden="true"></i>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                            <div class="profile-description">
                                @if($profile)
                                <p>
                                    {{$profile->about}}
                                </p>
                                <div class="profile-edit">
                                    <a href="{{route('profile.edit', $profile)}}" class="btn btn-primary">Edit Profile</a>
                                </div>
                                @else
                                <p>Please add details to your profile to stay unique and get more connections</p>
                                <div class="profile-edit">
                                <a href="{{route('profile.create')}}" class="btn btn-success">Add Profile</a>
                            </div>
                                @endif
                            </div>
                            <div class="profile-bottom">
                                <div class="profile-forums">
                                    <div class="profile-header">
                                        <h4>Your Forum Topics</h4>
                                    </div>
                                    <div class="profile-forums">
                                        @if($user->forumCreator()->count())
                                        <ul class="profile-forums-ul">
                                            @foreach($forums = $user->forumCreator()->paginate(5) as $forum)
                                            <li class="profile-forums-li"><a href="">{{$forum->title}}</a></li>
                                            @endforeach
                                            {{$forums->links()}}
                                        </ul>
                                        @else
                                        <div class="text-secondary"><i>You haven't created any forum topic yet</i></div>
                                        @endisset
                                    </div>
                                </div>
                                <div class="profile-contributions">
                                    <div class="profile-header">
                                        <h4>Featured Contributions</h4>
                                    </div>
                                    <div class="profile-sub-header">
                                        <h5>Replies</h5>
                                    </div>
                                    <div class="profile-replies-ul">
                                        @if($user->comments()->count())
                                        @foreach($comments = $user->comments()->paginate(5) as $comment)
                                        <li class="profile-replies-li">
                                            <p>"{{$comment->body}}"</p>
                                            <div class="profile-replies-subtext">
                                                <p>In reply to
                                                    @if($comment->commentable)
                                                    <span class="replied-link">
                                                        <a
                                                        href="{{action(
                                                            $comment->action_name,
                                                            [$comment->commentable, str_slug($comment->commentable->title)]
                                                            )}}">{{$comment->commentable->title}}
                                                        </a>
                                                    </span>
                                                    @else
                                                    <span class="text-danger">
                                                    {{__('The post has been deleted')}}
                                                    </span>
                                                    @endif
                                                </p>
                                                <small class="text-secondary">{{$comment->model_name}}</small>
                                            </div>
                                        </li>
                                        @endforeach
                                        {{$comments->links()}}
                                        @else
                                        <div class="text-secondary"><i>You haven't contributed to any post yet</i></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('includes.subscribe')
            </section>
        </section>

    @include('includes.footer')
    </body>
</html>

