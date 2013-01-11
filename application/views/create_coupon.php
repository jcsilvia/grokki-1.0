<?php $this->load->helper('form'); ?>

<div class="main-content">
    <div class="content">



        <?php echo form_open('coupons/create') ?>

        <div class="modify_coupon_back_button"><p><a href="javascript:history.back()">Back</a></p></div>
        <div class="form" >
            <div class="title"><h1>Create Coupon</h1><p>Create a new coupon.</p></div>
            <p>
                <label for="title">Coupon Heading:</label>
                <input title="Coupon heading should be maximum 30 characters." type="text" name="title" size="30" value="<?php echo set_value('title'); ?>"/>
                <?php echo form_error('title'); ?>
            </p>
            <p>
                <label for="description">Description:</label>
                <input title="Coupon description should be maximum 100 characters." type="text" name="description" size="60" value="<?php echo set_value('description'); ?>" />
                <?php echo form_error('description'); ?>
            </p>

            <div>
                <p>
                    <input class="button_signup_form" type="submit" name="submit" value="Create Coupon" />
                </p>
            </div>



            <?php echo form_close() ?>
        </div>

    </div>
    <div style="min-height: 50px;"></div>