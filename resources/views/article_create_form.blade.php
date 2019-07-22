@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(@isset($edit))
            @php $requestRoute = 'articles.update';
                $id = $article->id;
                $process = 'Edit Article';
                $action = 'Update Article';
            @endphp
        @else
            @php $requestRoute = 'articles.store';
                $id = '';
                $action = 'Publish Article';
                $process = $action;
            @endphp
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            <div class="card">
                <div class="card-header">{{ __($process) }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route($requestRoute, $id)}}" enctype="multipart/form-data">
                        @csrf
                        @isset($edit)
                        {{@method_field('PUT')}}
                        @endisset
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="@isset($edit){{ $article->title }}@endisset" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <select id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category_id" required autocomplete="category">
                                    <option value=null hidden>Choose Category</option>
                                    <option disabled value=null>Choose Category</option>
                                    @foreach($categories as $category)
                                    <option @isset($article) @if($article->category_id == $category->id) selected @endif @endisset value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Article Body') }}</label>

                            <div class="col-md-6">
                                <textarea id="content" type="text" class="form-control @error('password') is-invalid @enderror" name="content" required autocomplete="content" placeholder="Enter article body here">@isset($edit){{ $article->content}}@endisset</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="feature_image" class="col-md-4 col-form-label text-md-right">{{ __('Featured Image') }}</label>

                            <div class="col-md-6 custom-file">
                                <input id="featured_image" type="file" class="custom-file-input" name="featured_image">
                                <label class="custom-file-label" for="customFile">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __($action) }}
                                </button>
                            </div>
                        </div>
                        <script type="text/javascript" charset="utf-8">
                            $(prettyPrint);
                        </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
