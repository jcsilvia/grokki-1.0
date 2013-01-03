<?php $this->load->helper('form'); ?>

<div class="main-content">
<div class="content">
  <div class="title">  <h1>What are you looking for?</h1></div>


    <?php echo form_open('search') ?>

    <div class="new_message_form">

        <div>
            <p>
                <label for="category">Search Category:</label>
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
        <div class="search_textbox">
            <p>
                <input type="text" name="content" value=" Enter business name or search terms here..." style="width:400px;height:25px;border:1px solid;border-radius: 5px 5px 5px 5px; -moz-border-radius: 5px 5px 5px 5px; -webkit-border-radius: 5px 5px 5px 5px;" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">
                <?php echo form_error('content'); ?>
            </p>
        </div>
        <input type="hidden" name="senderid" value="<?php  echo $this->session->userdata('memberid'); ?>">



    </div>
    <div>
        <p>
            <input class="button_signup_form" type="submit" name="submit" value="Search" />
        </p>
    </div>

    <?php echo form_close() ?>

</div>