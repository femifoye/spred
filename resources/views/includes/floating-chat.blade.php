<div class="floating-chat-toggle">
    <div class="fc-toggle-icon">
    <i class="fa fa-comments" aria-hidden="true" style="font-size: 1.5rem"></i>
    </div>

</div>

<section class="fc-floating-chat hide">
    <div class="fc-wrap">
        <div class="fc-chat-box">
            <div class="fc-chat-header">
                <h5>Chat</h5>
                <i class="fa fa-close fc-close" style="font-size: 1.5rem"></i>
            </div>
            <div class="fc-chat-body">
                <div class="fc-chat-conv">
                    <!-- chat bubbles will be go here -->

                </div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- show this form only if user is signed up -->
                @auth('web')
                <div class="fc-chat-form">
                    <form action="" method="POST" id="floating_chat_form">
                        <div class="control-form">
                            <input
                                type="text"
                                class="form-control chat-bubble-input"
                                name="chat_bubble_input"
                                id="chat_bubble_input"
                                placeholder="Your message..."
                            >
                        </div>
                    </form>
                </div>
                @endauth
                <!-- show this if user is not signed up -->
                @guest
                <div class="fc-chat-notauth">
                    <div class="signup-message">
                        <p class="text-center"><span class="signup-link"><a href="{{url('/register')}}">Sign up</a></span> to chat</p>
                    </div>
                </div>
                @endguest
            </div>
            <div class="fc-chat-footer">

            </div>
        </div>
    </div>

</section>
