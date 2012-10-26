<html>
<head>
    <title>grokki - <?php echo $title ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="description" content="Relevant, timely, local connections between consumers and businesses.">
    <meta property="og:image" content="http://www.grokki.com/images/grokki_icon2.gif" />
    <meta property="og:title" content="grokki" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://www.grokki.com" />
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <style type="text/css">
        body {background-color:black;background-repeat:no-repeat;margin:0;padding:0;background-size:cover; -webkit-background-size:cover; -moz-background-size: cover; -o-background-size: cover;background-position:center;}
        .welcome-text {color:white;font-family:"helvetica",sans-serif;height: 115px;width:400px; padding: 1em; padding-bottom: 1em; background-color: rgba(0,0,0,0.4); border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;}
        .grok-definition {color:white;font-family:"helvetica",sans-serif;font-size:.6em;padding-left: 1em;}
        .text-container {position:relative;left:20;top:50;}
        .link-container {position:absolute; left: 450; top: 0;color:white;font-family:"helvetica",sans-serif;font-size:1em;padding-left: 1em;
            background-color: rgba(0,0,0,0.4); border-radius: 10px 10px 10px 10px; -moz-border-radius: 10px 10px 10px 10px; -webkit-border-radius: 10px 10px 10px 10px;
            padding: 1em; padding-bottom: 1em; width:140px; height: 115px;font-size:1em;
            font-family:"helvetica",sans-serif;
        }
        .button1{    font-size:.8em;
                        font-family:"helvetica",sans-serif;
                        font-weight: bold;
                        background-color:#d3d3d3;
                        border:1px solid;
                        border-radius: 5px 5px 5px 5px;
        }
        .button1:hover {
            background-color:#a9a9a9;
        }

    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var images = ['landscape1_optimized.jpg', 'landscape2_optimized.jpg', 'landscape3_optimized.jpg'];
            $('body').css({'background-image': 'url(/images/' + images[Math.floor(Math.random() *      images.length)] + ')'});
        })
    </script>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
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
