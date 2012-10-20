<?php $this->load->helper('form'); ?>
<?php echo form_open('login/index') ?>



    <div class="content_text">
        <h1>Sign in to Grokki</h1>
    </div>
    <div class="login_form" >
        <p>
            <label for="username">Username</label>
            <input type="text" name="username" size="20" value="<?php echo set_value('username'); ?>"/>
            <?php echo form_error('username'); ?>
        </p>
        <p>
            <label for="password">Password</label>
            <input type="text" name="password" size="15" />
            <?php echo form_error('password'); ?>
            <div class="error">
            <?php echo $msg ?>
            </div>
        </p>
    </div>
    <div>
        <p>
            <input class="button_login_form" type="submit" name="submit" value="Sign in" />
        </p>
    </div>

</form>



