        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $tittle ?></h1>

          <!-- Collapsable Card Example -->
          <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                  <h6 class="m-0 font-weight-bold text-primary">Data Seller</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample">
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="table_id" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th style="width: 10px;">No</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Role</th>
                          <th>User Active</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      <?php 
                      $no = 1;
                      foreach($seller as $u){ 
                      ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $u->name ?></td>
                          <td><?php echo $u->email ?></td>
                          <td><?php echo $u->name_role ?></td>
                          <td><?php echo $u->is_active ?></td>
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

              <!-- Collapsable Card Example -->
          <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                  <h6 class="m-0 font-weight-bold text-primary">Data Buyer</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardExample1">
                  <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="table_id2" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th style="width: 10px;">No</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Role</th>
                          <th>User Active</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      
                      <tbody>
                      <?php 
                      $no = 1;
                      foreach($buyer as $u){ 
                      ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td><?php echo $u->name ?></td>
                          <td><?php echo $u->email ?></td>
                          <td><?php echo $u->name_role ?></td>
                          <td><?php echo $u->is_active ?></td>
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

          
          
        </div>
