<?php $this->load->helper('form'); ?>

<div class="main-content">
<div class="content">


    <?php echo form_open('settings/change_email') ?>

    <div class="settings_back_button""><p><a href="javascript:history.back()">Back</a></p></div>
    <div class="form" >
        <div class="title"><h1>Change Email</h1></div>
        <p>
            <label for="username">New Email:</label>
            <input title="The primary email address you would like to use for communication with grokki. Changing your email address will require you to validate the new email." type="text" name="email" size="50" value="<?php echo set_value('email'); ?>"/>
            <?php echo form_error('email'); ?>
        </p>
        <div>
            <p>
                <input class="button_login_form" type="submit" name="submit" value="Update Email" />
            </p>
        </div>

    </div>




    <?php echo form_close() ?>


</div>