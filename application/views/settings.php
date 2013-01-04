<?php $this->load->helper('form'); ?>

<div class="main-content">
    <div class="content">



    <?php echo form_open('settings/index') ?>

    <div style="text-align: right; position:absolute;top:60;right:170;"><p><a href="javascript:history.back()">Back</a></p></div>
    <div class="form" >
        <div class="title"><h1>Profile Settings</h1></div>
        <p>
            <label for="username">Username:</label>
            <input type="text" name="username" size="20" value="<?php echo set_value('username',$profile->UserName); ?>"/>
            <?php echo form_error('username'); ?>
        </p>
        <p>
            Password: **********  <a href="/settings/change_password"> Change Password</a>
        </p>
        <p>
            Email Address: <?php echo $profile->EmailAddress; ?>    <a href="/settings/change_email"> Change Email</a> <?php if($profile->IsEmailVerified == 0) { echo '| <a href="/settings/validate_email"> Validate Email</a>';} ?>
        </p>
        <p>
            <label for="zipcode">Zipcode:</label>
            <input type="text" name="zipcode" size="6" value="<?php echo set_value('zipcode',$profile->ZipCode); ?>" />
            <?php echo form_error('zipcode'); ?>
        </p>


    </div>
    <div>
        <p>
            <input class="button_signup_form" type="submit" name="submit" value="Update Profile" />
        </p>
    </div>



    <?php echo form_close() ?>
   </div>
    <div style="min-height: 50px;"></div>