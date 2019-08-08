@include('includes.admin-head')
<body>
    <section class="admin-page">
        <div class="page-wrap">
            @include('includes.admin-header-nav')

            <div class="page-content">
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
                        @elseif(session('success'))
                            <div class="alert alert-success"><p>{{session('success')}}</p></div>
                        @endif
                            <div class="card">
                                <div class="card-header">{{ __($process) }}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{route($requestRoute, $id)}}" enctype="multipart/form-data">
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
                                        {{--
                                        <div class="control-form">
                                            <select id="forum" type="text" class="form-control @error('category') is-invalid @enderror" name="forum_id" required autocomplete="forum">
                                                <option value="null" hidden>Choose Forum</option>
                                                <option disabled value=null>Choose Forum</option>
                                                @foreach($forums as $forum)
                                                <option @isset($article) @if($article->forum_id == $forum->id) selected @endif @endisset value="{{$forum->id}}">{{$forum->name}}</option>
                                                @endforeach
                                                <option value="null" class="option-add-forum" data-linked="true"><a href="{{route('forums.create')}}">+ Add New Forum</a></option>
                                            </select>
                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        --}}
                                        <div class="control-form">
                                            <textarea id="content" type="text" class="form-control @error('password') is-invalid @enderror" name="content" autocomplete="content" placeholder="Enter article body here">@isset($edit){{ $article->content}}@endisset</textarea>
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

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __($action) }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    document.addEventListener('DOMContentLoaded', (event) => {
        let editor = new ClassicEditor;
        ClassicEditor
            .create( document.querySelector( '#content' ), {
        toolbar: [
            'heading',
            '|',
            'bold',
            'italic',
            'link',
            'bulletedList',
            'numberedList',
            'imageUpload',
            'mediaEmbed',
            'blockQuote',
            'undo',
            'redo'
         ],
        heading: {
            options: [
                { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
            ]
        }
    })
        .catch( error => {
        console.error( error );
        } );
    })

 </script>
    @include('includes.admin-footer');
    <!-- CK EDITOR 5 -->
    <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
</body>
</html>

