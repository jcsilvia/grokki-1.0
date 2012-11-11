<?php $this->load->helper('form'); ?>

<div class="main-content">

    <h1>What are you looking for?</h1><br>


    <?php echo form_open('search') ?>

    <div style="position:relative;   height: 175px; width: 595px;
    padding-left:5px;
    padding-right:5px;
    background-color:#d3d3d3;
    border-style:solid;
    border-width:thin;
    border-color:black;
    border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;">

        <div style="position:absolute; top:0;left:50;">
            <p>
                <label for="category">Search Category:</label>
                <?php echo form_dropdown('category', $categories, set_value('category'), 'id="category"') ?>
                <?php echo form_error('category'); ?>
            </p>
        </div>
        <div style="position:absolute; top:50;left:50;">
            <p>
                <label for="city">Near City:</label>
                <input type="text" name="city" size="25" value="<?php echo $city->city; ?>" />
                <?php echo form_error('city'); ?>
            </p>
        </div>
        <div style="position:absolute; top:50;left:325;">
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
        <div class="message_form" style="position:absolute; top:100; left:50; ">
            <p>
                <input type="text" name="content" value=" Enter search terms here..." style="width:400px;height:25px;border:1px solid;border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">
                <?php echo form_error('content'); ?>
            </p>
        </div>
        <input type="hidden" name="senderid" value="<?php  echo $this->session->userdata('memberid'); ?>">



    </div>
    <div style="position: absolute;top:275;left:50;">
        <p>
            <input class="button_login_form" type="submit" name="submit" value="Search" />
        </p>
    </div>

    <?php echo form_close() ?>

