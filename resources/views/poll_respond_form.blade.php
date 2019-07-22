@extends('layouts.app')
@section('content')
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
                <div class="card-header">{{ __('Respond To A Poll') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('respond_to_poll', 1)}}" enctype="multipart/form-data">
                        @csrf
                        @isset($edit)
                        {{@method_field('PUT')}}
                        @endisset
                        @foreach($polls as $poll)
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Question') }}</label>
                            <div class="col-md-6">
                                <p>{{$poll->question}}</p>
                                <input type="text" hidden name="poll_id" value="{{$poll->id}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Answer') }}</label>

                            <div class="col-md-6">
                                <select id="category" type="text" class="form-control @error('category') is-invalid @enderror" name="response_id" required autocomplete="category">
                                    <option value=null hidden>Choose Category</option>
                                    <option disabled value=null>Choose Category</option>
                                    @foreach(json_decode($poll->options) as $key => $option)
                                    <option @isset($article) @if($article->category_id == $category->id) selected @endif @endisset value="{{$key}}">{{$option}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Response') }}
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
