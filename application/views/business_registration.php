<?php $this->load->helper('form'); ?>

<div class="main-content">

<div class="content">
    <div style="min-height: 50px;"></div>
<?php echo form_open('signup/business_reg') ?>


<div class="form-container">


    <div class="form" >
        <div class="title"><h1>Your business account has been created.</h1>
        <p>Now we just need a few more details about your business and we'll be ready to<br> start connecting you with consumers in your area.</p></div>
        <p>
            <label for="businessname">Business Name</label>
            <input type="text" name="businessname" size="50" value="<?php echo set_value('businessname'); ?>"/>
            <?php echo form_error('businessname'); ?>
        </p>
        <p>
            <label for="business_category">Primary Business Category</label>
            <?php echo form_dropdown('business_category', $categories, set_value('business_category'), 'id="business_category"') ?>
            <?php echo form_error('business_category'); ?>
        </p>
        <p>
            <label for="address1">Address 1</label>
            <input type="text" name="address1" size="50" value="<?php echo set_value('address1'); ?>" />
            <?php echo form_error('address1'); ?>
        </p>
        <p>
            <label for="address2">Address 2</label>
            <input type="text" name="address2" size="50" value="<?php echo set_value('address2'); ?>" />
            <?php echo form_error('address2'); ?>
        </p>
        <p>
            <label for="city">City</label>
            <input type="text" name="city" size="50" value="<?php echo set_value('city'); ?>" />
            <?php echo form_error('city'); ?>
        </p>
        <p>
            <label for="state">State</label>
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
        </p>
        <p>
            <label for="phone">Primary Phone</label>
            <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" />
            <?php echo form_error('phone'); ?>
        </p>
        <p>
            <label for="fname">Primary Contact First Name</label>
            <input type="text" name="fname" size="25" value="<?php echo set_value('fname'); ?>" />
            <?php echo form_error('fname'); ?>
        </p>
        <p>
            <label for="lname">Primary Contact Last Name</label>
            <input type="text" name="lname" size="25" value="<?php echo set_value('lname'); ?>" />
            <?php echo form_error('lname'); ?>
        </p>
        <p>
            <label for="tags">Tag your business</label>
            <input type="text" name="tags" size="75" value="<?php echo set_value('tags'); ?>" />
            <?php echo form_error('tags'); ?>
        </p>

        <div>
            <p>
                <input class="button_signup_form" type="submit" name="submit" value="Complete my registration" />
            </p>
        </div>
    </div>



    </div>
<?php echo form_close() ?>

</div>
    <div style="min-height: 50px;"></div>