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

<body>
    <div class="container col-md-12 m-0 p-0 h-100 row">
        <nav class="shadow p-0 m-0">
            <div class="col-md-12 m-0 pb-3" id="logo">
                <a class="navbar-brand shadow p-2 rounded-lg" href="#">
                    <img class="" src="<?php echo base_url(); ?>assets/img/website/logo.png" height="30" alt="">
                </a>
            </div>
            <div class="col-md-12 m-0 p-1">
                <ul class="navbar-nav mr-0 ml-auto">
                    <li class="nav-item text-center pl-1 pr-1 pb-1 pt-1">
                        <a class="nav-link" href="<?php echo base_url(); ?>logdata/dashboard"><i class="zmdi zmdi-home"></i><br>Home</a>
                    </li>
                    <li class="nav-item text-center pl-1 pr-1 pb-1 pt-1">
                        <a class="nav-link" href="<?php echo base_url(); ?>logdata/berita"><i class="zmdi zmdi-collection-text"></i><br>Upload
                            Berita</a>
                    </li>
                    <li class="nav-item text-center pl-1 pr-1 pb-1 pt-1">
                        <a class="nav-link" href="<?php echo base_url(); ?>logdata/pendaftar"><i class="zmdi zmdi-accounts"></i><br>Data
                            Pendaftar</a>
                    </li>
                    <li class="nav-item text-center pl-1 pr-1 pb-1 pt-1">
                        <a class="nav-link" href="<?php echo base_url(); ?>logdata/nilai"><i class="zmdi zmdi-grid"></i><br>Data Nilai
                            Pendaftar</a>
                    </li>
                    <li class="nav-item text-center pl-1 pr-1 pb-1 pt-1">
                        <a class="nav-link" href="<?php echo base_url(); ?>logdata/kriteria"><i class="zmdi zmdi-view-toc"></i><br>Data
                            Kriteria</a>
                    </li>
                    <li class="nav-item text-center pl-1 pr-1 pb-1 pt-1">
                        <a class="nav-link" href="<?php echo base_url(); ?>logdata/perhitungan"><i class="zmdi zmdi-functions"></i><br>Hasil
                            Perhitungan</a>
                    </li>
                    <li class="nav-item text-center pl-1 pr-1 pb-1 pt-1">
                        <a class="nav-link" href="<?php echo base_url(); ?>logdata/input"><i class="zmdi zmdi-comment-edit"></i><br>Input Nilai
                            Peserta</a>
                    </li>
                </ul>
            </div>
        </nav>