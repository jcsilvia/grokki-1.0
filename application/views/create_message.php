<?php $this->load->helper('form'); ?>

<div class="main-content">
<div class="content">



    <?php echo form_open('home/create_message') ?>

    <div class="new_message_form">
        <div class="title"><h1>Compose New Message</h1></div>
        <div>
            <p>
            <label for="category">Category:</label>
            <?php echo form_dropdown('category', $categories, set_value('category'), 'id="category"') ?>
            <?php echo form_error('category'); ?>
            </p>
        </div>

        <div>
            <p>
                <label for="city">Near City:</label>
                <input type="text" name="city" size="25" value="<?php echo $city->city; ?>" />
                <?php echo form_error('city'); ?>
            </p>
        </div>
        <div style="position: absolute; top:80; right: 150;">
            <p><label for="state">State:</label>


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

                echo form_dropdown('state', $options, $state->state);

                ?>


                <?php echo form_error('state'); ?>
            </p>
        </div>

        <div class="message_textarea">
            <p>
                <textarea name="content" style="width:475px;height:80px;border:1px solid;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">Enter your message here...
                </textarea>
                <?php echo form_error('content'); ?>
            </p>

        </div>
        <input type="hidden" name="senderid" value="<?php  echo $this->session->userdata('memberid'); ?>">



    </div>
    <div>
        <p>
            <input class="button_signup_form" type="submit" name="submit" value="Send Message" />
        </p>
    </div>

    <?php echo form_close() ?>

</div>
    <div style="min-height: 50px;"></div>