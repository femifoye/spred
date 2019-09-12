<!doctype html>
<html lang="en">

@include('includes.admin-head')
<body>
    <section class="admin-page">
        <div class="page-wrap">
            @include('includes.admin-header-nav')
                <div class="page-content">

                    <div class="admin-view-wrap">
                        <div class="admin-view-heading">
                            <h5>All Forums - ({{$forums->count()}})</h5>
                        </div>
                        <div class="admin-view">
                            <div class="admin-view-header">
                                <div class="admin-view-header-grid av-grid">
                                    <div class="av-header-title grey-bg">
                                        <h6>Title</h6>
                                    </div>
                                    <div class="av-header-status grey-bg">
                                        <h6>Status</h6>
                                    </div>
                                    <div class="av-header-actions grey-bg">
                                        <h6>Actions</h6>
                                    </div>
                                </div>

                            </div>
                            <div class="admin-view-body">
                            @foreach($forums as $forum)
                                <div class="admin-view-grid av-grid">
                                    <div class="av-title">
                                        <h6>{{$forum->title}}</h6>
                                    </div>
                                    <div class="av-status">
                                        <h6>Published</h6>
                                    </div>
                                    <div class="av-actions">
                                        <div class="edit-action">
                                            <a class="btn" href="{{route('admin.forums.edit', $forum)}}"><h6>Edit</h6></a>
                                        </div>
                                        <div class="delete-action">
                                            <a href="/" class="btn" onclick="event.preventDefault();
                                                     document.getElementById('delete').submit();"><h6>Delete</h6></a>
                                            <form id="delete" method='POST' action="{{route('admin.forums.destroy', $forum)}}" style="display:none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            {{$forums->links()}}
                        </div>

                    </div>
                </div>
            </div>  <!-- PAGE GRID CONTENT END -->
        </div>
    </section>
    @include('includes.admin-footer');
</body>
</html>
