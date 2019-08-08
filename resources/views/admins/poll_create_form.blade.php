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
                            @if(@isset($poll))
                                @php $requestRoute = 'adm_polls.update';
                                    $id = $poll->id;
                                    $process = 'Edit Poll';
                                    $action = 'Update Poll';
                                @endphp
                            @else
                                @php $requestRoute = 'adm_polls.store';
                                    $id = '';
                                    $action = 'Add Poll';
                                    $process = $action;
                                @endphp
                            @endif
                                <div class="card-header">{{$process}}</div>

                                <div class="card-body">
                                    <form action="{{route($requestRoute, $id)}}" class="poll-create-form" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @isset($poll)
                                        {{@method_field('PUT')}}
                                        @endisset
                                        <div id="poll-options">
                                            <div class="control-form">
                                                <input type="text" name="poll_title" id="poll_create_title" class="form-control" value="@isset($poll){{$poll->question}}@endisset" required placeholder="Enter Poll Title">
                                            </div>
                                            @isset($poll)
                                            @foreach(json_decode($poll->options) as $key => $value)
                                            <div class="control-form">
                                                <input type="text" class="form-control" name="poll_options[{{$key}}]" id="poll_option_title_{{$key}}" value="{{$value}}" required placeholder="Enter Option {{$key}}" data-option="{{$key}}">
                                            </div>
                                            @endforeach
                                            @else
                                            <div class="control-form">
                                                <input type="text" name="poll_options[0]" class="form-control" id="poll_option_title_1" required placeholder="Enter Option 1" data-option="1">
                                            </div>
                                            <div class="control-form">
                                                <input type="text" name="poll_options[1]" class="form-control" id="poll_option_title_2" required placeholder="Enter Option 2" data-option="2">
                                            </div>
                                            @endisset
                                        </div>
                                        <div class="poll-add-button">
                                            <div class="control-form">
                                                <a href="/" id="btn-add-option" class="btn btn-md">+ Add another option</a>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="feature_image" class="col-md-3 col-form-label text-md-right">{{ __('Featured Image') }}</label>

                                            <div class="col-md-8 custom-file">
                                                <input id="featured_image" type="file" class="custom-file-input" name="featured_image">
                                                <label class="custom-file-label" for="customFile">
                                            </div>
                                        </div>
                                        <div class="control-form">
                                            <button type="submit" class="btn btn-success">{{$action}}</button>
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

