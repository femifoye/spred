@guest
<section class="featured-newsletter">
            <div class="container">
                <div class="section-inner">
                    <div class="section-body">
                        <div class="section-newsletter-grid">
                            <div class="section-newsletter-text">
                                <h4>It would suck to miss an update from us</h4>
                                 <p>Join our mailing list to receive new posts from the Spred team.</p>
                            </div>
                            <div class="section-newsletter-form">
                                <form action="{{route('subscribe')}}" method="POST" class="subscribe-form">
                                    @csrf
                                    <div class="control-form">
                                        <input class="subscribe-input" name="email" type="email" placeholder="Enter your email address" required>
                                    </div>
                                    <div class="control-form">
                                        <button class="subscribe-button" type="submit" value="Subscribe">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endguest
