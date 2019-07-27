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
                                <div class="card-header">New Poll</div>

                                <div class="card-body">
                                    <form action="{{route('adm_polls.store')}}" class="poll-create-form" method="POST">
                                        @csrf
                                        <div id="poll-options">
                                            <div class="control-form">
                                                <input type="text" name="poll_title" id="poll_create_title" class="form-control" required placeholder="Enter Poll Title">
                                            </div>
                                            <div class="control-form">
                                                <input type="text" class="form-control" name="poll_options[0]" id="poll_option_title_1" required placeholder="Enter Option 1" data-option="1">
                                            </div>
                                            <div class="control-form">
                                                <input type="text" name="poll_options[1]" class="form-control" id="poll_option_title_2" required placeholder="Enter Option 2" data-option="2">
                                            </div>
                                        </div>
                                        <div class="poll-add-button">
                                            <div class="control-form">
                                                <a href="/" id="btn-add-option" class="btn btn-md">+ Add another option</a>
                                            </div>
                                        </div>
                                        <div class="control-form">
                                            <div class="poll-label">
                                                <label for="poll_featured_image">Choose Featured Image</label>
                                            </div>
                                            <input type="file" name="poll_featured_image" id="poll_featured_image">
                                        </div>
                                        <div class="control-form">
                                            <button type="submit" class="btn btn-success">Publish Poll</button>
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

    @include('includes.admin-footer');
</body>
</html>

