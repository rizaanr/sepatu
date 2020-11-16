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