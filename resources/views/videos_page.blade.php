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
                            <div class="videos-wrap">
                                <div class="videos-header">
                                    <h4>VIDEOS</h4>
                                </div>
                                @isset($featured)
                                <div class="vd-featured-video-wrap">
                                    <div class="vd-featured-video">
                                        <div class="vd-featured-video-box">
                                        <iframe width="560" height="315" src="{{url($featured->url)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                        <div class="vd-featured-video-title">
                                            <h4>{{$featured->title}}</h4>
                                        </div>
                                    </div>
                                </div>
                                @endisset
                                @isset($videos)
                                @if($videos->count())
                                <div class="vd-more-videos-wrap">
                                    <div class="vd-more-videos-header section-heading font-bold">
                                        <h3>Browse Videos</h3>
                                    </div>
                                    @foreach($videos as $video)
                                    @if($video != $featured)
                                    <div class="vd-more-videos">
                                        <div class="vd-video">
                                            <div class="vd-video-box">
                                                <iframe width="560" height="315" src="{{url($video->url)}}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            <div class="vd-video-title">
                                                <h5>{{$video->title}}</h5>
                                            </div>
                                            <div class="vd-video-play">
                                                <a href="{{route('single.video', [$video, str_slug($video->title)])}}" class="btn vd-btn-play">Play Video</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                @else
                                <div class="jumbotron"><h4 class="text-center text-secondary">No video to display for now. Check back later</h4></div>
                                @endif
                                @endisset
                            </div>
                        </div> <!-- MAIN CONTENT -->
                    </div>
                </div>
            </section>
        </section>

    @include('includes.footer')
    </body>
</html>
