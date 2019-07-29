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
                            @php $requestRoute = 'forums.update';
                                $id = $forum->id;
                                $process = 'Edit Forum';
                                $action = 'Update Forum';
                            @endphp
                        @else
                            @php $requestRoute = 'forums.store';
                                $id = '';
                                $action = 'Add Forum';
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
                                            <label for="forum" class="col-md-4 col-form-label text-md-right">{{ __('Forum Name') }}</label>

                                            <div class="col-md-6 m-b-10">
                                                <input id="forum" type="text" class="form-control @error('forum') is-invalid @enderror" name="name" value="@isset($edit){{ $forum->name }}@endisset" required autocomplete="forum">
                                                @error('forum')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <label for="featured_image" class="col-md-4 col-form-label text-md-right">{{ __('Featured Image') }}</label>

                                                <div class="col-md-6 custom-file">
                                                    <input id="featured_image" type="file" class="custom-file-input" name="featured_image">
                                                    <label class="custom-file-label" for="customFile">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
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
    @include('includes.admin-footer');
</body>
</html>
