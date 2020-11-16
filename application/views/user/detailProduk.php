<div class="container-fluid">
<?php foreach ($produk as $l) : ?>
    <div class="mt-3">
        <a href="<?= base_url('')?>">Laris</a>
            <span> > <?= $l->nama_kategori ?></span>
    </div>    
<?php endforeach;  ?>

<div class="card mb-3 mt-3">
  <div class="row no-gutters">
      <?php foreach ($produk as $l) : ?>
    <div class="col-md-4">
      <img src="<?= base_url('assets/img/produk/'.$l->produk_img)?>" class="card-img" alt="...">
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