<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="alert alert-primary mt-3">
                <?php 
                $grandtotal = 0;
                if ($keranjang = $this->cart->contents()) {
                    foreach ($keranjang as $items) {
                        $grandtotal = $grandtotal + $items['subtotal'];
                    }
                    echo "Total Belanja Anda: Rp".number_format($grandtotal,0,',','.');
                
                ?>
                
            </div>

                <form method="post" action="<?= base_url('keranjang/prosespesanan')?>">

                    <div class="form-group">
                        <label for="">Nama Penerima</label>
                        <input type="text" name="nama" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <input type="text" name="alamat" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">No. Telpon Penerima</label>
                        <input type="number" min="0" name="notelp" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Pilih Jasa Pengiriman</label>
                        <select name="kurir" id="" class="form-control js-example-basic-single">
                            <?php foreach ($kurir as $l) : ?>
                            <option value="<?= $l->kurir_id ?>"><?= $l->nama_kurir ?></option>
                            <?php endforeach;  ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Pesan</button>
            <?php }else {
                echo "Keranjang Belanja Masih Kosong";
            }
            ?>

                </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>