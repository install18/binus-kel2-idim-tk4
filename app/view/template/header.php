<?php
if (!isset($_SESSION['username'])) {
    header('Location: ' . BASEURL . 'Pengguna/login');
    exit();
}
?>

<!doctype html>
<html lang="en">

<head>
    <title><?= $data['title']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= ASSETS; ?>css/sidebar.css">
</head>

<body>
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4 pt-5">
                <h2>
                    <class="logo">Toko Berbicara
                </h2>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                    <li>
                        <a href="<?= BASEURL; ?>Barang">Barang</a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>Pembelian">Pembelian</a>
                    </li>
                    <li>
                        <a href="<?= BASEURL; ?>Penjualan">Penjualan</a>
                    </li>
                    <li>
                        <a href="Data_member.html">Data Member</a>
                    </li>
                    <li>
                        <a href="Login.html">Log Out</a>
                    </li>
                </ul>
            </div>
        </nav>