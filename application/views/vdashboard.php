<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/dashboard/style.css')?>">

    <title>Sepattu</title>
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
                            <a class="nav-link text-warning" href="<?= base_url('')?>" >Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('produk')?>">Produk</a>
                        </li>

                        <?php if (($this->session->userdata('role'))) {  ?>

                            <?php 
                            $keranjang = $this->cart->contents();
                            $items = 0;
                            foreach ($keranjang as $key => $value) {
                                $items = $items + $value['qty'];
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
                                        foreach ($keranjang as $key => $value) { 
                                        $produk = $this->M_produk->detailProduk($value['id']);
                                    ?>
                                    <div class="text-truncate"><?= $value['name'] ?></div>
                                    <div class="small">
                                        <span class="text-gray-600"><?= $value['qty'] ?> x <?= number_format($value['price'],0) ?></span>
                                        <span class="font-weight-bold">= <?= $this->cart->format_number($value['subtotal']); ?></span>
                                    </div>

                                    <?php }  ?>

                                    <div class="dropdown-divider mt-n-3"></div>
                                    <a class="dropdown-item" href="<?= base_url('keranjang')?>">Lihat keranjang</a>
                                </div>
                            </div>
                            
                            </li>


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
        <div class="row custom-section d-flex align-items-center">
            <div class="col-12 col-lg-4">
                <h2>Sepatu Mahal</h2>
                <h3>Jangan Dibeli</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur, quidem!</p>
                <a href="<?= base_url('produk')?>">Mulai Belanja</a>
            </div>
            <div class="col-12 col-lg-8">
                <img src="<?= base_url('assets/dashboard/img/mainbenner.png')?>" alt="Team process banner">
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
</body>

</html>