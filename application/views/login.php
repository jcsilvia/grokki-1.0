<?php $this->load->helper('form'); ?>

<div class="main-content">

<div class="content">

    <div style="min-height: 50px;"></div>

<?php echo form_open('login/index') ?>

<div>

    <div class="login_form" >
        <div class="title"><h1>Sign in to Grokki</h1></div>
        <p>
            <label for="username">Username or Email</label>
            <input title="Enter your username or the email address used to sign up with grokki." type="text" name="username" size="20" value="<?php echo set_value('username'); ?>"/>
            <?php echo form_error('username'); ?>
        </p>
        <p>
            <label for="password">Password</label>
            <input title="Minimum 8 characters. Password is case-sensitive." type="password" name="password" size="15" />
            <?php echo form_error('password'); ?>
            <div class="error">
            <?php echo $msg ?>
            </div>
        </p>
        <div><p>Forgot your password? <a href="/login/forgot_password"> Reset it here.</a></p></div>
        <div><p>Don't have an account? <a href="/signup/"> Create one here.</a></p></div>



        <div>
            <p>
                <input class="button_login_form" type="submit" name="submit" value="Sign in" />
            </p>
        </div>

    </div>

</div>

<?php echo form_close() ?>


</div>
<div><p></p></div>