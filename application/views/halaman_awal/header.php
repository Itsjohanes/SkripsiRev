<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>frontend/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>frontend/css/Articles-Cards-images.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>frontend/css/Navbar-With-Button-icons.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/loader.css" />
</head>
<script>
      var renderPage = true;

      if (
        navigator.userAgent.indexOf("MSIE") !== -1 ||
        navigator.appVersion.indexOf("Trident/") > 0
      ) {
        /* Microsoft Internet Explorer detected in. */
        alert(
          "Please view this in a modern browser such as Chrome or Microsoft Edge."
        );
        renderPage = false;
      }
</script>
<body>
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center"><span>Algoritma Pemrograman</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'Home') {
                                                echo 'active';
                                            } ?>" href="<?= base_url('awal'); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'Informasi') {
                                                echo 'active';
                                            } ?>"" href=" <?= base_url('awal/informasi'); ?>">Informasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'Materi') {
                                                echo 'active';
                                            } ?>"" href=" <?= base_url('awal/materi'); ?>">Materi</a>
                    </li>
                </ul>
                <a href="<?= base_url('auth'); ?>" class="btn btn-primary" type="button">Login</a>
            </div>
        </div>
    </nav>