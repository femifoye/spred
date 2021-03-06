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
                            <div class="breadcrumb">
                                <a class="btn btn-secondary" href="{{route('articles.create')}}">Publish Article</a>
                            </div>
                            @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                            @endif
                            <hr>
                            <div class="clearfix"></div>
                            <div class="article-wrap text-center">
                                <div class="article-category__single">
                                    <a href="{{route('sort', str_slug($article->category->name))}}">
                                        <h6>{{strtoupper($article->category->name)}}</h6>
                                    </a>
                                </div>
                                <div class="article_full-title text-center font-bold">
                                    <h4>{{$article->title}}</h4>
                                </div>
                                <div class="article_full-featured-image">
                                    <img src="{{Storage::url($article->featured_image)}}" alt="{{str_limit($article->title, 38)}}">
                                </div>
                                <div class="article_full-info">
                                    <div class="article_full-author">
                                        <h6>Article by: {{$article->creator->name}}
                                            <span>
                                                <div class="article_full-date">
                                                    <h6>{{strftime("%d %b %Y",strtotime($article->created_at))}}</h6>
                                                </div>
                                            </span>
                                        </h6>
                                    </div>

                                </div>
                                <div class="article_full-body">
                                    {!!html_entity_decode($article->content)!!}
                                </div>

                                @include('includes.comment-component', ['named_route' => 'article_comment', 'commentable'=>$article])

                                <div class="breadcrumb">
                                <div class="d-block"><a class="btn btn-dark" href="{{route('articles.index')}}">View All</a></div>
                                @can('update', $article)
                                    <div style="margin:0px 5px 0px 20px"><a href="{{route('articles.edit', $article->id)}}"><div class="btn btn-primary">Edit</div></a></div>
                                @endcan
                                @can('delete', $article)
                                    <div style="margin:0px 20px 0px 5px">
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
                                @endcan

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
                                                <h6><a href="{{route('single.article', [$article, str_slug($article->title)])}}">{{$article->title}}</a></h6>
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

