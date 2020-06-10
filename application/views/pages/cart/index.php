<main role="main" class="container">
    <?php $this->load->view('layouts/alert'); ?>
    <div class="row">
        <div class="col-md 12">
            <h4 class="pt-3 pb-3">Keranjang Belanja</h4>
            <div class="card mb-3">


                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Produk</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($content as $row) : ?>
                                <tr>
                                    <td>
                                        <p>
                                            <img src="<?= $row->image ? base_url("assets/images/product/$row->image") : base_url("assets/images/product/default.png") ?>" alt="" height="50"> <strong><?= $row->title; ?></strong>
                                        </p>
                                    </td>
                                    <td class="text-center">
                                        Rp. <?= number_format($row->price, 0, ',', '.'); ?>,-
                                    </td>
                                    <td>
                                        <form action="<?= base_url("cart/update/$row->id"); ?>" method="POST">
                                            <div class="">
                                                <input type="hidden" name="id" value="<?= $row->id ?>">
                                            </div>
                                            <div class="input-group d-flex justify-content-center">
                                                <input type="number" name="qty" class="form-control text-center" min="0" max="10" style="border: none;" readonly value="<?= $row->qty ?>">
                                                <button type="submit" title="Tambah barang" class="btn btn-info btn-sm" style="margin-left: 10px; border-radius: 5px">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        Rp. <?= number_format($row->subtotal, 0, ',', '.'); ?>,-
                                    </td>
                                    <td>
                                        <form action="<?= base_url("cart/delete/$row->id"); ?>" method="POST">
                                            <input type="hidden" name="id" value="<?= $row->id ?>">
                                            <button type="submit" data-toggle="tooltip" title="Hapus barang" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin hapus?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3"><strong> Total: </strong></td>
                                <td class="text-center"><strong> Rp. <?= number_format(array_sum(array_column($content, 'subtotal')), 0, ',', '.'); ?>,- </strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer">
                    <a href="<?= base_url('checkout') ?>" class="btn btn-success float-right">Pembayaran
                        <i class="fas fa-angle-right"></i> </a>
                    <a href="<?= base_url() ?>" class="btn btn-warning text-white"><i class="fas fa-angle-left"></i>
                        Kembali </a>
                </div>
            </div>
        </div>
    </div>
</main>