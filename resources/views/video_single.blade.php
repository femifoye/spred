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
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/iSgXrOsE5hE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <div class="vd-video-box-title_sg">
                                        <h4>Davido releases new video for hit single Blow My Mind</h4>
                                    </div>
                                    <div class="vd-video-box-date_sg">
                                        <h6>July 29, 2019</h6>
                                    </div>

                                </div>
                                <div class="vd-video-box-body_sg">
                                    <article class="vd-article_sg">
                                        Following the success of his latest affort, Davido 
                                        attempts to retain global relevance with the premiere 
                                        of the video to his latest smash "Blow My Mind". Davido
                                        enlists the expertise of global superstar Chris Brown who
                                        did not fail to deliver a stellar verse on the song.
                                        This single comes at a time when Nigerian music - and Afrobeats
                                        in general - is beginning to garner a lot of attention in the 
                                        music ecosystem. Prior to this release, Beyonce enlist the services
                                        of global afrobeats stars such as Burna Boy, Wizkid, Tiwa Savage, on 
                                        the album "The Gift". This singular acts only further cements afrobeats
                                        as a movement thats here to stay. With talented superstars like Davido,
                                        there is no doubt that the future of Afrobeats is very bright.
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

