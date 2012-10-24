<html>
    <head>
        <title>grokki - <?php echo $title ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <?php if ($title == 'Home') {echo'<meta http-equiv="refresh" content="30" >';} ?>
        <link href="/css/main.css" rel="stylesheet" type="text/css">
        <style>
            a:link {text-decoration:none;color:white;}
            a:visited {text-decoration:none;color:white;}
            a:hover {text-decoration:none;color:red;}
            a:active {text-decoration:none;}
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                        <div class="logo" align="left">
                            <a href="/home/"><img src="/images/grokki_logo_icon_red.gif" alt="grokki logo"></a>
                       </div>
                <?php if ($this->session->userdata('memberid') == TRUE )
                        {
                            echo '<div class="logout" align="right"><a href="/home/logout">Logout</a></div>';
                        } ?>
            </div>



