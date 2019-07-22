<section class="sidebar p-t-20">
    <div class="sidebar-inner">
        <div class="sidebar-grid">
            <div class="sidebar-subscribe">
                <h6 class="sidebar-subscribe-heading">Join the rest of the people receiving new content from us!</h6>
                <form action="" method="POST" class="sidebar-subscribe-form">
                    <div class="control-form">
                        <input type="text" placeholder="Enter Email Address" required>
                    </div>
                    <div class="control-form">
                        <button type="submit" value="subscribe" class="sidebar-subscribe-button">Subscribe</button>
                    </div>
                </form>
            </div>
            <div class="sidebar-categories sidebar-box">
                <div class="sidebar-heading">
                    <h6 class="sidebar-heading-h6">Categories</h6>
                </div>
                <div class="sidebar-categories-group">
                    <ul class="sidebar-categories-ul">
                        @isset($categories)
                        @foreach($categories as $category)
                        <li>
                            <a href="{{route('sort', str_slug($category->name))}}">{{title_case($category->name)}}</a>
                        </li>
                        @endforeach
                        @endisset
                    </ul>
                </div>
            </div>
            <div class="sidebar-popular-posts sidebar-box">
                <div class="sidebar-heading">
                    <h6 class="sidebar-heading-h6">Popular Posts</h6>
                </div>

            <ul class="sidebar-popular-post-ul">
                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                    <li>Lorem ipsum dolor, sit amet consectetur.</li>
                    <li>Lorem ipsum dolor, sit amet consectetur.</li>
                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing.</li>
                    <li>Lorem ipsum dolor, sit amet consectetur.</li>
                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
            </ul>
            </div>
        </div>
    </div>

</section> <!-- PAGE SIDE BAR -->