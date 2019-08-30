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
                                        <h4>John Doe</h4>
                                    </div>
                                    <div class="profile-avatar-lg">
                                        <img src="{{asset("images/avatar.jpg")}}" alt="Spred Interactive User Avatar" class="profile-avatar">
                                    </div>
                                </div>
                            </div>
                            <div class="profile-description">
                                <p>You can't measure how fast you've come if you dont start. 
                                    Take one step at a time until you reach your destination.
                                    I am a graphic designer and software developer with an interest 
                                    in writing. I contribute to forums and write articles that get
                                    featured in numerous publications
                                </p>
                            </div>
                            <div class="profile-edit">
                                <a href="/profile/edit/1" class="btn btn-primary">Edit Profile</a>
                            </div>
                            <div class="profile-bottom">
                                <div class="profile-forums">
                                    <div class="profile-header">
                                        <h4>Your Forum Topics</h4>
                                    </div>
                                    <div class="profile-forums">
                                        <ul class="profile-forums-ul">
                                            <li class="profile-forums-li"><a href="">Savings: Myth or Fact?</a></li>
                                            <li class="profile-forums-li"><a href="">Can life really exist on Mars?</a></li>
                                            <li class="profile-forums-li"><a href="">Top 10 Productivity Hacks</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="profile-contributions">
                                    <div class="profile-header">
                                        <h4>Your Contributions</h4>
                                    </div>
                                    <div class="profile-sub-header">
                                        <h5>Replies</h5>
                                    </div>
                                    <div class="profile-replies-ul">
                                        <li class="profile-replies-li">
                                            <p>I don't agree, There isn't enough facts to back up this theory</p>
                                            <div class="profile-replies-subtext">
                                                <p>In reply to <span class="replied-link"><a href="">Covenant University is the best in Nigeria</a></span></p>
                                            </div>
                                        </li>
                                        <li class="profile-replies-li">
                                            <p>Davido does it again!</p>
                                            <div class="profile-replies-subtext">
                                                <p>In reply to <span class="replied-link"><a href="">Davido drops new video for new single "Blow my mind"</a></span></p>
                                            </div>
                                        </li>
                                        <li class="profile-replies-li">
                                            <p>There is no need to be rude</p>
                                            <div class="profile-replies-subtext">
                                                <p>In reply to <span class="replied-link"><a href="">Savings: Myth or Facts?</a></span></p>
                                            </div>
                                        </li>
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

