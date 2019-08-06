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
                                @include('includes.forum-search')
                                @include('includes.forum-filter')
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
                                                        <h6>10h</h6>
                                                    </div>
                                                </div>
                                                <div class="fb-headers-rgt">
                                                    <div class="fb-headers-category">
                                                        <h6>Business</h6>
                                                    </div>
                                                    <div class="fb-headers-stats">
                                                        <div class="fb-headers-liked fb-header-icon">
                                                            <h6><i class="fa fa-heart forum-icon"></i><span class="subscr">12</span></h6>
                                                        </div>
                                                        <div class="fb-headers-seen fb-header-icon">
                                                            <h6><i class="fa fa-eye forum-icon"></i><span class="subscr">121</span></h6>
                                                        </div>
                                                        <div class="fb-headers-replies fb-header-icon">
                                                            <h6><i class="fa fa-reply forum-icon"></i><span class="subscr">5</span></h6>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="fb-content-body-wrap">
                                                <article class="fb-content-body">
                                                    <div class="forum-title_single">
                                                        <h4>Summarize the last book you read in one paragraph</h4>
                                                        <a href=""><i class="fa fa-heart-o forum_like" style="font-size: 1.8em"></i></a>
                                                        
                                                    </div>
                                                    <div class="forum-body-detail">
                                                        <p>
                                                            I created this topic to have an idea what the members of this
                                                            community are reading. In addition to that, i think this is a great way
                                                            to find new titles to read. Please reply with a brief summary
                                                            of the last book you read.
                                                        </p>
                                                    </div>
                                                </article>
                                                <div class="forum-replies">
                                                    <div class="forum-reply">
                                                        <div class="forum-reply-dots">
                                                            <div class="forum-reply-dot"></div>
                                                            <div class="forum-reply-dot"></div>
                                                            <div class="forum-reply-dot"></div>
                                                        </div>
                                                        <div class="forum-reply-body">
                                                            <div class="fb-reply-icons">
                                                                <div class="fb-headers-img">
                                                                    <img src="{{asset("images/avatar.jpg")}}" alt="">
                                                                </div>
                                                                <div class="fb-headers-name fb-header">
                                                                    <h5>Kaffy</h5>
                                                                </div>
                                                                <div class="fb-headers-time fb-header">
                                                                    <h6>10h</h6>
                                                                </div>
                                                            </div>
                                                            <div class="forum-reply-details">
                                                                <p>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                                    Ipsa natus culpa, neque amet, architecto tempora consequatur 
                                                                    illum voluptas modi veritatis ducimus, eos sit quas omnis? 
                                                                    Nulla quasi quisquam quaerat id?
                                                                </p>
                                                            </div> 
                                                        </div>
                                                         
                                                    </div>
                                                    <div class="forum-reply">
                                                        <div class="forum-reply-dots">
                                                            <div class="forum-reply-dot"></div>
                                                            <div class="forum-reply-dot"></div>
                                                            <div class="forum-reply-dot"></div>
                                                        </div>
                                                        <div class="forum-reply-body">
                                                            <div class="fb-reply-icons">
                                                                <div class="fb-headers-img">
                                                                    <img src="{{asset("images/avatar.jpg")}}" alt="">
                                                                </div>
                                                                <div class="fb-headers-name fb-header">
                                                                    <h5>Kenneth</h5>
                                                                </div>
                                                                <div class="fb-headers-time fb-header">
                                                                    <h6>2d</h6>
                                                                </div>
                                                            </div>
                                                            <div class="forum-reply-details">
                                                                <p>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                                    Ipsa natus culpa, neque amet, architecto tempora consequatur 
                                                                    illum voluptas modi veritatis ducimus, eos sit quas omnis? 
                                                                    Nulla quasi quisquam quaerat id?
                                                                </p>
                                                            </div> 
                                                        </div>
                                                         
                                                    </div>
                                                    <div class="forum-reply">
                                                        <div class="forum-reply-dots">
                                                            <div class="forum-reply-dot"></div>
                                                            <div class="forum-reply-dot"></div>
                                                            <div class="forum-reply-dot"></div>
                                                        </div>
                                                        <div class="forum-reply-body">
                                                            <div class="fb-reply-icons">
                                                                <div class="fb-headers-img">
                                                                    <img src="{{asset("images/avatar.jpg")}}" alt="">
                                                                </div>
                                                                <div class="fb-headers-name fb-header">
                                                                    <h5>Samuel</h5>
                                                                </div>
                                                                <div class="fb-headers-time fb-header">
                                                                    <h6>3d</h6>
                                                                </div>
                                                            </div>
                                                            <div class="forum-reply-details">
                                                                <p>
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                                    Ipsa natus culpa, neque amet, architecto tempora consequatur 
                                                                    illum voluptas modi veritatis ducimus, eos sit quas omnis? 
                                                                    Nulla quasi quisquam quaerat id?
                                                                </p>
                                                            </div> 
                                                        </div>
                                                         
                                                    </div>
                                                </div>
                                            
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