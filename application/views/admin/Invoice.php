<div class="container-fluid">
    <h4>Invoice Pemesanan</h4>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>Nama Pemesan</th>
            <th>Alamat Pengiriman</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($invoice as $l) : ?>
        <tr>
            <td><?= $l->invoice_id ?></td>
            <td><?= $l->nama ?></td>
            <td><?= $l->alamat ?></td>
            <td><?= $l->tgl_pesan ?></td>
            <td><?= $l->batas_bayar ?></td>
            <td>
                <a href="<?= base_url('admin/invoice/detail/'.$l->invoice_id)?>" class="btn-primary btn">Detail</a>
            </td>
        </tr>
        <?php endforeach;  ?>
    </table>
</div>