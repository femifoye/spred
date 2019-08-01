@include('includes.admin-head')
<body>
    <section class="admin-page">
        <div class="page-wrap">
            @include('includes.admin-header-nav')

            <div class="page-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                        
                            <div class="alert alert-danger">
                                <ul>  
                                        <li></li>
                                </ul>
                            </div>                  
                            <div class="alert alert-success"><p></p></div>
                            <div class="card">
                                <div class="card-header"></div>

                                <div class="card-body">
                                    <form method="POST" action="" enctype="multipart/form-data">
                                       <div class="control-form">
                                           <input 
                                                type="text"
                                                class="form-control"
                                                name="video_title"
                                                id="video_title"
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
                                                placeholder="Enter Youtube Embed link"
                                                required
                                            >
                                       </div>
                                       <div class="control-form">
                                           <textarea 
                                                name="" 
                                                id="video_body" 
                                                name="video_body"
                                                placeholder="Enter video description"
                                                cols="30" 
                                                rows="10" 
                                                class="form-control"
                                            >
                                            </textarea>
                                       </div>
                                       <div class="control-form">
                                        <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
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

