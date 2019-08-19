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
                                            <h6>Lifestyle</h6>
                                            <h6>Politics</h6>
                                            <h6>Business</h6>
                                            <h6>Entertainment</h6>
                                            <h6>Pets</h6>
                                            <h6>University</h6>
                                            <h6>Food</h6>
                                            <h6>Travel</h6>
                                            <h6>DIY</h6>
                                            <h6>Self Improvement</h6>
                                            <h6>Productivity</h6>
                                            <h6>Health</h6>
                                            <h6>Education</h6>
                                            <h6>Social Media</h6>
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
                                        @foreach($forums as $forum)
                                        <div class="forum-body_content forum-grid">
                                            <div class="fb_content_topic">
                                                <div class="fb_content_avatar">
                                                    <img src="{{asset("images/avatar.jpg")}}" alt="">
                                                </div>
                                                <div class="fb_title_details">
                                                    <div class="fb_content_user">
                                                        <h6 class="text-upper bluetext">Bola Ahmed</h6>
                                                    </div>
                                                    <div class="fb_content_title">
                                                        <p><a href="{{route('single.forum', [$forum->id, str_slug($forum->title)])}}">{{$forum->title}}</a></p>
                                                        <div class="fb_tags">
                                                            @foreach(json_decode($forum->tags) as $tag)
                                                                @if($loop->index < 3)
                                                                    <div class="badge badge-primary m-l-10 m-r-10 p-a-5">{{$tag}}</div>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="fb_content_category">
                                                <p>{{$forum->category->name}}</p>
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
                                    </div>
                                </div>
                            </div>
                        </div> <!-- MAIN CONTENT -->
                        @include('includes.forum-modals')
                    </div>
                </div>
            </section>
        </section>

    @include('includes.footer')
    </body>
</html>
