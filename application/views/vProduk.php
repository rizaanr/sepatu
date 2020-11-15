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
    <title>Hello, world!</title>
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
                    <span><img src="assets/images/menu.png" alt=""></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link " href="#" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-warning" href="#">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Keranjang</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Akun</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    </div>

  <div class="row col-lg-12 mt-5">
      <?php foreach ($produk as $i) : ?>
    <div class="card col-lg-4 border-0" >
      <a href="<?= base_url('produk/detail/').$i->produk_id?>" class="text-decoration-none text-dark">
        <img src="<?= base_url('upload/').$i->produk_img?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $i->nama_produk?></h5>
          <p class="card-text"><h2><?= 'Rp'.number_format($i->harga,0,"","."); ?></h2></p>
        </div>
      </a>
      <div class="card-footer">
        <a class="btn btn-warning"href="">Tambah ke keranjang</a>
      </div>
    </div>
    <?php endforeach;  ?>
  </div>
  
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>