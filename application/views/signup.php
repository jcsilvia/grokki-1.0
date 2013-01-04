<?php $this->load->helper('form'); ?>

<div class="main-content">

<div class="content">

    <div style="min-height: 50px;"></div>

<?php echo form_open('signup/index') ?>


<div>

<div class="form" >
    <div class="title"><h1>Sign up with Grokki today.</h1></div>
<p>
<label for="username">Username</label>
<input type="text" name="username" size="20" value="<?php echo set_value('username'); ?>"/>
<?php echo form_error('username'); ?>
</p>
<p>
<label for="password">Password</label>
<input type="password" name="password" size="15" />
<?php echo form_error('password'); ?>
</p>
<p>
<label for="email">Email Address</label>
<input type="text" name="email" size="50" value="<?php echo set_value('email'); ?>" />
 <?php echo form_error('email'); ?>
</p>
<p>
<label for="zipcode">Zipcode</label>
<input type="text" name="zipcode" size="6" value="<?php echo set_value('zipcode'); ?>" />
 <?php echo form_error('zipcode'); ?>
</p>
<p>
<label for="is_business">Check if this is a business account</label>
<input type="checkbox" name="is_business" value="1" />
</p>
<p>
        Already have an account? <a href="/login/">Sign in here.</a>
</p>
</div>
<div>
<p>
<input class="button_signup_form" type="submit" name="submit" value="Create my account" />
</p>
</div>
</div>
<?php echo form_close() ?>


</div>
    <div style="min-height: 50px;"><p></p></div>