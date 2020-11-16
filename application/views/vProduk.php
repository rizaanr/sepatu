<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/produk/css/style.css')?>">
    <title>Peroduk!</title>
  </head>
  <body>
  <div class="container">
        <header class="head my-3">
            <nav class="navbar navbar-expand-lg navbar-light head__custom-nav">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="<?= base_url('assets/dashboard/img/logo.png')?>" alt="website logo">
                    <span>Laris Shop</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span><img src="<?= base_url('assets/dashboard/img/menu.png')?>" alt=""></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " href="<?= base_url('')?>" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="#">Produk</a>
                        </li>
                        <?php if (($this->session->userdata('role'))) {  ?>
                            <?php 
                            $keranjang = $this->cart->contents();
                            $items = 0;
                            foreach ($keranjang as $key) {
                                $items = $items + $key['qty'];
                            }
                            ?>
                            <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Keranjang
                            <span class="badge badge-danger badge-counter"><?= $items ?></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <div class="container-fluid">
                                    <div class="dropdown-list">
                                        <span class="m-1" style="font-size: 12px;">Keranjang Belanja</span>
                                    </div>
                                    <?php 
                                        foreach ($keranjang as $key) { 
                                        $produk = $this->M_produk->detailProduk($key['id']);
                                    ?>
                                    <div class="text-truncate"><?= $key['name'] ?></div>
                                    <div class="small">
                                        <span class="text-gray-600"><?= $key['qty'] ?> x <?= number_format($key['price'],0) ?></span>
                                        <span class="font-weight-bold">= <?= $this->cart->format_number($key['subtotal']); ?></span>
                                    </div>

                                    <?php }  ?>

                                    <tr class="text-center">
                                            <td class="ml-3"><strong>Total</strong></td>
                                            <td class="right">Rp<?= $this->cart->format_number($this->cart->total()); ?></td>
                                    </tr>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?= base_url('keranjang')?>">Lihat keranjang</a>
                                </div>
                            </div>
                            
                            </li>


                        
                            <li class="nav-item dropdown no-arrow">
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

    <div class="row col-lg-12 mt-5">
        <?php foreach ($produk as $i) : ?>
    <div class="card col-lg-4 border-0" >
        <?php 
            echo form_open('produk/tambahkeranjang');
            echo form_hidden('id', $i->produk_id);
            echo form_hidden('qty', 1);
            echo form_hidden('price', $i->harga);
            echo form_hidden('name', $i->nama_produk);
            echo form_hidden('redirect_page', str_replace('index.php','',current_url()) );              
        ?>
        <a href="<?= base_url('produk/detail/').$i->produk_id?>" class="text-decoration-none text-dark">
            <img src="<?= base_url('upload/').$i->produk_img?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $i->nama_produk?></h5>
                <p class="card-text"><h2><?= 'Rp'.number_format($i->harga,0,"","."); ?></h2></p>
            </div>
        </a>
        <div class="card-footer">
        <button type="submit" class="btn btn-warning">Tambah ke keranjang</button>
            <!-- <a class="btn btn-warning"href=""></a> -->
        </div>
            <?= form_close();  ?>
        </div>
        <?php endforeach;  ?>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>