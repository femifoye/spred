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
                            <div class="forum-wrap">
                                <div class="forum-header">
                                    <h6></h6>
                                </div>
                                @include('includes.forum-search')
                                @include('includes.forum-filter')
                                <div class="forum-body">
                                    <div class="forum_categories_wrap hide">
                                        <div class="forum_categories">
                                            <h6>Lifestyle</h6>
                                            <h6>Politics</h6>
                                            <h6>Business</h6>
                                            <h6>Entertainment</h6>
                                            <h6>Pets</h6>
                                            <h6>University</h6>
                                            <h6>Food</h6>
                                            <h6>Travel</h6>
                                            <h6>DIY</h6>
                                            <h6>Self Improvement</h6>
                                            <h6>Productivity</h6>
                                            <h6>Health</h6>
                                            <h6>Education</h6>
                                            <h6>Social Media</h6>
                                        </div>
                                    </div>
                                    <div class="forum-body_headers forum-grid">
                                        <h6 class="form-body_header">Topic</h6>
                                        <h6 class="form-body_header">Category</h6>
                                        <h6 class="form-body_header">Replies</h6>
                                        <h6 class="form-body_header">Views</h6>
                                        <h6 class="form-body_header">Posted</h6>
                                    </div>
                                    <div class="forum-body_content_wrap">
                                        <div class="forum-body_content forum-grid">
                                            <div class="fb_content_topic">
                                                <p>Summarize the last book you read in one paragraph</p>
                                                <div class="fb_tags">
                                                    <div class="fb_tag">Books</div>
                                                    <div class="fb_tag">Literature</div>
                                                </div>
                                            </div>
                                            <div class="fb_content_category">
                                                <p>Lifestyle</p>
                                            </div>
                                            <div class="fb_content_replies">
                                                <p>26</p>
                                            </div>
                                            <div class="fb_content_views">
                                                <p>114</p>
                                            </div>
                                            <div class="fb_content_posted">
                                                <p>11m</p>
                                            </div>
                                        </div>
                                        <div class="forum-body_content forum-grid">
                                            <div class="fb_content_topic">
                                                <p>What does your ideal vacation look like</p>
                                                <div class="fb_tags">
                                                    <div class="fb_tag">Travel</div>
                                                    <div class="fb_tag">Tourism</div>
                                                    <div class="fb_tag">Adventure</div>
                                                </div>
                                            </div>
                                            <div class="fb_content_category">
                                                <p>Lifestyle</p>
                                            </div>
                                            <div class="fb_content_replies">
                                                <p>34</p>
                                            </div>
                                            <div class="fb_content_views">
                                                <p>256</p>
                                            </div>
                                            <div class="fb_content_posted">
                                                <p>2d</p>
                                            </div>
                                        </div>
                                        <div class="forum-body_content forum-grid">
                                            <div class="fb_content_topic">
                                                <p>Long term effects of Nigerias dependence on oil</p>
                                                <div class="fb_tags">
                                                    <div class="fb_tag">Nigeria</div>
                                                    <div class="fb_tag">Oil</div>
                                                    <div class="fb_tag">Africa</div>
                                                </div>
                                            </div>
                                            <div class="fb_content_category">
                                                <p>Politics</p>
                                            </div>
                                            <div class="fb_content_replies">
                                                <p>58</p>
                                            </div>
                                            <div class="fb_content_views">
                                                <p>453</p>
                                            </div>
                                            <div class="fb_content_posted">
                                                <p>2d</p>
                                            </div>
                                        </div>
                                        <div class="forum-body_content forum-grid">
                                            <div class="fb_content_topic">
                                                <p>Productivity Hack: How to win at adulting</p>
                                                <div class="fb_tags">
                                                    <div class="fb_tag">Productivity</div>
                                                    <div class="fb_tag">Adulting</div>
                                                </div>
                                            </div>
                                            <div class="fb_content_category">
                                                <p>Business</p>
                                            </div>
                                            <div class="fb_content_replies">
                                                <p>20</p>
                                            </div>
                                            <div class="fb_content_views">
                                                <p>121</p>
                                            </div>
                                            <div class="fb_content_posted">
                                                <p>4d</p>
                                            </div>
                                        </div>
                                        <div class="forum-body_content forum-grid">
                                            <div class="fb_content_topic">
                                                <p>When life imitates art and other stories</p>
                                                <div class="fb_tags">
                                                    <div class="fb_tag">Books</div>
                                                    <div class="fb_tag">Writing</div>
                                                    <div class="fb_tag">Art</div>
                                                </div>
                                            </div>
                                            <div class="fb_content_category">
                                                <p>Literature</p>
                                            </div>
                                            <div class="fb_content_replies">
                                                <p>36</p>
                                            </div>
                                            <div class="fb_content_views">
                                                <p>165</p>
                                            </div>
                                            <div class="fb_content_posted">
                                                <p>7d</p>
                                            </div>
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
