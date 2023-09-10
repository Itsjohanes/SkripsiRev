<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="<?php echo base_url('assets/img/apple-icon.png'); ?>"
    />
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/favicon.png'); ?>" />
    <title><?php echo $title;?></title>
    <link
      rel="stylesheet"
      type="text/css"
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700"
    />
    <!-- Nucleo Icons -->
    <link href="<?php echo  base_url('assets/css/nucleo-icons.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/nucleo-svg.css'); ?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script
      src="https://kit.fontawesome.com/42d5adcbca.js"
      crossorigin="anonymous"
    ></script>
    <!-- Material Icons -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Round"
      rel="stylesheet"
    />
    <!-- CSS Files -->
    <link
      id="pagestyle"
      href="<?php echo base_url('assets/css/material-dashboard.css?v=3.1.0'); ?>"
      rel="stylesheet"
    />
    
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
  <body class="bg-gray-200">
    <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div>