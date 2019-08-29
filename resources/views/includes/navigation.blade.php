<header role="navigation">
            <section id="navigation">
                <div class="nav-inner">
                    <div class="nav-container">
                        <div class="nav-flex">
                            <div class="site-logo">
                                <a href="/"><img src="{{asset('images/spred-logo.png')}}" id="site_logo" alt="Spred Interactive">
</a>
                            </div>
                            <nav class="site-navigation">
                                <ul class="nav-links">
                                    @if(!auth()->user())
                                    <li class="nav-link"> <a href="{{url('/login')}}">Login</a></li>
                                    @else
                                    <li class="btn" onclick="event.preventDefault(); document.getElementById('user-logout-action').submit()">Logout</li>
                                    <form id="user-logout-action" action="{{route('logout')}}" method="POST" hidden style="display:none">
                                        @csrf
                                    </form>
                                    @endif
                                    <li class="nav-link">My Profile</li>
                                </ul>
                                <div class="menu-button">
                                    <div class="menu-bar bar-1"></div>
                                    <div class="menu-bar bar-2"></div>
                                    <div class="menu-bar bar-3"></div>
                                </div>

                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <section class="menu-fscreen">
                <div class="menu-fscreen-wrap">
                    <div class="container menu-fscreen-inner">
                        <div class="menu-close">
                            <div class="menu-bar-white menu-close-bar-1"></div>
                            <div class="menu-bar-white menu-close-bar-2"></div>
                        </div>
                        <ul class="menu-list">
                            <li class="menu-list-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="menu-list-item"><a href="{{url('/articles')}}">Articles</a></li>
                            <li class="menu-list-item"><a href="{{url('/videos')}}">Videos</li>
                            <li class="menu-list-item"><a href="{{url('/forums')}}">Forums</a></li>
                            <li class="menu-list-item"><a href="{{route('slide-polls')}}">Take Polls</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </header>
