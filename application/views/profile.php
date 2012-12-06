<div class="main-content" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">

    <h1>Connections - Profile for <?php  echo $profile->BusinessName ?></h1><br>


    <div class="profile-window">

<div style="position: relative">
    <p>
       <a href="javascript:history.back()">Back</a>
    </p>
</div>

<div style="position: relative">
    <div style = "text-align: left; position: absolute; left:0; top: 5;">
        <p>
            <b>Grokki User:</b> <?php  echo $profile->UserName ?>
        </p>
    </div>
    <div style="text-align: right;  position: absolute; right:0; top:5;">
        <p>
            <b>Point of Contact:</b> <?php  echo $profile->ContactName ?>
        </p>
    </div>
</div>
<div style="position: relative;">
    <div style="position: absolute; top:25;">
        <p>       <b>Address:</b> <?php  echo $profile->Address1 ?><br>
         <?php  echo $profile->City ?>,
         <?php  echo $profile->State ?>
         <?php  echo $profile->ZipCode ?><br>
</p>

<p>
    <b>Phone:</b> <?php  echo $phone ?>
</p>

<p>
    <b>Date Joined:</b> <?php  echo $profile->DateFormatted ?>
</p>
<p>
    <b>Category of Business:</b> <?php  echo $profile->CategoryName ?>
</p>
    </div>
</div>

</div>