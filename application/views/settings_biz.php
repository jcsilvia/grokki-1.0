<?php $this->load->helper('form'); ?>

<div class="main-content">
    <div class="content">


    <?php echo form_open('settings/index') ?>


    <div class="form" >
        <div class="title"><h1>Profile Settings</h1><p>Manage your account profile, settings, and change your password.</p></div>
        <p>
            <label for="username">Username:</label>
            <input title="Must be at least 5 characters." type="text" name="username" size="20" value="<?php if (isset($username)) echo set_value('username',$username); ?>"/>
            <?php echo form_error('username'); ?>
        </p>
        <p>
            Password: **********  <a href="/settings/change_password"> Change Password</a>
        </p>
        <p>
            Email Address: <?php if (isset($profile->EmailAddress)) echo $profile->EmailAddress; ?>    <a href="/settings/change_email"> Change Email</a> <?php if(isset($profile->IsEmailVerified) && $profile->IsEmailVerified == 0) { echo '| <a href="/settings/validate_email"> Validate Email</a>';} ?>
        </p>
        <p>
            <label for="zipcode">Zipcode:</label>
            <input title="The 5-digit zip for the primary location of your business." type="text" name="zipcode" size="6" value="<?php if (isset($profile->ZipCode)) echo set_value('zipcode',$profile->ZipCode); ?>" />
            <?php echo form_error('zipcode'); ?>
        </p>
        <p>
            <label for="businessname">Business Name</label>
            <input title="The name of your business. Maximum 50 characters." type="text" name="businessname" size="50" value="<?php if (isset($profile->BusinessName)) echo set_value('businessname',$profile->BusinessName); ?>"/>
            <?php echo form_error('businessname'); ?>
        </p>
        <p>
            <label for="business_category">Primary Business Category</label>
            <?php if (isset($profile->CategoryId)) {echo form_dropdown('business_category', $categories, set_value('business_category', $profile->CategoryId), 'id="business_category"');}
                  else {echo form_dropdown('business_category', $categories, set_value('business_category', 1), 'id="business_category"');}

            ?>

            <?php echo form_error('business_category'); ?>
        </p>
        <p>
            <label for="address1">Address 1</label>
            <input title="The street address of the primary location of your business." type="text" name="address1" size="50" value="<?php if (isset($profile->Address1)) echo set_value('address1',$profile->Address1); ?>" />
            <?php echo form_error('address1'); ?>
        </p>
        <p>
            <label for="address2">Address 2</label>
            <input type="text" name="address2" size="50" value="<?php if (isset($profile->Address2)) echo set_value('address2',$profile->Address2); ?>" />
            <?php echo form_error('address2'); ?>
        </p>
        <p>
            <label for="city">City</label>
            <input title="The town or city where your business is located." type="text" name="city" size="50" value="<?php if (isset($profile->City)) echo set_value('city',$profile->City); ?>" />
            <?php echo form_error('city'); ?>
        </p>
        <p>
            <label for="state">State</label>
            <?php


            $options = array(
                'AK' => 'Alaska',
                'AL' => 'Alabama',
                'AR' => 'Arkansas',
                'AZ' => 'Arizona',
                'CA' => 'California',
                'CO' => 'Colorado',
                'CT' => 'Connecticut',
                'DC' => 'District of Columbia',
                'DE' => 'Delaware',
                'FL' => 'Florida',
                'GA' => 'Georgia',
                'HI' => 'Hawaii',
                'IA' => 'Iowa',
                'ID' => 'Idaho',
                'IL' => 'Illinois',
                'IN' => 'Indiana',
                'KS' => 'Kansas',
                'KY' => 'Kentucky',
                'LA' => 'Louisiana',
                'MA' => 'Massachusetts',
                'MD' => 'Maryland',
                'ME' => 'Maine',
                'MI' => 'Michigan',
                'MN' => 'Minnesota',
                'MO' => 'Missouri',
                'MS' => 'Mississippi',
                'MT' => 'Montana',
                'NC' => 'North Carolina',
                'ND' => 'North Dakota',
                'NE' => 'Nebraska',
                'NH' => 'New Hampshire',
                'NJ' => 'New Jersey',
                'NM' => 'New Mexico',
                'NV' => 'Nevada',
                'NY' => 'New York',
                'OH' => 'Ohio',
                'OK' => 'Oklahoma',
                'OR' => 'Oregon',
                'PA' => 'Pennsylvania',
                'RI' => 'Rhode Island',
                'SC' => 'South Carolina',
                'SD' => 'South Dakota',
                'TN' => 'Tennessee',
                'TX' => 'Texas',
                'UT' => 'Utah',
                'VA' => 'Virginia',
                'VT' => 'Vermont',
                'WA' => 'Washington',
                'WI' => 'Wisconsin',
                'WV' => 'West Virginia',
                'WY' => 'Wyoming'
            );

            if (isset($profile->State)) { echo form_dropdown('state', $options, $profile->State);}
            else {echo form_dropdown('state', $options, 'AK');}
            ?>


            <?php echo form_error('state'); ?>
        </p>
        <p>
            <label for="phone">Primary Phone</label>
            <input title="The 10-digit phone number for your business. No dashes, spaces or parenthesis." type="text" name="phone" value="<?php if (isset($profile->PhoneNumber)) echo set_value('phone',$profile->PhoneNumber); ?>" />
            <?php echo form_error('phone'); ?>
        </p>
        <p>
            <label for="fname">Primary Contact First Name</label>
            <input title="The first name of the primary contact for your business." type="text" name="fname" size="25" value="<?php if (isset($profile->FirstName)) echo set_value('fname',$profile->FirstName); ?>" />
            <?php echo form_error('fname'); ?>
        </p>
        <p>
            <label for="lname">Primary Contact Last Name</label>
            <input title="The last name of the primary contact for your business." type="text" name="lname" size="25" value="<?php if (isset($profile->LastName)) echo set_value('lname',$profile->LastName); ?>" />
            <?php echo form_error('lname'); ?>
        </p>
        <p>
            <label for="tags">Tag your business</label>
            <input title="Enter a list of comma-separated keywords that describe your business. For example, a car dealer might use Ford, Lincoln, New car, Pre-owned car, New truck, Pre-owned truck." type="text" name="tags" size="75" value="<?php if (isset($profile->Tags)) echo set_value('tags',$profile->Tags); ?>" />
            <?php echo form_error('tags'); ?>
        </p>

        <div>
            <p>
                <input class="button_signup_form" type="submit" name="submit" value="Update Profile" />
            </p>
        </div>

    </div>




    <?php echo form_close() ?>

    </div>
    <div style="min-height: 50px;"></div>