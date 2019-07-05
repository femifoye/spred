<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset("css/app.css")}}">
        <link rel="stylesheet" href="{{asset("css/style.css")}}">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:500&display=swap" rel="stylesheet">
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>
        <header role="navigation">
            <section id="navigation">
                <div class="nav-inner">
                    <div class="nav-container">
                        <div class="nav-flex">
                            <div class="site-logo">
                                <h2>SPRED</h2>
                            </div>
                            <nav class="site-navigation">
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
                            <li class="menu-list-item">Home</li>
                            <li class="menu-list-item">Articles</li>
                            <li class="menu-list-item">Videos</li>
                            <li class="menu-list-item">Forums</li>
                            <li class="menu-list-item">Polls</li>    
                        </ul>
                    </div>
                </div>
            </section>
        </header>

        <section class="section--white get-started">
            <div class="section-container">
                <div class="section-inner">
                    <div class="section-flex">
                        <div class="get-started-wrap">
                            <div class="get-started-header">
                                <h1 class="h1-bold">Welcome to Spred</h1>
                            </div>
                            <div class="get-started-intro">
                                <p class="p-lg" style="color: #525252">Spred is a platform that lets you engage with other users
                                    across the country. Share articles, contribute to forums and
                                    take polls.
                                </p>
                                <button class="btn btn-lg btn-success btn-spred">Get Started</button>
                            </div>
                        </div>
                        <div class="get-started-image">
                            <div class="image-container">
                                <img src="{{asset("images/spred-illustration.jpg")}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- <div class="flex-center position-ref full-height">
            <h2>Spred Test View</h2>
        </div> -->
        <script src="{{asset("js/main.js")}}"></script>
    </body>
</html>
