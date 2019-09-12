<!doctype html>
<html lang="en">

@include('includes.admin-head')
<body>
    <section class="admin-page">
        <div class="page-wrap">
            @include('includes.admin-header-nav')
                <div class="page-content">

                    <div class="article-form-wrap">
                    @if(@isset($edit))
                            @php $requestRoute = 'admin.articles.update';
                                $id = $article->id;
                                $process = 'Edit Article';
                                $action = 'Update Article';
                            @endphp
                        @else
                            @php $requestRoute = 'admin.articles.store';
                                $id = '';
                                $action = 'Publish A New Article';
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
                        @elseif(session('success'))
                            <div class="alert alert-success"><p>{{session('success')}}</p></div>
                        @endif

                        <form method="POST" action="{{route($requestRoute, $id)}}" enctype="multipart/form-data">
                            <div class="content-header">
                                <h3>{{ __($process) }}</h3>
                            </div>
                            @csrf
                            @isset($edit)
                            {{@method_field('PUT')}}
                            @endisset
                            <div class="control-form">
                                <input id="title" type="text" placeholder = "Enter article title" class="form-control @error('name') is-invalid @enderror" name="title" value="@isset($edit){{ $article->title }}@endisset" required autocomplete="title" autofocus>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="control-form">
                                <select id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="category_id" required autocomplete="category">
                                    <option value="null" hidden>Choose Category</option>
                                    <option disabled value=null>Choose Category</option>
                                    @foreach($categories as $category)
                                    <option @isset($article) @if($article->category_id == $category->id) selected @endif @endisset value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    <option value="null" class="option-add-category" data-linked="true"><a href="/">+ Add New Category</a></option>
                                </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="control-form">
                                <textarea id="content" type="text" class="form-control @error('password') is-invalid @enderror" name="content" autocomplete="content" placeholder="Enter article body here" rows="12">@isset($edit){{ $article->content}}@endisset</textarea>
                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <label for="feature_image" class="col-md-4 col-form-label text-md-right">{{ __('Featured Image') }}</label>

                                <div class="col-md-6 custom-file">
                                    <input id="featured_image" type="file" class="custom-file-input" name="featured_image">
                                    <label class="custom-file-label" for="customFile">
                                </div>
                            </div>
                            <div class="control-form">
                                <button type="submit" value="Add Article" class="btn admin-btn">{{ __($action) }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  <!-- PAGE GRID CONTENT END -->
        </div>
    </section>
    @include('includes.admin-footer');
</body>
</html>
