<main role="main" class="container">
    <?php $this->load->view('layouts/alert'); ?>
    <div class="row">
        <div class="col-md-8">
            <h4 class="pt-3 pb-3">Keranjang Belanja</h4>
            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url("/checkout/create") ?>" method="POST">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="name" value="<?= $input->name ?>">
                            <?= form_error('name') ?>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="prop">Provinsi</label>
                                <select id="prop" name="prop" class="form-control" onchange="ajaxkota(this.value)">
                                    <option selected>Pilih Provinsi</option>
                                    <?php
                                    foreach ($provinsi as $data) {
                                        echo '<option value="' . $data->id_prov . '">' . $data->nama . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="kota">Kota/Kabupaten</label>
                                <select id="kota" name="kota" class="form-control" onchange="ajaxkec(this.value)">
                                    <option selected>Pilih Kota</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="kec">Kecamatan</label>
                                <select id="kec" name="kec" class="form-control" onchange="ajaxkel(this.value)">
                                    <option selected>Pilih Kecamatan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="kel">Kelurahan/Desa</label>
                                <select id="kel" name="kel" class="form-control">
                                    <option selected>Pilih Kelurahan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Lengkap</label>
                            <textarea name="address" id="" cols="30" rows="5" class="form-control"><?= $input->address ?></textarea>
                            <?= form_error('address') ?>
                        </div>
                        <div class="form-group">
                            <label for="">Telepon</label>
                            <input type="text" class="form-control col-4" maxlength="13" onkeypress="return hanyaAngka(event)" name="phone" value="<?= $input->phone ?>">
                            <?= form_error('phone') ?>
                        </div>

                        <button class="btn btn-primary" type="submit">Simpan</button>
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