<div class="forum-replies">
@foreach($commentable->comments()->get() as $comment)
    <div class="forum-reply">
        <div class="forum-reply-dots">
            <div class="forum-reply-dot"></div>
            <div class="forum-reply-dot"></div>
            <div class="forum-reply-dot"></div>
        </div>
        <div class="forum-reply-body">
            <div class="fb-reply-icons">
                <div class="fb-headers-img">
                    <i class="fa fa-user-circle dummy-user-icon" aria-hidden="true"></i>
                </div>
                <div class="fb-headers-name fb-header">
                    <h5>{{$comment->user()->first()->name}}</h5>
                </div>
                <div class="fb-headers-time fb-header">
                    <h6>{{strftime("%d %b %Y",strtotime($comment->created_at))}}</h6>
                    
                </div>
            </div>
            <div class="forum-reply-details">
                <p>
                    {{$comment->body}}
                </p>
            </div>
        </div>

    </div>
    @endforeach
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="m-t-30">
        <form class="row justify-content-center" action="{{route($named_route, $commentable)}}" method="POST">
            @csrf
            <textarea rows="4" class="form-control col-sm-10" name="comment"></textarea>
            <div class="align-self-end p-l-10">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>
