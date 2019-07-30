<div class="forum-modals">
    <div class="forum-reply-modal">
        <div class="forum-reply-modal-inner forum-modal hide">
            <div class="forum-reply-modal-form">
                <form action="" method="POST">
                    <div class="forum-reply-form-title">
                        <h5 class="text-center">Reply to this topic</h5>
                    
                    </div>
                    <div class="control-form">
                        <textarea name="forum-reply-fc" id="forum-reply-fc" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="control-form forum-modal-reply-button">
                        <button type="submit" class="btn btn-lg forum-reply-button-submit">Reply</button>
                        <a class="btn btn-lg forum-reply-button-close">Cancel</a>

                    </div>
                </form>

            </div>
        </div>
        <div class="forum-add-modal-inner forum-modal hide">
                <div class="forum-add-modal-form">
                    <div class="forum-add-topic-title">
                        <h5 class="text-center">Start a new conversation</h5>
                    </div>
                    <div class="control-form">
                        <input type="text" name="forum-topic-title" id="forum-topic-title" class="form-control" placeholder="Enter forum topic" required>
                    </div>
                    <div class="control-form">
                        <select name="forum-add-category" id="forum-add-category" class="form-control" required>
                            <option value="Add Category"disabled>Add Category</option>
                            <option value="Category 1">Category 1</option>
                        </select>
                    </div>
                    <div class="control-form">
                        <input type="text" name="forum_add_tags" id="forum_add_tags" class="form-control" placeholder="Enter tags seperated by a comma">
                    </div>
                    <div class="control-form">
                        <textarea name="forum_add_body" id="forum_add_body" cols="30" rows="10" class="form-control forum-add-details" placeholder="Enter topic details" required></textarea>
                    </div>
                    <div class="control-form forum-modal-add-button">
                        <button type="submit" class="btn btn-lg forum-add-button-submit">Submit</button>
                        <a class="btn btn-lg forum-add-button-close">Cancel</a>

                    </div>
                </div>
            </div>
    </div>
</div>