<div class="container-fluid">
<h4>Detail Pesanan <div class="btn btn-success btn-sm"> No Invoice <?= $invoice->invoice_id ?></div></h4>

    <table class="table table-striped ">
        <tr>
            <th>NO</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th class="text-right">Harga Satuan</th>
            <th class="text-right">Sub Total</th>
        </tr>

        <?php 
            $total = 0;
            foreach ($pesanan as $l) : 
                $subtotal = $l->jumlah * $l->harga;
                $total += $subtotal;
                ?>

                <tr>
                    <td><?= $l->produk_id ?></td>
                    <td><?= $l->nama_produk ?></td>
                    <td><?= $l->jumlah ?></td>
                    <td class="text-right"><?= number_format($l->harga,0,',','.') ?></td>
                    <td class="text-right"><?= number_format($subtotal,0,',','.') ?></td>
                </tr>

        <?php endforeach;  ?>

                <tr>
                    <td colspan="3"></td>
                    <td class="text-right"><strong> Total</strong></td>
                    <td class="text-right"><strong>Rp<?= number_format($total,0,',','.') ?></strong></td>
                </tr>
    </table>

    <div class="row">
        <a href="<?= base_url('admin/invoice')?>" class="btn btn-warning"><i class="fas fa-undo-alt"></i> Kembali</a>
    </div>
</div>