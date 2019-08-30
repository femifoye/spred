<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   @include('includes.head')
    <body>
    @include('includes.navigation')
        <section class="page-section">
            <section class="section-inner">
                <div class="container">
                    <div class="edit-profile-wrap">
                        <div class="edit-profile-form">
                            <div class="profile-form-header">
                                <h5 class="text-center">Edit your profile</h5>
                            </div>
                            <form action="">
                                <input type="text" name="profile-display-name" id="profile-display-name" placeholder="Enter display name" class="form-margin form-control">
                                <textarea name="profile-description" id="profile-description" cols="30" rows="10" placeholder="Enter a brief profile description" class="form-margin form-control"></textarea>
                                <label for="profile-display-input">Choose a profile picture</label>
                                <input name="profile-avatar-input" id="profile-display-input" type="file" class="form-margin form-control">
                            </form>
                        </div>
                    </div>
                </div>
                @include('includes.subscribe')
            </section>
        </section>

    @include('includes.footer')
    </body>
</html>

