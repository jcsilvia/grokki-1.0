<?php $this->load->helper('form'); ?>

<div class="main-content">

    <?php echo form_open('/login/forgot_password') ?>



    <div class="content_text">
        <h1>Forgot your password?</h1>
    </div>
    <div class="login_form" >
        <p>
            <label for="username">Enter username or email</label>
            <input type="text" name="username" size="50" value="<?php echo set_value('username'); ?>"/>
            <?php echo form_error('username'); ?>
        </p>
        <div><p>Have an account? <a href="/login/"> Login here.</a></p></div>
    </div>
    <div>
        <p>
            <input class="button_login_form" type="submit" name="submit" value="Submit" />
        </p>
    </div>



    <?php echo form_close() ?>