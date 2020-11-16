<div class="container-fluid m-3">
    <div class="row" style="margin-top: 10%;">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4"><?= $title ?></h1>
              </div>

              <?php foreach ($produks as $l) : ?>

              <form class="" method="POST" action="<?= base_url('user/prosesedit') ?>" enctype="multipart/form-data"> 

                <div class="form-group">
                  <input type="hidden" class="form-control form-control-user" name="produk_id" id="produk_id"  value="<?= $l->produk_id ?>">
                </div>

                <div class="form-group">
                  <Label>Nama Produk</Label>
                  <input type="text" class="form-control form-control-user" name="nama_produk" id="nama_produk"  value="<?= $l->nama_produk ?>">
                </div>
                
                <div class="form-group">
                  <Label>Merk</Label>
                  <input type="text" class="form-control form-control-user" name="merk" id="merk" placeholder="" value="<?= $l->merk ?>">
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Deskripsi</label>
                  <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= $l->deskripsi ?></textarea>
                </div>
                
                <div class="form-group">
                  <Label>Kategori</Label>
                  <select class="form-control js-example-basic-single" name="kategori_id" id="exampleFormControlSelect2">
                  <?php foreach ($ktg as $id) : ?>
                    <option value="<?= $id->kategori_id ?>"><?= $id->nama_kategori ?></option>
                    <?php endforeach;  ?>
                  </select>
                </div>

                <div class="form-group">
                  <Label>Stok</Label>
                  <input type="number" class="form-control form-control-user" name="stok" id="stok" placeholder="" value="<?= $l->stok ?>">
                </div>
                
                  <div class="form-group">
                    <Label>Harga</Label>
                    <input type="number" class="form-control form-control-user" name="harga" id="harga" placeholder="" value="<?= $l->harga ?>">
                  </div>

                  <div class="row">
                    <?php
                      if($l->produk_img==''){?>                          
                          <img style="max-height: 100px;" class="m-3" src="<?php echo base_url('assets/img/produk/noimage.png')?>" id="view_gambar"><br>
                      <?php }else{ ?>
                          <img style="max-height: 100px;" class="m-3" src="<?php echo base_url('assets/img/produk/'.$l->produk_img)?>" id="view_gambar"><br>
                    <?php }?>

                      <div class="form-group">
                        <div class="custom-file mt-3">
                          <input type="file" name="produk_img" class="custom-file-input" id="preview_gambar" value="<?= $l->produk_img ?> aria-describedby="inputGroupFileAddon01">
                          <label class="custom-file-label" for="preview_gambar">Choose file</label>
                        </div>
                  </div>
                  

                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Simpan
                </button>
              </form>
              <?php endforeach;  ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
</div>