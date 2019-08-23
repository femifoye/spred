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
                            <h5>All Articles - (10)</h5>
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
                                <div class="admin-view-grid av-grid">
                                    <div class="av-title">
                                        <h6>Genesis Cinema</h6>
                                    </div>
                                    <div class="av-status">
                                        <h6>Published</h6>
                                    </div>
                                    <div class="av-actions">
                                        <div class="draft-action">
                                            <h6>Draft</h6>
                                        </div>
                                        <div class="edit-action">
                                            <h6>Edit</h6>
                                        </div>
                                        <div class="delete-action">
                                            <h6>Delete</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="admin-view-grid av-grid">
                                    <div class="av-title">
                                        <h6>Laravel Vs Express</h6>
                                    </div>
                                    <div class="av-status">
                                        <h6>Draft</h6>
                                    </div>
                                    <div class="av-actions">
                                        <div class="draft-action">
                                            <h6>Publish</h6>
                                        </div>
                                        <div class="edit-action">
                                            <h6>Edit</h6>
                                        </div>
                                        <div class="delete-action">
                                            <h6>Delete</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="admin-view-grid av-grid">
                                    <div class="av-title">
                                        <h6>10 Ways to be productive at work</h6>
                                    </div>
                                    <div class="av-status">
                                        <h6>Published</h6>
                                    </div>
                                    <div class="av-actions">
                                        <div class="draft-action">
                                            <h6>Draft</h6>
                                        </div>
                                        <div class="edit-action">
                                            <h6>Edit</h6>
                                        </div>
                                        <div class="delete-action">
                                            <h6>Delete</h6>
                                        </div>
                                    </div>
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
