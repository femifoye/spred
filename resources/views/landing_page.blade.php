<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
    <body>
    @include('includes.navigation')
    <section class="page-section">
        <section class="page-section section-padding section--white get-started">
            <div class="container">
                <div class="section-inner">
                    <div class="section-flex">
                        <div class="get-started-wrap">
                            <div class="get-started-header">
                                <h1 class="h1-bold">Welcome to Spred</h1>
                            </div>
                            <div class="get-started-intro">
                                <p class="p-lg" style="color: #525252">Spred is a platform that lets you engage with other users
                                    across the country. Share articles, contribute to forums and
                                    take polls.
                                </p>
                                <button class="btn btn-lg btn-success btn-spred">Get Started</button>
                            </div>
                        </div>
                        <div class="get-started-image">
                            <div class="image-container">
                                <img src="{{asset('images/spred-illustration.jpg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles Section -->
        <section class="section-padding articles-featured">
            <div class="container">
                <div class="section-inner">
                    <div class="section-heading font-bold">
                        <h3>Featured Articles</h3>
                    </div>
                    <div class="section-body">
                        <div class="articles-carousel-wrapper">
                            <div class="articles-carousel-controls">
                                <div class="articles-carousel-left">
                                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                </div>
                                <div class="articles-carousel-right">
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="article-items">
                                @foreach($articles as $article)
                                <div class="article-item">
                                    <div class="article-item-image">
                                    <a href="{{route('single.article', [$article, str_slug($article->title), $article->id])}}">
                                        <img src="{{Storage::url($article->featured_image)}}" alt="{{str_limit($article->title, 38)}}">
                                    </a>

                                    </div>
                                    <div class="article-item-text">
                                        <p>{{str_limit(strip_tags($article->content), 50)}}</p>
                                    </div>
                                    <div class="article-item-date">
                                        <h6>{{strftime("%d %b %Y",strtotime($article->created_at))}}</h6>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Articles Section End -->

        <!-- Featured Videos Section -->
        <section class="section-padding featured-videos">
           <div class="container">
               <div class="section-inner">
                   <div class="section-heading white-heading font-bold">
                       <h3>Featured Videos</h3>
                   </div>
                   <div class="section-body">
                       <div class="featured-video-grid">
                           <div class="video-container-lg">
                           <iframe width="560" height="315" src="@isset($videos[0]){{url($videos[0]->url)}}@endisset" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                           </div>
                           <div class="video-container-md-fx">
                               <div class="video-container-md">
                                <iframe width="560" height="315" src="@isset($videos[1]){{url($videos[1]->url)}}@endisset" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                               </div>
                               <div class="video-container-md">
                                <iframe width="560" height="315" src="@isset($videos[2]){{url($videos[2]->url)}}@endisset" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>


        </section>

        <!-- Featured Videos Section End -->

        <!-- Featured Polls -->

        <section class="section-padding featured-polls">
            <div class="container">
                <div class="section-inner">
                    <div class="section-heading font-bold">
                        <h3>Featured Polls</h3>
                    </div>
                    <div class="section-body">
                        <div class="section-polls-grid">
                            <div class="section-polls">
                                @foreach($polls as $poll)
                                <div class="section-poll">
                                   <div class="section-poll-image">
                                        <img style="max-width:220px; min-height:300px; max-height:300px" src="@isset($poll->featured_image){{Storage::url($poll->featured_image)}}@else{{asset('images/poll-illustration.jpg')}}@endisset" alt="">
                                   </div>
                                   <div class="section-poll-title">
                                       <h6>{{$poll->question}}</h6>
                                   </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="section-polls-explore-more">
                                <p>Want to know if you share the same opinions as the majority? Take some
                                    of our polls and share with your friends!
                                </p>
                                <h6 class="blue-link"><a href="{{url('polls')}}">Explore More >></a></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Polls End -->

        <!-- Featured Newesletter -->

        @include('includes.subscribe')

        <!-- Featured Newesletter End -->

        <!-- <div class="flex-center position-ref full-height">
            <h2>Spred Test View</h2>
        </div> -->
        @include('includes.floating-chat')
        @include('includes.forum-modals')
    </section>
        

    @include('includes.footer')

    </body>
</html>
