<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ASLAB</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Presensi Acara QR Code">
    <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/website/logo.png" type="image/png">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style_admin.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/fancybox/dist/jquery.fancybox.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/calendar/src/mini-event-calendar.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
</head>

<body class="pt-5" id="login">
    <div class="shadow col-md-4 offset-md-4 mt-5 p-5" id="body">
        <h4 class="text-center">Admin</h4>
        <div class="col-12 p-3">
            <?php
            if(isset($_GET['page']) && isset($_GET['msg']))
            {
                if($_GET['page'] == 'login' && $_GET['msg'] == '1')
                {
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Username dan Password</strong> tidak di ada di data manapun
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
                }
            }
            ?>
        </div>
        <form method="post" action="<?php echo base_url(); ?>logdata/login/login_aksi">
            <div class="form-group">
                <input type="text" class="form-control rounded-pill" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control rounded-pill" name="password" placeholder="Passsword" required>
            </div>
            <div class="clearfix">
                <button type="submit" class="btn-login rounded-pill p-1 pl-3 pr-3 float-right">Masuk</button>
            </div>
        </form>
    </div>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/fancybox/dist/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/vendor/calendar/src/mini-event-calendar.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/main_admin.js"></script>

</body>

</html>