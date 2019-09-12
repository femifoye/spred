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
                            <div class="forum-wrap_single">
                                <!-- @include('includes.forum-search')
                                @include('includes.forum-filter') -->
                                <div class="forum-body_single">
                                    <div class="fb_single_grid">
                                        <div class="forum-body-content">
                                            <div class="fb-content-headers">
                                                <div class="fb-headers-lft">
                                                    <div class="fb-headers-img">
                                                        <img src="{{asset("images/avatar.jpg")}}" alt="">
                                                    </div>
                                                    <div class="fb-headers-name fb-header">
                                                        <h5>Bolaji</h5>
                                                    </div>
                                                    <div class="fb-headers-time fb-header">
                                                        <h6 class="format_date">{{$forum->created_at}}</h6>
                                                    </div>
                                                </div>
                                                <div class="fb-headers-rgt">
                                                    <a href="{{route('filter', str_slug($forum->category->name))}}">
                                                        <div class="fb-headers-category">

                                                            <h6>{{$forum->category->name}}</h6>
                                                        </div>
                                                    </a>
                                                    <div class="fb-headers-stats">
                                                        <div class="fb-headers-liked fb-header-icon">
                                                            <!-- <h6><i class="fa fa-heart forum-icon"></i><span class="subscr">12</span></h6> -->
                                                        </div>
                                                        <div class="fb-headers-seen fb-header-icon">
                                                            <h6><i class="fa fa-eye forum-icon"></i><span class="subscr">{{$forum->views->count()}} views</span></h6>
                                                        </div>
                                                        <div class="fb-headers-replies fb-header-icon">
                                                            <h6><i class="fa fa-reply forum-icon"></i><span class="subscr">{{$forum->comments()->get()->count()}} Repl</span></h6>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="fb-content-body-wrap">
                                                <article class="fb-content-body">
                                                    <div class="forum-title_single">
                                                        <h4>{{$forum->title}}</h4>
                                                        <a href=""><i class="fa fa-heart-o forum_like" style="font-size: 1.8em"></i></a>

                                                    </div>
                                                    <div class="forum-body-detail">
                                                        <p>
                                                        {{$forum->body}}
                                                        </p>
                                                    </div>
                                                </article>
                                                @include('includes.comment-component', ['named_route'=>'forum_comment','commentable'=>$forum])
                                            </div>
                                        </div>
                                        <div class="forum-reply-button">
                                            <a href="" class="forum-reply-button_btn">Reply</a>
                                        </div>
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
