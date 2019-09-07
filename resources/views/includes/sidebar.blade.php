<section class="sidebar p-t-20">
    <div class="sidebar-inner">
        <div class="sidebar-grid">
            @guest
            <div class="sidebar-subscribe">
                <h6 class="sidebar-subscribe-heading">Join the rest of the people receiving new content from us!</h6>
                <form action="{{route('subscribe')}}" method="POST" class="sidebar-subscribe-form">
                    @csrf
                    <div class="control-form">
                        <input type="text" name="email" placeholder="Enter Email Address" required>
                    </div>
                    <div class="control-form">
                        <button type="submit" value="subscribe" class="sidebar-subscribe-button">Subscribe</button>
                    </div>
                </form>
            </div>
            @endguest

            {{--
                @isset($forums)
            <div class="sidebar-categories sidebar-box">
                <div class="sidebar-heading">
                    <h6 class="sidebar-heading-h6">Forums</h6>
                </div>
                <div class="sidebar-categories-group">
                    <ul class="sidebar-categories-ul">

                        @foreach($forums as $forum)
                        <li>
                            <a href="{{route('sort', str_slug($forum->name))}}">{{title_case($forum->name)}}</a>
                        </li>
                        @endforeach

                    </ul>
                </div>
            </div>
            @endisset
            --}}

            @isset($categories)
            <div class="sidebar-categories sidebar-box">
                <div class="sidebar-heading">
                    <h6 class="sidebar-heading-h6">Categories</h6>
                </div>
                <div class="sidebar-categories-group">
                    <ul class="sidebar-categories-ul">
                        @foreach($categories as $category)
                        <li>
                            <a href="{{route('sort', str_slug($category->name))}}">{{title_case($category->name)}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endisset
            @isset($popularPost)
            <div class="sidebar-popular-posts sidebar-box">
                <div class="sidebar-heading">
                    <h6 class="sidebar-heading-h6">Popular Posts</h6>
                </div>
                <ul class="sidebar-popular-post-ul">
                    @foreach($popularPost as $article)
                    <li><a href="{{route('single.article', [$article, str_slug($article->title)])}}">{{$article->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            @endisset
        </div>
    </div>
</section> <!-- PAGE SIDE BAR -->
