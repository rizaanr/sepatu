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
              <form class="" method="POST" action="<?= base_url('user/proses') ?>" enctype="multipart/form-data"> 

                <div class="form-group">
                  <input type="hidden" class="form-control form-control-user" name="user_id" id="user_id"  value="<?= $user['user_id'] ?>">
                </div>

                <div class="form-group">
                  <Label>Nama Produk</Label>
                  <input type=text class="form-control form-control-user" name="nama_produk" id="nama_produk"  value="<?= set_value('nama_produk') ?>">
                </div>
                
                <div class="form-group">
                  <Label>Merk</Label>
                  <input type="text" class="form-control form-control-user" name="merk" id="merk" placeholder="" value="<?= set_value('merk') ?>">
                </div>

                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Deskripsi</label>
                  <textarea name="deskripsi" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= set_value('deskripsi') ?></textarea>
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
                  <input type="number" class="form-control form-control-user" name="stok" id="stok" placeholder="" value="<?= set_value('stok') ?>">
                </div>

                <div class="form-group">
                  <Label>Harga</Label>
                  <input type="number" class="form-control form-control-user" name="harga" id="harga" placeholder="" value="<?= set_value('harga') ?>">
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <Label>Gambar</Label>
                      <input type="file" class="form-control-file" name="produk_img" id="preview_gambar" placeholder="" value="<?= set_value('') ?>">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <img class="mb-3 " style="max-height: 150px;" src="<?= base_url('assets/img/produk/noimage.png')?>" id="view_gambar">
                  </div>
                  
                </div>
                  

                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Daftarkan Produk
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    </div>
</div>