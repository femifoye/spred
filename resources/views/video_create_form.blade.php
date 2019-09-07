@include('includes.admin-head')
<body>
    <section class="admin-page">
        <div class="page-wrap">
            @include('includes.admin-header-nav')

            <div class="page-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
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
                            @if(@isset($video))
                                @php $requestRoute = 'admin.videos.update';
                                    $id = $video;
                                    $process = 'Edit Video';
                                    $action = 'Update Video';
                                    $method = 'PUT';
                                @endphp
                            @else
                                @php $requestRoute = 'admin.videos.store';
                                    $id = '';
                                    $action = 'Add Video';
                                    $process = $action;
                                    $method = 'POST';
                                @endphp
                            @endif
                                <div class="card-header">{{$process}}</div>

                                <div class="card-body">
                                    <form method="POST" action="{{route($requestRoute, $id)}}" enctype="multipart/form-data">
                                    @method($method)
                                    @csrf
                                       <div class="control-form">
                                           <input
                                                type="text"
                                                class="form-control"
                                                name="video_title"
                                                id="video_title"
                                                value="@isset($video){{$video->title}}@endisset"
                                                placeholder="Enter video title"
                                                required
                                            >
                                       </div>
                                       <div class="control-form">
                                           <input
                                                type="text"
                                                class="form-control"
                                                id="video_embed_link"
                                                name="video_embed_link"
                                                value="@isset($video){{$video->url}}@endisset"
                                                placeholder="Enter Youtube Embed link"
                                                required
                                            >
                                        </div>
                                        <div class="control-form">
                                            <textarea
                                                id="video_body"
                                                name="video_body"
                                                placeholder="Enter video description"
                                                cols="30"
                                                rows="10"
                                                class="form-control"
                                            >@isset($video){{$video->body}}@endisset</textarea>
                                        </div>
                                        <div class="control-form">
                                            <input
                                                type="checkbox"
                                                name="featured_video"
                                                value=1
                                                @if(@isset($video->is_featured)) checked @endif
                                            > <label for="is_featured"> Make this a featured video</label>
                                        </div>
                                        <div class="control-form">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">
                                                    {{$action}}
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
            .create( document.querySelector( '#video_body' ), {
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

