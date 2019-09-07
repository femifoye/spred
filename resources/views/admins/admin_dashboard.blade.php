<!doctype html>
<html lang="en">

@include('includes.admin-head')
<body>
    <section class="admin-page">
        <div class="page-wrap">
            @include('includes.admin-header-nav')
                <div class="page-content">
                <div class="content-wrap container">
                <h2 class="text-center">Welcome {{auth::user()->name}}</h2>
                    <div class="dashboard-grid">
                        <div class="dashboard-gi">
                            <div class="dash-tab-img">

                            </div>
                            <div class="count-wrap text-center">
                                <h4><a href="{{url('/articles')}}">Articles</a></h4>
                                <h3><a href="{{url('/articles')}}">({{$articles_count}})</a></h3>
                            </div>

                        </div>
                        <div class="dashboard-gi">
                            <div class="dash-tab-img">

                            </div>
                            <div class="count-wrap text-center">
                                <h4><a href="{{url('/forums')}}">Forum Topics</a></h4>
                                <h3><a href="{{url('/forums')}}">({{$forums_count}})</a></h3>
                            </div>
                        </div>
                        <div class="dashboard-gi">
                            <div class="dash-tab-img">

                            </div>
                            <div class="count-wrap text-center">
                                <h4><a href="{{url('/polls')}}">Polls</a></h4>
                                <h3><a href="{{url('/polls')}}">({{$polls_count}})</a></h3>
                            </div>
                        </div>
                        <div class="dashboard-gi">
                            <div class="dash-tab-img">

                            </div>
                            <div class="count-wrap text-center">
                                <h4><a href="{{url('/videos')}}">Videos</a></h4>
                                <h3><a href="{{url('/videos')}}">({{$videos_count}})</a></h3>
                            </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>  <!-- PAGE GRID CONTENT END -->



        </div>



    </section>

    @include('includes.admin-footer');
</body>
</html>
