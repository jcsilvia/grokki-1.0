<html>
    <head>
        <title>grokki - <?php echo $title ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <?php if ($title == 'Home') {echo'<meta http-equiv="refresh" content="30" >';} ?>
        <link href="/css/main.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
        <script type="text/JavaScript" src="/js/form_tooltips.js"></script>
        <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    </head>
    <body>
    <?php $this->load->view('analytics_tracking.php'); ?>
    <div class="wrap">
            <div class="header">
                        <div class="logo" align="left">
                            <a href="/home/"><img src="/images/grokki_logo_icon_red.gif" alt="grokki logo"></a>
                       </div>
                <?php if ($this->session->userdata('is_business') == 0 AND $this->session->userdata('memberid') == TRUE )
                        {
                            echo '<div class="compose"><a href="/home/create_message">New Message</a></div>';
                        } ?>

                <?php if ($this->session->userdata('memberid') == TRUE )
                        {
                            echo '<div class="logout" align="right"><a href="/home/logout">Logout</a></div>';
                        } ?>
            </div>






