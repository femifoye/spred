<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head');
    <body>
    @include('includes.navigation');  
        <section class="page-section">
            <section class="section-inner">
                <div class="section-container">
                    <div class="page-grid">
                        <article class="main-content">
                            <div class="article-wrap">
                                <div class="article_full-featured-image">
                                    <img src="{{asset("images/bitcoin.jpeg")}}" alt="">
                                </div>
                                <div class="article_full-title">
                                    <h4>Much ado about Crypto Currency. Is this another bubble waiting to burst?</h4>
                                </div>
                                <div class="article_full-info">
                                    <div class="article_full-author">
                                        <h6>BY: PETER PARKER</h6>
                                    </div>
                                    <div class="article_full-date">
                                        <h6>June 24, 2018</h6>
                                    </div>
                                </div>
                                <div class="article_full-body">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium inventore blanditiis dolorum vel minima quibusdam quo rem architecto pariatur, magni ut ad cupiditate officia error nemo adipisci beatae officiis natus!</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe praesentium sint atque numquam at impedit eos aperiam quisquam doloribus ut eum, fugiat architecto nulla? Error maxime illo tempore sequi porro?</p>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut ea quam dolore doloribus possimus est, labore beatae veritatis alias veniam mollitia suscipit officia explicabo, fuga in. Saepe debitis qui quasi?</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit eos illo ipsa eligendi repellendus eaque pariatur explicabo laboriosam odio hic. Necessitatibus ratione mollitia perspiciatis enim! Amet nemo consequuntur veniam aliquam?</p>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti ex incidunt, rerum consequatur alias aperiam odio fugit amet! Error, quasi asperiores? Qui unde, minus maxime eum dolorem placeat doloribus quo.</p>
                                </div>
                            </div>
                            <div class="more-content-wrap">
                                <div class="more-content-inner">
                                    <div class="more-content-heading">
                                        <h4>Related Posts</h4>
                                    </div>
                                    <div class="more-content-body">
                                        <div class="more-content_single">
                                            <div class="more-content-thumbnail">
                                                <img src="{{asset("images/fa-image.png")}}" alt="">
                                            </div>
                                            <div class="more-content-title">
                                                <h6>Dealing with stress at work? Here are 8 productivity tips</h6>
                                            </div>
                                        </div>
                                        <div class="more-content_single">
                                            <div class="more-content-thumbnail">
                                                <img src="{{asset("images/fa-image.png")}}" alt="">
                                            </div>
                                            <div class="more-content-title">
                                                <h6>10 Ways to know your boss has no intentions of giving you a raise</h6>
                                            </div>
                                        </div>
                                        <div class="more-content_single">
                                            <div class="more-content-thumbnail">
                                                <img src="{{asset("images/fa-image.png")}}" alt="">
                                            </div>
                                            <div class="more-content-title">
                                                <h6>World Cup 2019. What is the future of Women's sports?</h6>
                                            </div>
                                        </div>
                                        <div class="more-content_single">
                                            <div class="more-content-thumbnail">
                                                <img src="{{asset("images/fa-image.png")}}" alt="">
                                            </div>
                                            <div class="more-content-title">
                                                <h6>How to get your Naija Tailor to deliver your clothes on time</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article> <!-- MAIN CONTENT -->
                        @include('includes.sidebar')
                    </div>
                </div>
                @include('includes.subscribe');
            </section>
        </section>
   
    @include('includes.footer');   
    </body>
</html>

