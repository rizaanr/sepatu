<div class="continer-fluid mt-n-5 ml-3 mr-3" style="margin-top: 100px;">

<a href="<?= base_url('user/addproduk')?>" class="btn btn-info m-3"><i class="fa fa-fw fa-box-open"></i> Tambah Produk</a>

<?php foreach ($uproduk as $i) : ?>
<?php if ($i->user_id==$user['user_id']) : ?>
    <div class="card border-0" >
      <div class="row no-gutters">
        <div class="col-md-12">
          <div class="card-body">
            <div class="container-fluid">

              <div class="row">

                <div class="col-md-2" >
                <?php
                  if($i->produk_img==''){?>                          
                      <img style="max-height: 100px;" class="m-3" src="<?php echo base_url('assets/img/produk/noimage.png')?>"><br>
                  <?php }else{ ?>
                    <img style="height: 150px; width:150px;" src="<?= base_url('assets/img/produk/').$i->produk_img ?>" class="card-img" alt="...">
                <?php }?>
                </div>

                <div class="col-md-8">
                  <h5 class="card-title "><?= $i->nama_produk ?></h5>
                  <p class="card-text"><?= $i->merk ?></p>
                  <p class="card-text"><small class="text-muted">IDR <?= $i->harga ?></small></p>
                </div>

                <div class="col-md-2">
                  <a href="<?= base_url('user/produk/edit/'.$i->produk_id)?>" class="btn btn-success btn-sm mt-4 mb-1"><i class="fas fa-fw fa-edit"></i> aas</a><br>
                  <a href="<?= base_url('user/produk/del/'.$i->produk_id)?>" class="btn btn-danger btn-sm "><i class="fas fa-fw fa-trash"></i> delete</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif  ?>
    <?php endforeach;  ?>

</div>

