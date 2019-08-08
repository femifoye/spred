<!doctype html>
<html lang="en">

@include('includes.admin-head')
<body>
    <section class="admin-page">
        <div class="page-wrap">
            @include('includes.admin-header-nav')
                <div class="page-content">
                    
                    <div class="article-form-wrap">
                    
                        <form action="" method="POST" class="article-form">
                            <div class="content-header">
                                <h3>Add A New Article</h3>
                            </div>
                            <div class="control-form">
                                <input type="text" name="article-title" placeholder="Enter Article title" required>
                            </div>
                            <div class="control-form">
                                <select name="article-category" id="article-category" required>
                                    <option value="Enter">Choose Article category</option>
                                    <option value="Food">Food</option>
                                    <option value="Entertainment">Entertainment</option>
                                    <option value="Sports">Sports</option>
                                    <option value="Politics">Politics</option>
                                    <option value="Technology">Technology</option>
                                    <option value="Music">Music</option>
                                    <option value="Events">Events</option>
                                    <option value="Celebrity">Celebrity</option>
                                    <option value="Movies/Television">Movies/Television</option>
                                </select>
                            </div>
                            
                            <div class="control-form">
                                <textarea name="article-body" id="article-body" cols="40" rows="20" required></textarea>
                            </div>
                            <div class="control-form">
                                <label for="article-image">Choose featured image</label>
                                <input type="file" name="article-image"required >
                            </div>
                            <div class="control-form">
                                <button type="submit" value="Add Article" class="btn admin-btn">Add Article</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  <!-- PAGE GRID CONTENT END -->
        </div>
    </section>  
    @include('includes.admin-footer'); 
</body>
</html>
