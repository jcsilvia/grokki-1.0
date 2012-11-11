<?php $this->load->helper('form'); ?>

<div class="main-content">

    <h1>Compose New Message</h1><br>


    <?php echo form_open('home/create_message') ?>

    <div style="position:relative;   height: 200px; width: 595px;
    padding-left:5px;
    padding-right:5px;
    background-color:#d3d3d3;
    border-style:solid;
    border-width:thin;
    border-color:black;
    border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;">

        <div style="position:absolute; top:0;left:50;">
            <p>
            <label for="category">Message Category:</label>
            <?php echo form_dropdown('category', $categories, set_value('category'), 'id="category"') ?>
            <?php echo form_error('category'); ?>
            </p>
        </div>
        <div style="position:absolute; top:50;left:50;">
        <p>
            <label for="zipcode">Near Zipcode</label>
            <input type="text" name="zipcode" size="6" value="<?php echo $zipcode->ZipCode; ?>" />
            <?php echo form_error('zipcode'); ?>
        </p>
        </div>
        <div class="message_form" style="position:absolute; top:100; left:50; ">
            <p>
                <textarea name="content" style="width:500px;height:70px;border:1px solid;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Enter your message here...
                </textarea>
                <?php echo form_error('content'); ?>
            </p>
        </div>
        <input type="hidden" name="senderid" value="<?php  echo $this->session->userdata('memberid'); ?>">



    </div>
    <div style="position: absolute;top:300;left:50;">
        <p>
            <input class="button_login_form" type="submit" name="submit" value="Send Message" />
        </p>
    </div>

    </form>