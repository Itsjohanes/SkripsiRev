<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>frontend/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>frontend/css/Articles-Cards-images.css" />
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>frontend/css/Navbar-With-Button-icons.css" />
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center"><span>Alpro</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
                <span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if ($title == 'Alpro') {
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
                <a href="<?= base_url('Auth'); ?>" class="btn btn-primary" type="button">Login</a>
            </div>
        </div>
    </nav>