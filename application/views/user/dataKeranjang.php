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

<div class="container-fluid">
  <div class="container mt-3" style="background: #f0f0f0;">
  <div class="row">
    <div  iv class=" m-3">
      <h4 style=""><?= $title ?></h4>
    </div>
  </div>
    <div class="row">
        <div class="col-sm-12">
    <?php echo form_open('keranjang/update'); ?>

        <table class="table">
          <tr>
            <th width="70px">QTY</th>
            <th>Nama Produk</th>
            <th style="text-align:right">Harga</th>
            <th style="text-align:right">Sub-Total</th>
            <th></th>
          </tr>

        <?php $i = 1; ?>

        <?php foreach ($this->cart->contents() as $items): ?>
                <tr>
                        <td>
                          <?php echo form_input(array(
                            
                            'name' => $i.'[qty]',
                            'value' => $items['qty'], 
                            'maxlength' => '3',
                            'min' => '0',
                            'size' => '5',
                            'type' => 'number',
                            'class' => 'form_control'
                            )); ?>
                        </td>
                        <td>
                          <?php echo $items['name']; ?>
                        </td>
                        <td style="text-align:right"><?php echo $this->cart->format_number($items['price']); ?></td>
                        <td style="text-align:right">Rp<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                        <td>
                          <a href="<?= base_url('keranjang/delete/').$items['rowid']?>" class="btn btn-danger btn-sm"><i class="fa fa-trash fa-fw"></i></a>
                        </td>
                </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
        <tr>
          <td colspan="2"> </td>
          <td class="text-right"><strong>Total</strong></td>
          <td class="text-right"><strong>Rp<?php echo number_format($this->cart->total()); ?></strong></td>
        </tr>

        </table>

        <div class="row mb-3">
          <div class="col-sm-4">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          <div class="col-sm-6">
            
            </div>
              <div class="col-sm-2 text-right">
                <a href="<?= base_url('keranjang/checkout')?>" class="btn btn-success">Checkout</a>
              </div>
        </div>

        <?php echo form_close(); ?>

      </div>

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