<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
    <body>
    @include('includes.navigation')
        <section class="page-section">
            <section class="section-inner">
                <div class="container">
                    <div class="page-full-width">
                        <div class="main-content">
                            <div class="forum-wrap">
                                <div class="forum-header">
                                    <h6></h6>
                                </div>
                                @include('includes.forum-search')
                                @include('includes.forum-filter')
                                <div class="forum-body">
                                    <div class="forum_categories_wrap hide">
                                        <div class="forum_categories">
                                            @foreach($categories as $category)
                                            <h6><a href="{{route('filter', str_slug($category->name))}}">{{title_case($category->name)}}</a></h6>
                                            @endforeach
                                            {{-- <h6><a href="{{route('filter', str_slug($category->name))}}">{{title_case($category->name)}}</a></h6> --}}
                                        </div>
                                    </div>
                                    <div class="forum-body_headers forum-grid">
                                        <h6 class="form-body_header">Topic</h6>
                                        <h6 class="form-body_header">Category</h6>
                                        <h6 class="form-body_header">Replies</h6>
                                        <h6 class="form-body_header">Views</h6>
                                        <h6 class="form-body_header">Posted</h6>
                                    </div>
                                    <div class="forum-body_content_wrap">
                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        @isset($message)
                                        <div class="">
                                            <div class="text-center"><h4>{{$message}}</h4></div>
                                        </div>
                                        @endif
                                        @if($forums->count())
                                        @foreach($forums as $forum)
                                        <div class="forum-body_content forum-grid">
                                            <div class="fb_content_topic">
                                                <div class="fb_content_avatar">
                                                    <i class="fa fa-user-circle dummy-user-icon" aria-hidden="true"></i>
                                                </div>
                                                <div class="fb_title_details">
                                                    <div class="fb_content_user">
                                                        <h6 class="text-upper bluetext">{{$forum->creator->name}}</h6>
                                                    </div>
                                                    <div class="fb_content_title">
                                                        <p><a href="{{route('single.forum', [$forum->id, str_slug($forum->title)])}}">{{$forum->title}}</a></p>
                                                        <div class="fb_tags">
                                                            @foreach(json_decode($forum->tags) as $tag)
                                                                <a href="{{route('filter', str_slug($tag))}}"><div class="badge badge-primary m-l-10 m-r-10 p-a-5">{{$tag}}</div></a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="fb_content_category">
                                                <p><a href="{{route('filter', str_slug($forum->category->name))}}">{{$forum->category->name}}</a></p>
                                            </div>
                                            <div class="fb_content_replies">
                                                <p><span class="show-on-mobile"><i class="fa fa-reply forum-icon"></i></span>{{$forum->comments->count()}}</p>
                                            </div>
                                            <div class="fb_content_views">
                                                <p><span class="show-on-mobile"><i class="fa fa-eye forum-icon"></i></span>{{rand(300, 500)}}</p>
                                            </div>
                                            <div class="fb_content_posted">
                                                <p class="format_date">{{$forum->created_at}}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                        <div>
                                            {{$forums->links()}}
                                        </div>
                                        @else
                                        <div class="jumbotron"><h4 class="text-center text-secondary">No Topic for now, be the first to post a topic</h4></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div> <!-- MAIN CONTENT -->
                    </div>
                </div>
            </section>
        </section>

    @include('includes.footer')
    </body>
</html>
