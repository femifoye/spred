<div class="forum-modals">
    <div class="forum-reply-modal">
        <div class="forum-reply-modal-inner forum-modal hide">
            @auth
            <div class="forum-reply-modal-form">
                <form action="{{route('forum_comment', $forum)}}" method="POST">
                    @csrf
                    <div class="forum-reply-form-title">
                        <h5 class="text-center">Reply to this topic</h5>
                    </div>
                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="control-form">
                        <textarea name="comment" id="forum-reply-fc" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="control-form forum-modal-reply-button">
                        <button type="submit" class="btn btn-lg forum-reply-button-submit">Reply</button>
                        <a class="btn btn-lg btn-danger forum-reply-button-close">Cancel</a>

                    </div>
                </form>

            </div>
            @else
            <div  class="forum-add-modal-form">
                <div class="forum-add-topic-title">
                    <h5 class="text-center">You need to login to reply to a discussion of a forum</h5>
                </div>
                <div class="control-form forum-modal-add-button">
                    <a class="btn btn-lg btn-success" href="{{url('/login')}}">Login</a>
                    <a class="btn btn-lg btn-danger forum-reply-button-close">Forget it!</a>
                </div>
            </div>
            @endauth
        </div>
        <div class="forum-add-modal-inner forum-modal hide">
            @auth
            <div class="forum-add-modal-form">
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form action="{{route('forums.store')}}" method="POST">
                    @csrf
                    <div class="forum-add-topic-title">
                        <h5 class="text-center">Start a new conversation</h5>
                    </div>
                    <div class="control-form">
                        <input type="text" name="forum_topic_title" id="forum_topic_title" value="{{old('forum_topic_title')}}" class="form-control @error('forum_topic_title') is-invalid @enderror" placeholder="Enter forum topic" required>
                    </div>
                    <div class="control-form">
                        <select name="forum_add_category" id="forum_add_category" class="form-control @error('forum_add_category') is-invalid @enderror" required>
                            <option value='' disabled>Add Category</option>
                            <option value='' hidden>Add Category</option>
                            @foreach($categories as $category)
                            <option @if( (int)($category->id) == (int)(old('forum_add_category'))) selected @endif value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="control-form">
                        <input type="text" name="forum_add_tags" id="forum_add_tags" class="form-control @error('forum_add_tags') is-invalid @enderror" value="{{old('forum_add_tags')}}" placeholder="Enter tags seperated by a comma">
                    </div>
                    <div class="control-form">
                        <textarea name="forum_add_body" id="forum_add_body" cols="30" rows="10" class="form-control forum-add-details @error('forum_add_body') is-invalid @enderror " placeholder="Enter topic details" required>{{old('forum_add_body')}}</textarea>
                    </div>
                    <div class="control-form forum-modal-add-button">
                        <button type="submit" class="btn btn-lg forum-add-button-submit">Submit</button>
                        <a class="btn btn-lg forum-add-button-close">Cancel</a>
                    </div>
                </form>
            </div>
            @else
            <div  class="forum-add-modal-form">
                <div class="forum-add-topic-title">
                    <h5 class="text-center">You need to login to add a topic to a forum</h5>
                </div>
                <div class="control-form forum-modal-add-button">
                    <a class="btn btn-lg btn-success" href="{{url('/login')}}">Login</a>
                    <a class="btn btn-lg forum-add-button-close">Forget it!</a>
                </div>
            </div>
            @endauth
        </div>
    </div>
</div>
