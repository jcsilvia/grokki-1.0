<?php $this->load->helper('form'); ?>

<div class="main-content">
<div class="content">




    <div class="messages-window">
        <div class="home_title"><h1>Send Direct Message</h1></div>
        <div style="text-align:left;"><p><b>Business:</b></p></div><div style="text-align:center; position:absolute;left:320;top:55;"><p><b>Category:</b></b></p></div><div style="text-align: right; position:absolute;right:50;top:55;"><p><b>Location:</b></p></div>


        <div class="message-detail">
            <div style="text-align:left;"> <?php  echo $profile->BusinessName ?></div>
            <div style="text-align:center; position:absolute;left:275;top:0;"> <?php  echo $profile->CategoryName ?></div>
            <div style="text-align: right; position:absolute;right:0;top:0;"> <?php  echo $profile->City; echo ', '; echo $profile->State; ?></div>
            <div style="text-align: right; position:absolute;top:20;"><a href="javascript:history.back()">Back</a></div>



        </div>

        <?php echo form_open('connect/message') ?>

        <div>
            <div class="message_form">
                <p>
                    <textarea name="content" style="width:500px;height:70px;border:1px solid;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Enter your message here...
                    </textarea>
                    <?php echo form_error('content'); ?>
                </p>
                <input type="hidden" name="senderid" value="<?php  echo $this->session->userdata('memberid') ?>">
                <input type="hidden" name="categoryid" value="<?php  echo $profile->CategoryId ?>">
                <input type="hidden" name="associateid" value="<?php  echo $profile->MemberId ?>">
                <div>
                    <p>
                        <input class="button_login_form" type="submit" name="submit" value="Send Reply" />
                    </p>
                </div>
            </div>




        </div>


        <?php echo form_close() ?>
    </div>



</div>
    <div style="min-height: 50px;"></div>