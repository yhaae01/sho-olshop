<main role="main" class="container">
    <?php $this->load->view('layouts/alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto">

            <div class="card">
                <div class="card-header">
                    <span>Produk</span>
                    <a href="" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>
                        Tambah</a>

                    <div class="float-right">
                        <form action="" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control font-control-sm text-center"
                                    placeholder="Cari . . .">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                    <a href="<?= base_url('category/reset'); ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-fw fa-eraser"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produk</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $no = 0; foreach ($content as $row) : $no++; ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td>
                                    <p>
                                        <img src="<?= $row->image ? base_url("assets/images/product/$row->image") : base_url("assets/image/product/default.png") ?>" alt="" height="60">
                                        <?= $row->product_title; ?>
                                    </p>
                                </td>
                                <td>
                                    <span class="badge badge-primary">
                                        <i class="fas fa-tag"> <?= $row->category_title ?></i>
                                    </span>
                                </td>
                                <td>Rp.<?= number_format($row->price, 0, ',', '.') ?>,-</td>
                                <td><?= $row->is_available ? 'Tersedia' : 'Kosong' ?></td>
                                <td>
                                    <form action="">
                                        <a href="">
                                            <button class="btn btn-sm">
                                                <i class="fas fa-edit text-info"></i>
                                            </button>
                                        </a>
                                        <button type="submit" class="btn btn-sm"
                                            onclick="return confirm('Yakin ingin hapus?')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation example">
                        <?= $pagination; ?>
                    </nav>
                    <!-- End of Pagination -->

                </div>
            </div>

        </div>
    </div>
</main>