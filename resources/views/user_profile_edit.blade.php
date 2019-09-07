<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
    <body>
    @include('includes.navigation')
        <section class="page-section">
            <section class="section-inner">
                <div class="container">
                    <div class="edit-profile-wrap">
                        <div class="edit-profile-form">
                            @php
                                if(@isset($profile)){
                                    $requestRoute = 'profile.update';
                                    $user = auth::user()->profile;
                                    $process = 'Edit Profile';
                                    $action = 'Update Profile';
                                    $method = 'PUT';
                                }else{
                                    $requestRoute = 'profile.store';
                                    $user = null;
                                    $action = 'Create Profile';
                                    $process = $action;
                                    $method = 'POST';
                                }
                            @endphp
                            <div class="profile-form-header">
                                <h5 class="text-center">Edit your profile</h5>
                            </div>
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

                            @isset($profile)
                            <form action="{{route($requestRoute, $user)}}" method="POST">
                                @csrf
                                @method($method)
                                <div class="row">
                                    <div class="col-sm-9 form-margin">
                                        <input type="text" name="name" id="profile-display-name" placeholder="Enter display name" value="{{auth::user()->name}}" class="form-control">
                                    </div>
                                    <div class="col-sm-3 form-margin">
                                        <button type="submit" value="Edit Profile" class="btn btn-primary btn-edit-profile">Update My Name</button>
                                    </div>
                                </div>
                            </form>
                            @endisset
                            <form action="{{route($requestRoute, $user)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method($method)
                                <textarea name="about" id="profile-description" cols="30" rows="10" placeholder="Enter a brief profile description" class="form-margin form-control"></textarea>
                                <label for="profile-display-input">Choose a profile picture</label>
                                <input name="image" id="profile-display-input" type="file" class="form-margin form-control">
                                <button type="submit" value="Edit Profile" class="btn btn-primary btn-edit-profile">{{$action}}</button>
                            </form>
                        </div>
                    </div>
                </div>
                @include('includes.subscribe')
            </section>
        </section>

    @include('includes.footer')
    </body>
</html>

