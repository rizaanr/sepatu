        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $tittle ?></h1>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?= $tittle ?></h6>
            </div>
            <div class="card-body">
              <a href="<?= base_url('admin/add')?>" class="btn btn-success mb-3" ><i class="fa fa-fw fa-user-plus"></i> add</a>
              <div class="table-responsive">
              <table class="table table-bordered" id="table_id" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th style="width: 10px;">No</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Mek</th>
                <th>stok</th>
                <th>harga</th>
                <th>Deskripsi</th>
                <th>Category</th>
                <th>Nama Penjual</th>
                <th>Action</th>
              </tr>
            </thead>
            
            <tbody>
              <?php 
              $no = 1;
              foreach($produks as $u){ 
              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td> <img src="<?= base_url('assets/img/produk/').$u->produk_img ?>" width="100px"></td>
                <td><?php echo $u->nama_produk ?></td>
                <td><?php echo $u->merk ?></td>
                <td><?php echo $u->stok ?></td>
                <td><?php echo $u->harga ?></td>
                <td><?php echo $u->deskripsi ?></td>
                <td><?php echo $u->nama_kategori ?></td>
                <td><?php echo $u->name ?></td>
                <td>
                      <?php echo anchor('crud/edit/'.$u->user_id,'Edit'); ?>
                                        <?php echo anchor('crud/hapus/'.$u->user_id,'Hapus'); ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
              </div>
            </div>
          </div>

          
        </div>
