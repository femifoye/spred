@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(@isset($edit))
            @php $requestRoute = 'categories.update';
                $id = $category->id;
                $process = 'Edit Category';
                $action = 'Update Category';
            @endphp
        @else
            @php $requestRoute = 'categories.store';
                $id = '';
                $action = 'Add Category';
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
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
                                <input id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="name" value="@isset($edit){{ $category->name }}@endisset" required autocomplete="category">
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
@endsection
