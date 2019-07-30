<!doctype html>
<html lang="en">

@include('includes.admin-head')
<body>
    <section class="admin-page">
        <div class="page-wrap">
            @include('includes.admin-header-nav')
                <div class="page-content">
                <div class="content-wrap container">
                <h2 class="text-center">Welcome, User</h2>
                    <div class="dashboard-grid">
                        <div class="dashboard-gi">
                            <div class="dash-tab-img">
                            
                            </div>
                            <div class="count-wrap text-center">
                                <h4>Articles</h4>
                                <h3>(25)</h3>   
                            </div>
                            
                        </div>
                        <div class="dashboard-gi">
                            <div class="dash-tab-img">
                            
                            </div>
                            <div class="count-wrap text-center">
                                <h4>Forum Topics</h4>
                                <h3>(10)</h3>   
                            </div>
                        </div>
                        <div class="dashboard-gi">
                            <div class="dash-tab-img">
                            
                            </div>
                            <div class="count-wrap text-center">
                                <h4>Polls</h4>
                                <h3>(34)</h3>   
                            </div>
                        </div>
                        <div class="dashboard-gi">
                            <div class="dash-tab-img">
                            
                            </div>
                            <div class="count-wrap text-center">
                                <h4>Videos</h4>
                                <h3>(12)</h3>   
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
