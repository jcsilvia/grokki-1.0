<?php $this->load->helper('form'); ?>

<div class="main-content">

    <div class="content">

        <div style="min-height: 50px;"></div>

    <?php echo form_open('/login/forgot_password') ?>


    <div class="login_form" >
        <div class="title">
            <h1>Forgot your password?</h1>
        </div>
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

    </div>