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
                            <div class="vd-video-wrap_sg">
                                <div class="vd-video-box_sg">
                                    <div class="vd-video-box-iframe_sg">
                                        <iframe width="560" height="315" src="{{$video->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="vd-video-box-title_sg">
                                        <h4>{{$video->title}}</h4>
                                    </div>
                                    <div class="vd-video-box-date_sg">
                                        <h6>{{$video->created_at}}</h6>
                                    </div>

                                </div>
                                <div class="vd-video-box-body_sg">
                                    <article class="vd-article_sg">
                                        {{$video->body}}
                                    </article>
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

