<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pustaka Booking | <?= $judul; ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo'); ?>logo-pb.png">
    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>user/css/bootstrap.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a href="<?= base_url() ?>" class="navbar-brand">Pustaka</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="<?= base_url() ?>" class="nav-item nav-link active">Beranda <span class="sr-only">(current)</span></a>
                    <?php
                    if (!empty($this->session->userdata('email'))) {
                    ?>
                        <a href="<?= base_url('booking') ?>" class="nav-item nav-link">Booking <b><?= $this->ModelBooking->getDataWhere('temp', ['email_user' => $this->session->userdata('email')])->num_rows(); ?></b> Buku</a>
                        <a href="<?= base_url('member/myprofil'); ?>" class="nav-item nav-link">Profil Saya</a>
                        <a href="<?= base_url('member/logout'); ?>" class="nav-item nav-link" onclick="return confirm('Yakin ingin Log out?')"><i class="fas fw fa-login"></i> Log out</a>
                    <?php } else { ?>
                        <a href="#" data-toggle="modal" data-target="#daftarModal" class="nav-item nav-link"><i class="fas fw fa-login"></i> Daftar</a>
                        <a href="#" data-toggle="modal" data-target="#loginModal" class="nav-item nav-link"><i class="fas fw fa-login"></i> Log in</a>
                    <?php } ?>
                    <span class="nav-item nav-link nav-right" style="display: block; margin-left: 20px;">Selamat Datang <b><?= $user ?></b></span>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
    