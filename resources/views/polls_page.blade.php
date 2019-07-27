<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
    <body>
    @include('includes.navigation')
        <section class="page-section">
            <section class="section-inner">
                <div class="container">
                    <div class="page-grid">
                        <div class="main-content">
                            <div class="all-polls">
                                <div class="polls-wrap">
                                    <div class="polls-introduction text-center">
                                        <h5>
                                            Find out if others share the same opinions as you do.
                                            Take exciting polls and share with your friends.
                                        </h5>
                                    </div>
                                    <h3 class="poll-heading">Featured Polls</h3>
                                    <div class="featured-polls polls-grid">
                                        @foreach($polls as $poll)
                                        <div class="poll">
                                            <div class="poll-image">
                                                <img src="{{asset("images/poll-illustration-2.jpg")}}" alt="str_limit($poll->question, 10)">
                                                <div class="poll-vote hide">
                                                    <a href="{{url('polls/slide/vote/')}}" class="btn btn-poll abs-center">Take Poll</a>
                                                </div>
                                            </div>
                                            <div class="poll-title">
                                                <h6>{{$poll->question}}</h6>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <h3 class="poll-heading">Popular Polls</h3>
                                    <div class="popular-polls polls-grid">
                                        <div class="poll">
                                            <div class="poll-image">
                                                <img src="{{asset("images/poll-illustration-2.jpg")}}" alt="">
                                                <div class="poll-vote hide">
                                                    <a href="" class="btn btn-poll abs-center">Take Poll</a>
                                                </div>
                                            </div>
                                            <div class="poll-title">
                                                <h6>Who is the better footballer</h6>
                                            </div>
                                        </div>
                                        <div class="poll">
                                            <div class="poll-image">
                                                <img src="{{asset("images/poll-illustration-2.jpg")}}" alt="">
                                                <div class="poll-vote hide">
                                                    <a href="" class="btn btn-poll abs-center">Take Poll</a>
                                                </div>
                                            </div>
                                            <div class="poll-title">
                                                <h6>Naija Jollof Vs Ghana Jollof</h6>
                                            </div>
                                        </div>
                                        <div class="poll">
                                            <div class="poll-image">
                                                <img src="{{asset("images/poll-illustration-2.jpg")}}" alt="">
                                                <div class="poll-vote hide">
                                                    <a href="" class="btn btn-poll abs-center">Take Poll</a>
                                                </div>
                                            </div>
                                            <div class="poll-title">
                                                <h6>Island Vs Mainland</h6>
                                            </div>
                                        </div>
                                        <div class="poll">
                                            <div class="poll-image">
                                                <img src="{{asset("images/poll-illustration-2.jpg")}}" alt="">
                                                <div class="poll-vote hide">
                                                    <a href="" class="btn btn-poll abs-center">Take Poll</a>
                                                </div>
                                            </div>
                                            <div class="poll-title">
                                                <h6>Mercedez Vs BMW</h6>
                                            </div>
                                        </div>
                                        <div class="poll">
                                            <div class="poll-image">
                                                <img src="{{asset("images/poll-illustration-2.jpg")}}" alt="">
                                                <div class="poll-vote hide">
                                                    <a href="" class="btn btn-poll abs-center">Take Poll</a>
                                                </div>
                                            </div>
                                            <div class="poll-title">
                                                <h6>Top 3 Universities in Nigeria</h6>
                                            </div>
                                        </div>
                                        <div class="poll">
                                            <div class="poll-image">
                                                <img src="{{asset("images/poll-illustration-2.jpg")}}" alt="">
                                                <div class="poll-vote hide">
                                                    <a href="" class="btn btn-poll abs-center">Take Poll</a>
                                                </div>
                                            </div>
                                            <div class="poll-title">
                                                <h6>Cryptocurrenccy? Legit or Scam</h6>
                                            </div>
                                        </div>
                                        <div class="poll">
                                            <div class="poll-image">
                                                <img src="{{asset("images/poll-illustration-2.jpg")}}" alt="">
                                                <div class="poll-vote hide">
                                                    <a href="" class="btn btn-poll abs-center">Take Poll</a>
                                                </div>
                                            </div>
                                            <div class="poll-title">
                                                <h6>Clubbing Vs House Parties</h6>
                                            </div>
                                        </div>
                                        <div class="poll">
                                            <div class="poll-image">
                                                <img src="{{asset("images/poll-illustration-2.jpg")}}" alt="">
                                                <div class="poll-vote hide">
                                                    <a href="" class="btn btn-poll abs-center">Take Poll</a>
                                                </div>
                                            </div>
                                            <div class="poll-title">
                                                <h6>iOS vs Android</h6>
                                            </div>
                                        </div>
                                        <div class="poll">
                                            <div class="poll-image">
                                                <img src="{{asset("images/poll-illustration-2.jpg")}}" alt="">
                                                <div class="poll-vote hide">
                                                    <a href="" class="btn btn-poll abs-center">Take Poll</a>
                                                </div>
                                            </div>
                                            <div class="poll-title">
                                                <h6>Worlds best Tennis player</h6>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div> <!-- MAIN CONTENT -->
                        @include('includes.sidebar')
                    </div>
                </div>
            </section>
        </section>

    @include('includes.footer')
    </body>
</html>
