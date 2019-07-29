<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
    <body>
    @include('includes.navigation')

        <section class="section--white get-started">
            <div class="section-container">
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
                                <img src="{{asset("images/spred-illustration.jpg")}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Articles Section -->
        <section class="articles-featured">
            <div class="section-container">
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
                                    <a href="{{route('single.article', [str_replace(' ', '-', $article->title), $article->id])}}">
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
        <section class="featured-videos">
           <div class="section-container">
               <div class="section-inner">
                   <div class="section-heading white-heading font-bold">
                       <h3>Featured Videos</h3>
                   </div>
                   <div class="section-body">
                       <div class="featured-video-grid">
                           <div class="video-container-lg">
                           <iframe width="560" height="315" src="https://www.youtube.com/embed/InIeez-2WIs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                           </div>
                           <div class="video-container-md-fx">
                               <div class="video-container-md">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/BxHLZMeb7-Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                               </div>
                               <div class="video-container-md">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/BxHLZMeb7-Q" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>


        </section>

        <!-- Featured Videos Section End -->

        <!-- Featured Polls -->

        <section class="featured-polls">
            <div class="section-container">
                <div class="section-inner">
                    <div class="section-heading font-bold">
                        <h3>Featured Polls</h3>
                    </div>
                    <div class="section-body">
                        <div class="section-polls-grid">
                            <div class="section-polls">
                               <div class="section-poll">
                                   <div class="section-poll-image">
                                        <img src="{{asset("images/poll-illustration.jpg")}}" alt="">
                                   </div>
                                   <div class="section-poll-title">
                                       <h6>Messi Vs Ronaldo. Who is Better</h6>
                                   </div>
                               </div>
                               <div class="section-poll">
                                   <div class="section-poll-image">
                                        <img src="{{asset("images/poll-illustration.jpg")}}" alt="">
                                   </div>
                                   <div class="section-poll-title">
                                       <h6>Who will win in a fight? Batman or Ironman</h6>
                                   </div>
                               </div>
                               <div class="section-poll">
                                   <div class="section-poll-image">
                                        <img src="{{asset("images/poll-illustration.jpg")}}" alt="">
                                   </div>
                                   <div class="section-poll-title">
                                       <h6>Best city in Nigeria? Lagos Vs Abuja</h6>
                                   </div>
                               </div>
                               <div class="section-poll">
                                   <div class="section-poll-image">
                                        <img src="{{asset("images/poll-illustration.jpg")}}" alt="">
                                   </div>
                                   <div class="section-poll-title">
                                       <h6>Naija Jollof or Ghana Jollof. U decide!</h6>
                                   </div>
                               </div>
                            </div>
                            <div class="section-polls-explore-more">
                                <p>Want to know if you share the same opinions as the majority? Take some
                                    of our polls and share with your friends!
                                </p>
                                <h6 class="blue-link">Explore More >></h6>
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

    @include('includes.footer')

    </body>
</html>
