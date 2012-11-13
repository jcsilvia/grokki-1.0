<?php $this->load->helper('form'); ?>

<div class="main-content" xmlns="http://www.w3.org/1999/html">

    <h1>Settings - Change Password</h1><br>

    <?php echo form_open('settings/change_password') ?>

    <div style="text-align: right; position:absolute;top:100;left:475;"><p><a href="javascript:history.back()">Back</a></p></div>
    <div class="form" >
        <p>
            <label for="username">Previous Password:</label>
            <input type="password" name="oldpassword" size="20" value="<?php echo set_value('oldpassword'); ?>"/>
            <?php echo form_error('oldpassword'); ?>
        </p>
        <p>
            <label for="username">New Password:</label>
            <input type="password" name="newpassword1" size="20" value="<?php echo set_value('newpassword1'); ?>"/>
            <?php echo form_error('newpassword1'); ?>
        </p>
        <p>
            <label for="username">Confirm New Password:</label>
            <input type="password" name="newpassword2" size="20" value="<?php echo set_value('newpassword2'); ?>"/>
            <?php echo form_error('newpassword2'); ?>
            <div class="error">
                <?php echo $msg ?>
            </div>
        </p>


    </div>
    <div>
        <p>
            <input class="button" type="submit" name="submit" value="Update Password" />
        </p>
    </div>



    <?php echo form_close() ?>