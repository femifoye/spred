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
                            @php $requestRoute = 'admin.forums.update';
                                $id = $forum->id;
                                $process = 'Edit Forum';
                                $action = 'Update Forum';
                            @endphp
                        @else
                            @php $requestRoute = 'admin.forums.store';
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
                                            <label for="forum" class="col-md-4 col-form-label text-md-right">{{ __('Forum Topic') }}</label>

                                            <div class="col-md-6 m-b-10">
                                                <input id="forum" type="text" class="form-control @error('forum') is-invalid @enderror" name="forum_topic_title" value="@isset($forum){{ $forum->title }}@endisset" required autocomplete="forum">
                                            </div>

                                            <label for="forum_category" class="col-md-4 col-form-label text-md-right">Select Category</label>

                                            <div class="col-md-6 m-b-10">
                                                <select name="forum_add_category" id="category" class="form-control" required>
                                                    <option disabled>Choose a category here</option>
                                                    <option hidden>Choose a category here</option>
                                                    @foreach($categories as $category)
                                                    <option @isset($forum)@if($forum->id == $category->id){{__('selected')}}@endif @endisset value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                    <option value="null" class="option-add-category" data-linked="true"><a href="{{route('admin.categories.create')}}">+ Add New Category</a></option>
                                                </select>
                                            </div>

                                            <label for="forum_tags" class="col-md-4 col-form-label text-md-right">Enter Tags</label>

                                            <div class="col-md-6 m-b-10">
                                                <input type="text" name="forum_add_tags" value="@isset($forum){{implode(', ', json_decode($forum->tags) )}}@endisset" class="form-control" id="forum_tags" placeholder="Enter tags separated by a comma">
                                            </div>

                                            <label for="forum_details" class="col-md-4 col-form-label text-md-right">Enter Topic Details</label>

                                            <div class="col-md-6 m-b-10">
                                                <textarea name="forum_add_body" id="forum_details" cols="30" rows="10" class="form-control" required>@isset($forum){{$forum->body}}@endisset</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6 offset-md-4">
                                            <button type="submit" value="Add Forum Topic" class="btn admin-btn">{{ __($action) }}</button>
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
