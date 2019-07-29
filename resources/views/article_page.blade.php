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
                            <div class="p-l-20"><h4 class="d-block text-secondary">Forum: <span class="text-success">{{$article->forum->name}}</span></h4></div>
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

                                <div class="comment col-9 offset-1 m-b-20" id="comment">
                                    <h4>Comments <span><small class="badge badge-warning">{{$article->comments()->get()->count()}}</small></span></h4>
                                @foreach($article->comments()->get() as $comment)
                                    <div class="row align-items-center m-b-20">
                                        <div class="col-3">
                                            <img src="" class="thumbnail thumb-nail" alt="">
                                            <div class="badge badge-secondary pull-left"><small>{{$comment->user()->first()->name}}</small></div>
                                        </div>
                                        <div class="bg-light col-9 p-20">
                                            <p>{{$comment->body}}</p>
                                        </div>
                                    </div>
                                @endforeach
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <form class="row justify-content-center" action="{{route('comment', $article)}}" method="POST">
                                        @csrf
                                        <textarea rows="4" class="form-control col-sm-10" name="comment"></textarea>
                                        <div class="align-self-end p-l-10">
                                            <input type="submit" class="btn btn-primary">
                                        </div>
                                    </form>
                                </div>

                                <div class="breadcrumb">
                                @auth
                                    <div><a href="{{route('articles.edit', $article->id)}}"><div class="btn btn-primary">Edit</div></a></div>
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

