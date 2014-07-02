<div class="content">
    <h1>Your profile</h1>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div>
        Your username: <?php echo Session::get('user_name'); ?>
    </div>
    <div>
       <p>This is your profile page</p>
       <br/>


       <img src= <?php echo URL.AVATAR_PATH.'default.jpg' ; ?> alt="default_profile_img" />
    </div>
    <div>
        
    </div>
</div>
