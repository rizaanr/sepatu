<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?=base_url('assets/')?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="<?=base_url('assets/')?>css/sb-admin-2.min.css" rel="stylesheet">
  <style>
    body{
      background: white !important;
    }
  </style>
  <!-- Custom styles for this template-->
  <link href="<?=base_url('assets/')?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?=base_url('assets/')?>vendor/select2/select2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">


        <nav class="navbar navbar-expand-lg navbar-light bg-light accordion " style="padding: 2%;">

        <ul class="navbar-nav mr-auto">
            <li>
                <a class="text-dark" href="<?= base_url('')?>">
                    <i class="fa fa-fw fa-store-alt" style="font-size: 40px;"></i>
                </a>
            </li>
        </ul>


        <ul class="navbar-nav ml-auto">

            <?php if (($this->session->userdata('role'))) :  ?>
              
                  <?php 
                  $keranjang = $this->cart->contents();
                  $items = 0;
                  foreach ($keranjang as $key => $value) {
                    $items = $items + $value['qty'];
                  }
                  ?>
                  <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>
                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter"><?= $items ?></span>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                  Message Center
                </h6>
                  <?php foreach ($keranjang as $key => $value) { 
                      $produk = $this->m_produk->detailProduk($value['id']);
                    ?>
                <a class="dropdown-item d-flex align-items-center" href="#">
                  <div class="dropdown-list-image mr-3">
                    <img class="" src="<?= base_url('assets/img/produk/' )?>" alt="">
                    <div class="status-indicator bg-success"></div>
                  </div>
                  <div class="font-weight-bold">
                    <div class="text-truncate"><?= $value['name'] ?></div>
                    <div class="small"><span class="text-gray-600"><?= $value['qty'] ?> x <?= number_format($value['price'],0) ?></span>
                    <span class="font-weight-bold">= <?= $this->cart->format_number($value['subtotal']); ?></span></div>
                  </div>
                </a>
                
                  <?php }  ?>
                <tr class="text-center">
                        <td class="ml-3"><strong>Total</strong></td>
                        <td class="right">Rp<?= $this->cart->format_number($this->cart->total()); ?></td>
                </tr>

                <a class="dropdown-item text-center small " href="<?= base_url('keranjang')?>">Lihat keranjang</a>
                <a class="dropdown-item text-center small " href="#">Read More Messages</a>
              </li>

            <!-- <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link" href="</?= base_url('user/keranjang')?>" >
                  <i class="fas fa-shopping-cart" style="font-size: 20px;"></i>
                  <sup class="badge badge-danger badge-counter ml-n2"></?= $items ?></sup>
              </a> 
            </li> -->

              <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link" href="#" >
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['role'] == '$name_role'; ?></span>
                  </a>
              </li>
  
              <div class="topbar-divider d-none d-sm-block"></div>
  
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['name']; ?></span>
                  </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                  </a>
                  <?php if ($this->session->userdata('role') == 2) : ?>
                    <a class="dropdown-item" href="user/produk">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Produk data
                    </a>
                  <?php endif ?>

                  <?php if ($this->session->userdata('role') == 3) : ?>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Ganti dengan akun bisnis
                    </a>
                  <?php endif ?>
                  <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                  </a>
                  <div class="dropdown-item"></div>
                  <a class="dropdown-item" href="<?= base_url('auth/logout')?>">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>
                </div>
              </li>

              <?php else : ?>
                <li class="nav-item dropdown no-arrow mx-1">
                  <a class="text-decoration-none text-dark" style="font-size: 20px;" href="<?= base_url('registrasi')?>">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 ">Daftar</span>
                  </a>
                </li>

                <div class="topbar-divider d-none d-sm-block mr-2 mt-n1" style="font-size: 24px;"> <span>|</span></div>

              <li class="nav-item dropdown no-arrow mx-1">
                <a class="text-decoration-none text-dark" style="font-size: 20px;" href="<?= base_url('login')?>">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 ">Masuk</span>
                  </a>
              </li>
                
              
            <?php endif ?>


          </ul>
        </nav>