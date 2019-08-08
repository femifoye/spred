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
                                @php $requestRoute = 'chats.update';
                                    $id = $poll->id;
                                    $process = 'Edit Poll';
                                    $action = 'Update Poll';
                                @endphp
                            @else
                                @php $requestRoute = 'chats.store';
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
                                                <textarea type="text" name="chat" id="poll_create_title" class="form-control" value="@isset($poll){{$poll->question}}@endisset" required placeholder="Enter Poll Title"></textarea>
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

