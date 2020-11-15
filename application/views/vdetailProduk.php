<!doctype html>
<html lang="en">
    x<head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="<?= base_url('assets/produk/css/style.css')?>">
        <?php foreach ($produk as $l) : ?>
            <title><?= $l->nama_produk ?></title>
        <?php endforeach;  ?>
    </head>
    <body>
    <div class="container">
        <header class="head my-3">
            <nav class="navbar navbar-expand-lg navbar-light head__custom-nav">
                <a class="navbar-brand d-flex align-items-center" href="<?= base_url('')?>">
                    <img src="<?= base_url('assets/dashboard/img/logo.png')?>" alt="website logo">
                    <span>Laris Shop</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span><img src="assets/images/menu.png" alt=""></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url('')?>" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="<?= base_url('produk')?>">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Keranjang</a>
                        </li>
                        <?php if (($this->session->userdata('role'))) {  ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $user['name']; ?></a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/logout')?>">Logout</a>
                                </div>
                            </li>
                        <?php }else{ ?>
                        <?php  ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('auth')?>">Login</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </header>
    </div>

    <div class="container">
        <div class="card mb-3 mt-3">
            <div class="row no-gutters">
                <?php foreach ($produk as $l) : ?>
                <div class="col-md-4">
                <img src="<?= base_url('upload/'.$l->produk_img)?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><?= $l->nama_produk ?></h4>
                    <hr>
                    <h4 class="card-title"><?= 'IDR '.number_format(" $l->harga", 0, ",", "."); ?> </h4>

                    <table >
                        <tr>
                            <td>
                                <p class="card-text"><span class="text-muted">Merk </span></p>
                            </td>
                            <td>
                                <p class="card-text"><span class="ml-5">: <?= $l->merk ?></span></p>
                            </td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">Deskripsi </span></td>
                            <td><span class="ml-5"> : <?= $l->deskripsi ?> </span></td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">Stok </span></td>
                            <td><span class="ml-5"> : <?= $l->stok ?> </span></td>
                        </tr>
                        <tr>
                            <td><span class="text-muted">Nama Penjual </span></td>
                            <td><span class="ml-5"> : <?= $l->name ?> </span></td>
                        </tr>
                    </table>

                    <?php 
                            echo form_open('user/tambahkeranjang');
                            echo form_hidden('id', $l->produk_id);
                            echo form_hidden('qty', 1);
                            echo form_hidden('price', $l->harga);
                            echo form_hidden('name', $l->nama_produk);
                            echo form_hidden('redirect_page', str_replace('index.php','',current_url()) );              
                            ?>
                    <div class="row mt-4">
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="qty" id="qty" value="1" max="<?= $l->stok ?>" min="1">
                        </div>
                        <div class="col-sm-8">
                            <button class="btn btn-primary ">Masukkan keranjang</button>
                        </div>
                    </div>
                    <?= form_close();  ?>

                </div>
                </div>
                <?php endforeach;  ?>
            </div>
            </div>
    </div>

        <!-- Optional JavaScript; choose one of the two! -->
        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>