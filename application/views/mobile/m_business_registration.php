<!DOCTYPE html> 
<html> 
<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>Grokki</title> 
	
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
	<link rel="stylesheet" href="css/main.css" />
	<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	<script type="text/javascript" src="js/jquery-templ.js"></script>
</head> 
<body> 
	
<div data-role="page">

    <?php $this->load->view('mobile/m_header.php'); ?>

	<div data-role="content">
		
	    <div><h4>Your business account has been created</h4></div>
		<div><p>Now we just need a few more details about your business and we'll be ready to 
			start connecting you with consumers in your area.</p></div>

		<?php $this->load->helper('form'); ?>
		<?php echo form_open('signup/business_reg') ?>

		<div data-role="fieldcontain">
		    <label for="businessname">Business Name:</label>
		    <input type="text" name="businessname" id="businessname" value="<?php echo set_value('businessname'); ?>" />
            <?php echo form_error('businessname'); ?>
		</div>

		<div data-role="fieldcontain">
		   <label for="business_category" class="select">Business Category:</label>
           <?php echo form_dropdown('business_category', $categories, set_value('business_category'), 'id="business_category" data-mini="true"') ?>
           <?php echo form_error('business_category'); ?>
		</div>

		<div data-role="fieldcontain">
		    <label for="address1">Address 1:</label>
		    <input type="text" name="address1" id="address1" value="<?php echo set_value('address1'); ?>" />
            <?php echo form_error('address1'); ?>
		</div>
		
		<div data-role="fieldcontain">
		    <label for="address2">Address 2:</label>
		    <input type="text" name="address2" id="address2" value="<?php echo set_value('address2'); ?>" />
            <?php echo form_error('address2'); ?>
		</div>

		<div data-role="fieldcontain">
		    <label for="city">City:</label>
		    <input type="text" name="city" id="city" value="<?php echo set_value('city'); ?>" />
            <?php echo form_error('city'); ?>
		</div>

		<div data-role="fieldcontain">
		   <label for="state" class="select">State:</label>
           <select name="state">
           <optgroup label="U.S. States">
               <option value="AK" <?php echo set_select('state', 'AK'); ?> >Alaska</option>
               <option value="AL" <?php echo set_select('state', 'AL'); ?> >Alabama</option>
               <option value="AR" <?php echo set_select('state', 'AR'); ?> >Arkansas</option>
               <option value="AZ" <?php echo set_select('state', 'AZ'); ?> >Arizona</option>
               <option value="CA" <?php echo set_select('state', 'CA'); ?> >California</option>
               <option value="CO" <?php echo set_select('state', 'CO'); ?> >Colorado</option>
               <option value="CT" <?php echo set_select('state', 'CT'); ?> >Connecticut</option>
               <option value="DC" <?php echo set_select('state', 'DC'); ?> >District of Columbia</option>
               <option value="DE" <?php echo set_select('state', 'DE'); ?> >Delaware</option>
               <option value="FL" <?php echo set_select('state', 'FL'); ?> >Florida</option>
               <option value="GA" <?php echo set_select('state', 'GA'); ?> >Georgia</option>
               <option value="HI" <?php echo set_select('state', 'HI'); ?> >Hawaii</option>
               <option value="IA" <?php echo set_select('state', 'IA'); ?> >Iowa</option>
               <option value="ID" <?php echo set_select('state', 'ID'); ?> >Idaho</option>
               <option value="IL" <?php echo set_select('state', 'IL'); ?> >Illinois</option>
               <option value="IN" <?php echo set_select('state', 'IN'); ?> >Indiana</option>
               <option value="KS" <?php echo set_select('state', 'KS'); ?> >Kansas</option>
               <option value="KY" <?php echo set_select('state', 'KY'); ?> >Kentucky</option>
               <option value="LA" <?php echo set_select('state', 'LA'); ?> >Louisiana</option>
               <option value="MA" <?php echo set_select('state', 'MA'); ?> >Massachusetts</option>
               <option value="MD" <?php echo set_select('state', 'MD'); ?> >Maryland</option>
               <option value="ME" <?php echo set_select('state', 'ME'); ?> >Maine</option>
               <option value="MI" <?php echo set_select('state', 'MI'); ?> >Michigan</option>
               <option value="MN" <?php echo set_select('state', 'MN'); ?> >Minnesota</option>
               <option value="MO" <?php echo set_select('state', 'MO'); ?> >Missouri</option>
               <option value="MS" <?php echo set_select('state', 'MS'); ?> >Mississippi</option>
               <option value="MT" <?php echo set_select('state', 'MT'); ?> >Montana</option>
               <option value="NC" <?php echo set_select('state', 'NC'); ?> >North Carolina</option>
               <option value="ND" <?php echo set_select('state', 'ND'); ?> >North Dakota</option>
               <option value="NE" <?php echo set_select('state', 'NE'); ?> >Nebraska</option>
               <option value="NH" <?php echo set_select('state', 'NH'); ?> >New Hampshire</option>
               <option value="NJ" <?php echo set_select('state', 'NJ'); ?> >New Jersey</option>
               <option value="NM" <?php echo set_select('state', 'NM'); ?> >New Mexico</option>
               <option value="NV" <?php echo set_select('state', 'NV'); ?> >Nevada</option>
               <option value="NY" <?php echo set_select('state', 'NY'); ?> >New York</option>
               <option value="OH" <?php echo set_select('state', 'OH'); ?> >Ohio</option>
               <option value="OK" <?php echo set_select('state', 'OK'); ?> >Oklahoma</option>
               <option value="OR" <?php echo set_select('state', 'OR'); ?> >Oregon</option>
               <option value="PA" <?php echo set_select('state', 'PA'); ?> >Pennsylvania</option>
               <option value="PR" <?php echo set_select('state', 'PR'); ?> >Puerto Rico</option>
               <option value="RI" <?php echo set_select('state', 'RI'); ?> >Rhode Island</option>
               <option value="SC" <?php echo set_select('state', 'SC'); ?> >South Carolina</option>
               <option value="SD" <?php echo set_select('state', 'SD'); ?> >South Dakota</option>
               <option value="TN" <?php echo set_select('state', 'TN'); ?> >Tennessee</option>
               <option value="TX" <?php echo set_select('state', 'TX'); ?> >Texas</option>
               <option value="UT" <?php echo set_select('state', 'UT'); ?> >Utah</option>
               <option value="VA" <?php echo set_select('state', 'VA'); ?> >Virginia</option>
               <option value="VT" <?php echo set_select('state', 'VT'); ?> >Vermont</option>
               <option value="WA" <?php echo set_select('state', 'WA'); ?> >Washington</option>
               <option value="WI" <?php echo set_select('state', 'WI'); ?> >Wisconsin</option>
               <option value="WV" <?php echo set_select('state', 'WV'); ?> >West Virginia</option>
               <option value="WY" <?php echo set_select('state', 'WY'); ?> >Wyoming</option>
           </optgroup>
           </select>
           <?php echo form_error('state'); ?>
		</div>

		<div data-role="fieldcontain">
		    <label for="phone">Primary Phone:</label>
		    <input type="text" name="phone" id="phone" value="<?php echo set_value('phone'); ?>" />
            <?php echo form_error('phone'); ?>
		</div>
		
		<div data-role="fieldcontain">
		    <label for="fname">Contact First Name:</label>
		    <input type="text" name="fname" id="fname" value="<?php echo set_value('fname'); ?>" />
            <?php echo form_error('fname'); ?>
		</div>

		<div data-role="fieldcontain">
		    <label for="lname">Contact Last Name:</label>
		    <input type="text" name="lname" id="lname" value="<?php echo set_value('lname'); ?>" />
            <?php echo form_error('lname'); ?>
		</div>

		<div data-role="fieldcontain">
		    <label for="tags">Tag your business:</label>
		    <input type="text" name="tags" id="tags" value="<?php echo set_value('tags'); ?>" />
            <?php echo form_error('tags'); ?>
		</div>

		<div>
			<input class="button" type="submit" name="submit" value="Complete my registration" />
		</div>

	    <?php echo form_close(); ?>		
		
	</div><!-- /content -->
	
	<div data-role="footer" data-position="fixed">
        <?php $this->load->view("mobile/m_sub_nav.php");?>
	</div> <!--footer -->	

</div><!-- /page -->

</body>
</html>
