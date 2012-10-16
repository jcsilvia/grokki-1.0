<?php $this->load->helper('form'); ?>
<?php echo form_open('signup/index') ?>

<div><b>Registration Page</b></div>
<p>
<label for="username">Username</label>
<input type="text" name="username" size="20" value="<?php echo set_value('username'); ?>"/>
<?php echo form_error('username'); ?><br />
</p>
<p>
<label for="password">Password</label>
<input type="text" name="password" size="15" />
<?php echo form_error('password'); ?><br />
</p>
<p>
<label for="email">Email Address</label>
<input type="text" name="email" size="50" value="<?php echo set_value('email'); ?>" />
<?php echo form_error('email'); ?><br />
</p>
<p>
<label for="is_business">Check if this is a business account</label>
<input type="checkbox" name="is_business" value="1" /><br />
</p>
<input type="submit" name="submit" value="Register" />

</form>

