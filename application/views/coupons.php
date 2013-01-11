<div class="main-content">


       <div class="content">

        <div class="messages-window">
            <div class="home_title"><h1>Coupons</h1> <p>Create and manage coupons for your business. Coupons help drive consumer behavior and generate more activity for your business. An active coupons will be displayed with your message responses to user requests and on your profile.</p></div>

            <?php if (count($coupons) < 1) {
            echo '<div style="min-height: 25px;"></div>';
            echo '<div style="font-weight: bold; text-align: center;">There are no active coupons.</div>';
            }
            ?>

            <div style="min-height: 25px;"></div>
            <div class="coupon_nav">
                <div><a href="/coupons/create">Create new coupon</a></div>
                <div><a href="/coupons/view">View all coupons</a></div>
             <?php if (count($coupons) > 0) {
                echo '<div><a href="/coupons/edit/';
                echo $coupons->CouponId;
                echo '">Edit active coupon</a></div>';
                echo '<div><a href="/coupons/delete/';
                echo $coupons->CouponId;
                echo '">Delete active coupon</a></div>';
                echo '<div><a href="/coupons/activate/';
                echo $coupons->CouponId;
                echo '">Modify active coupon date</a></div>';
            } ?>
            </div>

            <?php if (count($coupons) > 0) {
                echo '<div style="min-height: 25px;"></div>';
                echo '<div class="active-coupon">';
                echo '<div class="coupon-title">';
                    echo $coupons->Title;
                echo '</div><div class="coupon-description">';
                    echo $coupons->Description;
                echo '</div><div class="coupon-date">';
                    echo 'Offer valid from: ';
                    echo $coupons->StartDate;
                echo '</div><div class="coupon-date">';
                    echo 'Offer expires on: ';
                    echo $coupons->EndDate;
                echo '</div><div class="coupon-code">';
                    echo 'Ref Code: ';
                    echo $coupons->CouponCode;
                echo '</div><div class="coupon-name">';
                    echo $coupons->BusinessName;
                    echo '<br>@grokki.com';
                echo '</div></div>';

                echo '<div style="min-height: 25px;"></div>';
            } ?>


        </div>



        <div style="min-height: 50px;"></div>


    </div>