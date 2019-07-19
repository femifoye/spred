@include('includes.admin-head')
<body>
    <section class="admin-page">
        <div class="page-wrap">
            @include('includes.admin-header-nav')
            
            <div class="page-content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                       
                            <div class="alert alert-danger">
                                <ul>
                                    <!-- @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach -->
                                </ul>
                            </div>
                       
                            <div class="card">
                                <div class="card-header">New Poll</div>

                                <div class="card-body">
                                    <form action="" class="poll-create-form" method="POST">
                                        <div id="poll-options">
                                            <div class="control-form">
                                                <input type="text" name="poll_title" id="poll_create_title" required placeholder="Enter Poll Title">
                                            </div>
                                            <div class="control-form">
                                                <input type="text" name="poll_option_title_1" id="poll_option_title_1" required placeholder="Enter Option 1" data-option="1">
                                            </div>
                                            <div class="control-form">
                                                <input type="text" name="poll_option_title_2" id="poll_option_title_2" required placeholder="Enter Option 2" data-option="2">
                                            </div>
                                        </div>
                                        <div class="poll-add-button">
                                            <div class="control-form">
                                                <a href="/" id="btn-add-option" class="btn btn-md">+ Add another option</a>
                                            </div>
                                        </div>
                                        <div class="control-form">
                                            <button type="submit" class="btn btn-success">Publish Poll</button>
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
   
