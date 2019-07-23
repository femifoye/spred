<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
    <body>
    @include('includes.navigation')
        <section class="page-section">
            <section class="section-inner">
                <div class="container">
                    <div class="page-grid">
                        <article class="main-content">
                            <div class="btn-group breadcrumb">
                                <a class="btn btn-secondary" href="{{route('articles.create')}}">Publish Article</a>
                            </div>
                            <div class="article-wrap">
                                <div class="article_full-featured-image">
                                    <img src="{{Storage::url($article->featured_image)}}" alt="{{str_limit($article->title, 38)}}">
                                </div>
                                <div class="article_full-title text-center">
                                    <h4>{{$article->title}}</h4>
                                </div>
                                <div class="article_full-info">
                                    <div class="article_full-author">
                                        <h6>BY: {{$article->creator->name}}</h6>
                                    </div>
                                    <div class="article_full-date">
                                        <h6>{{$article->created_at}}</h6>
                                    </div>
                                </div>
                                <div class="article_full-body">
                                    {!!html_entity_decode($article->content)!!}
                                </div>

                                <div class="breadcrumb">
                                @auth
                                    <div style=""><a href="{{route('articles.edit', $article->id)}}"><div class="btn btn-primary">Edit</div></a></div>
                                    <div style="margin:0px 20px 0px 10px">
                                        <a
                                            onclick="event.preventDefault();
                                                document.getElementById('delete_article').submit();"
                                        >
                                            <div class="btn btn-danger">Delete</div>
                                        </a>
                                        <form method="POST" id="delete_article" action="{{route('articles.destroy', $article->id)}}">
                                            @csrf
                                            {{@method_field("DELETE")}}
                                        </form>
                                    </div>
                                @endauth
                                    <div class="d-block m-auto"><a class="btn btn-secondary" href="{{route('articles.index')}}">View All</a></div>
                                </div>
                            </div>
                            @isset($related)
                            @if($related->count())
                            <div class="more-content-wrap">
                                <div class="more-content-inner">
                                    <div class="more-content-heading">
                                        <h4>Related Posts</h4>
                                    </div>
                                    <div class="more-content-body">
                                        @foreach($related as $article)
                                        <div class="more-content_single">
                                            <div class="more-content-thumbnail">
                                                <img src="{{Storage::url($article->featured_image)}}" alt="">
                                            </div>
                                            <div class="more-content-title">
                                                <h6><a href="{{route('single.article', [str_slug($article->title), $article->id])}}">{{$article->title}}</a></h6>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endisset
                        </article> <!-- MAIN CONTENT -->
                        @include('includes.sidebar')
                    </div>
                </div>
                @include('includes.subscribe')
            </section>
        </section>

    @include('includes.footer')
    </body>
</html>

