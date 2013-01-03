<?php $this->load->helper('form'); ?>

<div class="main-content">
<div class="content">
    <div class="title"><h1>Settings - Change Email</h1></div>

    <?php echo form_open('settings/change_email') ?>

    <div style="text-align: right; position:absolute;top:45;right:200;"><p><a href="javascript:history.back()">Back</a></p></div>
    <div class="form" >
        <p>
            <label for="username">New Email:</label>
            <input type="text" name="email" size="50" value="<?php echo set_value('email'); ?>"/>
            <?php echo form_error('email'); ?>
        </p>


    </div>
    <div>
        <p>
            <input class="button_login_form" type="submit" name="submit" value="Update Email" />
        </p>
    </div>



    <?php echo form_close() ?>


</div>