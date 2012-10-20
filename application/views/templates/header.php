<html>
    <head>
        <title>grokki - <?php echo $title ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <link href="/css/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="header">
                        <div class="logo" align="left">
                            <img src="/images/grokki_logo_icon_red.gif" alt="grokki logo">
                       </div>
                <?php if ($this->session->userdata('memberid') == TRUE )
                        {
                            echo '<div class="logout" align="right"><a href="/home/logout">Logout</a></div>';
                        } ?>
            </div>
            <div class="main-content">

