<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
    <body>
    @include('includes.navigation')
        <section class="">
            <section class="container">
                <div class="row">
                    <section class="col-sm-8">
                        <div class=" m-t-20">
                            <div class="breadcrumb row">
                                <div class="col-12 no-padding">
                                    <form method="POST" action="{{route('search')}}" class="row">
                                        @csrf
                                        <div class="col-10">
                                            <div class="row input-group">
                                                <input name="seek" required type="text" placeholder="Search for an article here" class="form-control">
                                                <input class="btn btn-success" value="Search" type="submit">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="row btn-group">
                                                <a class="btn btn-outline-secondary" href="{{route('articles.index')}}">All</a>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                <a class="btn btn-secondary" href="{{route('articles.create')}}">Publish Article</a>
                                </div>
                            </div>
                            <div class="page-heading">
                                <h3>All Articles</h3>
                            </div>
                            @isset($message)
                            <div class="breadcrumb">
                                <h4>{{$message}}</h4>
                            </div>
                            @else
                            <div class="all-articles-view">
                                @foreach($articles as $article)
                                <div class="article-thumb">
                                    <div class="article-featured-image">
                                        <a href="{{route('single.article', [str_replace(' ', '-', $article->title), $article->id])}}"><img src="{{Storage::url($article->featured_image)}}" alt=""></a>

                                    </div>
                                    <div class="article-thumb-title">
                                        <a href="{{route('single.article', [str_replace(' ', '-', $article->title), $article->id])}}"><h4>{{$article->title}}</h4></a>
                                    </div>
                                    <div class="article-excerpt p-s-10">

                                        <p>
                                        {{str_limit(strip_tags($article->content), 50)}}... <a href="{{route('single.article', [str_replace(' ', '-', $article->title), $article->id])}}">Read More</a>
                                        </p>
                                    </div>
                                    <div class="article-category">
                                        <a href="{{route('sort', str_slug($article->category->name))}}">
                                            <h6 class="text-light">{{strtoupper($article->category->name)}}</h6>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endisset
                        </div>
                    </section> <!-- MAIN CONTENT SECTION -->
                    <section class="col-sm-4">
                    @include('includes.sidebar')
                    </section>
                </div>
            </section>
        </section>

    @include('includes.footer')
    </body>
</html>
