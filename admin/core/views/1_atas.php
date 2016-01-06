<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link href='<?php echo 'http://' . $_SERVER['HTTP_HOST'] ?>/favicon.ico' rel='icon' type='image/x-icon'/>
        <?php $setting = $this->db->query("SELECT * FROM tbl_pengaturan")->row() ?>
        <title><?php echo $setting->judul ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo 'http://' . $_SERVER['HTTP_HOST'].'/resto/' ?>assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo 'http://' . $_SERVER['HTTP_HOST'].'/resto/' ?>assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo 'http://' . $_SERVER['HTTP_HOST'].'/resto/' ?>assets/dist/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo 'http://' . $_SERVER['HTTP_HOST'].'/resto/' ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo 'http://' . $_SERVER['HTTP_HOST'].'/resto/' ?>assets/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo 'http://' . $_SERVER['HTTP_HOST'].'/resto/' ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <?php
        /*
        <!-- Recaptcha -->
        <script type="text/javascript">
            var onloadCallback = function () {
                grecaptcha.render('capjay', {
                    'sitekey': '6LdxyQsTAAAAAEZErwn5gGt3RC70ue0wwdAUhZaY',
                    'theme': 'dark light',
                    'size': 'compact'
                });
            };
        </script>
        <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit&hl=id'></script>
        */
        ?>
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div id="wrapper">