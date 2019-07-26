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
                            @if(session('email'))
                            <blockquote class="p-l-20 m-t-30">
                                <h3 class="text-success">Thanks for subscribing</h3>
                                <p class="lead">Please ensure your email ( {{session('email')}} ) is only used by you</p>
                            </blockquote>
                            @else
                                @auth()
                                <blockquote class="p-l-20 m-t-30">
                                    <p class="lead text-success">Hello {{auth()->user()->name}}, as a registered user you are automatically subscribed.</p>
                                    <p>If you want to unsubscribe, send the admin a message to unsubscribe you</p>
                                    <h5 class="text-secondary">Thanks</h5>
                                </blockquote>
                                @endauth
                            @endif

                        </div> <!-- MAIN CONTENT -->
                        @include('includes.sidebar')
                    </div>
                </div>
            </section>
        </section>

    @include('includes.footer')
    </body>
</html>
