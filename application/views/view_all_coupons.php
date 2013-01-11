<div class="main-content">


    <div class="content">

        <div class="messages-window">
            <div class="home_title"><h1>View Coupons</h1> <p>View, modify, activate, and delete all coupons.</p></div>

            <div class="view_all_coupon_back_button"><p><a href="javascript:history.back()">Back</a></p></div>

            <?php if (count($coupons) < 1) {
            echo '<div style="min-height: 25px;"></div>';
            echo '<div style="font-weight: bold; text-align: center;">There are no active coupons.</div>';
        }
            ?>

            <div style="min-height: 25px;"></div>
        <?php foreach ($coupons as $coupon): ?>

            <?php if (count($coupons) > 0) {
            echo '<div style="min-height: 25px;"></div>';
            echo '<div class="active-coupon">';
            echo '<div class="coupon-title">';
            echo $coupon['Title'];
            echo '</div><div class="coupon-description">';
            echo $coupon['Description'];
            echo '</div><div class="coupon-date">';
            echo 'Offer valid from: ';
            echo '</div><div class="coupon-date">';
            echo 'Offer expires on: ';
            echo '</div><div class="coupon-code">';
            echo 'Ref Code: ';
            echo $coupon['CouponCode'];
            echo '</div><div class="coupon-name">';
            echo $coupon['BusinessName'];
            echo '<br>@grokki.com';
            echo '</div>';
            echo '<div class="coupon-modify"><a href="/coupons/edit/';
            echo $coupon['CouponId'];
            echo '">Edit Coupon</a></div>';
            echo '<div class="coupon-modify"><a href="/coupons/delete/';
            echo $coupon['CouponId'];
            echo '">Delete Coupon</a></div>';
            echo '<div class="coupon-modify"><a href="/coupons/activate/';
            echo $coupon['CouponId'];
            echo '">Activate Coupon</a></div></div>';

            echo '<div style="min-height: 25px;"></div>';
        } ?>

       <?php endforeach ?>
            <div><p>
            <?php
            if (count($coupons) > 0) {
                echo (count($coupons));
                echo ' of ';
                echo $total;
                echo ' coupons';
            }
            ?></p>
            </div>
            <div class="coupon-links"><p><?php echo $links; ?></p></div>
        </div>



        <div style="min-height: 50px;"></div>


    </div>