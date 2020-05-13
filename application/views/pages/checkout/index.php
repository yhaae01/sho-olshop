<main role="main" class="container">
    <?php $this->load->view('layouts/alert'); ?>
    <div class="row">
        <div class="col-md-8">
        <h4 class="pt-3 pb-3">Keranjang Belanja</h4>
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control">
                            <small class="form-text text-danger">Nama harus diisi.</small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" cols="30" rows="5" class="form-control"></textarea>
                            <small class="form-text text-danger">Alamat harus diisi.</small>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="number" name="telepon" class="form-control">
                            <small class="form-text text-danger">Nomor telepon harus diisi.</small>
                        </div>
                        <button type="submit" class="btn btn-primary"> Simpan </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Cart -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            Cart
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Produk</th>
                                        <th>Qty</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($cart as $row) : ?>
                                    <tr>
                                        <td><?= $row->title; ?></td>
                                        <td><?= $row->qty; ?></td>
                                        <td>Rp.<?= number_format($row->price, 0, ',', '.'); ?>,-</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Subtotal</td>
                                        <td>Rp.<?= number_format($row->subtotal, 0, ',', '.'); ?>,-</td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="2">Total</th>
                                        <th>Rp.<?= number_format(array_sum(array_column($cart, 'subtotal')), 0, ',', '.'); ?>,-</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Cart -->
        </div>
    </div>
</main>