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
    <link rel="icon" href="<?php echo base_url(); ?>assets/img/website/logo.png" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/fancybox/dist/jquery.fancybox.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
</head>

<body>
    <div class="container col-md-12 m-0 p-0 h-100 pb-5">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">
                <img class="pr-3" src="<?php echo base_url(); ?>assets/img/website/logo_text.png" height="30" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-0 ml-auto">
                    <li class="nav-item pl-3 pr-3 pb-1 pt-1">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li class="nav-item pl-3 pr-3 pb-1 pt-1">
                        <a class="nav-link" href="<?php echo base_url(); ?>informasi">Informasi</a>
                    </li>
                    <li class="nav-item pl-3 pr-3 pb-1 pt-1">
                        <a class="nav-link" href="<?php echo base_url(); ?>pengumuman">Pengumuman</a>
                    </li>
                    <?php
                    if($this->session->userdata('status') != null)
                    {
                        if($this->session->userdata('status') != 'login')
                        {
                        ?>
                        <li class="nav-item pl-3 pr-3 pb-1 pt-1">
                            <a class="nav-link" href="<?php echo base_url(); ?>login">Masuk | Daftar</a>
                        </li>
                        <?php
                        }
                        else {
                        ?>
                        <li class="nav-item pl-3 pr-3 pb-1 pt-1 dropdown">
                            <a class="nav-link" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if($this->session->userdata('photo') != null)
                                {
                                    $photo = $this->session->userdata('photo');
                                }
                                else {
                                    $photo = "default.png";
                                }
                                ?>
                                <span style="text-transform: capitalize;">Hi <?php echo $this->session->userdata('username'); ?>!</span> | <img class="rounded-circle" height="30px" width="30px" src="<?php echo base_url(); ?>assets/img/peserta/data/<?php echo $photo; ?>">
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item"><i class="zmdi zmdi-email pr-2"></i>  <?php echo $this->session->userdata('email'); ?></a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>profil"><i class="zmdi zmdi-edit pr-2"></i>  <span class="float-right">Edit Profil</span></a>
                                <a class="dropdown-item" href="<?php echo base_url(); ?>login/signout"><i class="zmdi zmdi-long-arrow-return pr-2"></i>  <span class="float-right">Logout</span></a>
                            </div>
                        </li>
                        <?php
                        }
                    }
                    else {
                    ?>
                    <li class="nav-item pl-3 pr-3 pb-1 pt-1">
                        <a class="nav-link" href="<?php echo base_url(); ?>login">Masuk | Daftar</a>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>