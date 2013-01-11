<?php $this->load->helper('form'); ?>
<script>
$(function() {
$( "#datepicker" ).datepicker({ minDate: -1, maxDate: "+1M" });
});
$(function() {
    $( "#datepicker2" ).datepicker({ minDate: +1, maxDate: "+1Y" });
});
</script>



<div class="main-content">
    <div class="content">



        <?php echo form_open('coupons/activate') ?>

        <div class="modify_coupon_back_button"><p><a href="javascript:history.back()">Back</a></p></div>
        <div class="form" >

            <div class="title"><h1>Activate Coupon</h1><p>Add a valid start and end date to activate a coupon.</p></div>
            <?php
            echo '<div style="min-height: 25px;"></div>';
            echo '<div class="active-coupon">';
            echo '<div class="coupon-title">';
            echo $coupons->Title;
            echo '</div><div class="coupon-description">';
            echo $coupons->Description;
            echo '</div><div class="coupon-date">';
            echo 'Offer valid from: ';

            echo '</div><div class="coupon-date">';
            echo 'Offer expires on: ';

            echo '</div><div class="coupon-code">';
            echo 'Ref Code: ';
            echo $coupons->CouponCode;
            echo '</div><div class="coupon-name">';
            echo $coupons->BusinessName;
            echo '<br>@grokki.com';
            echo '</div></div>';
            ?>

            <p>
                <label for="startdate">Start Date:</label>
            <?php if (count($coupon_dates) > 0) {
                echo '<input title="Please choose a valid date." type="text" id="datepicker" name="startdate" size="12" value="'; echo set_value('startdate',$coupon_dates->StartDate);
                echo '"/>';

            } else
            {
                echo '<input title="Please choose a valid date." type="text" id="datepicker" name="startdate" size="12" value="'; echo set_value('startdate');
                echo '"/>';
            }
                ?>
                <?php echo form_error('enddate'); ?>
            </p>
            <p>
                <label for="enddate">End Date:</label>

        <?php if (count($coupon_dates) > 0) {
                echo '<input title="Please choose a valid date." type="text" id="datepicker2" name="enddate" size="12" value="'; echo set_value('enddate',$coupon_dates->EndDate);
                echo '"/>';

            } else
            {
                echo '<input title="Please choose a valid date." type="text" id="datepicker2" name="enddate" size="12" value="'; echo set_value('enddate');
                echo '"/>';
            }
                ?>
                <?php echo form_error('enddate'); ?>
            </p>
            <input type="hidden" name="couponid" value="<?php  echo $coupons->CouponId ?>">
            <div>
                <p>
                    <input class="button_signup_form" type="submit" name="submit" value="Activate Coupon" />
                </p>
            </div>



            <?php echo form_close() ?>
        </div>

    </div>
    <div style="min-height: 50px;"></div>