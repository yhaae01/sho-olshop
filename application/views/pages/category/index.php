<main role="main" class="container">
    <?php $this->load->view('layouts/alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
        <h4 class="pt-3 pb-3">Kategori</h4>
            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('category/create'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>
                        Tambah</a>

                    <div class="float-right">
                        <?= form_open(base_url('category/search'), ['method' => 'POST']); ?>
                            <div class="input-group">
                                <input type="text" class="form-control font-control-sm text-center" value="<?= $this->session->userdata('keyword'); ?>" name="keyword" placeholder="Cari . . .">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                    <a href="<?= base_url('category/reset'); ?>" class="btn btn-primary btn-sm">
                                        <i class="fas fa-fw fa-eraser"></i>
                                    </a>
                                </div>
                            </div>
                        <?= form_close(); ?>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Slug</th> <!-- untuk kategori-->
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $no=0; foreach ($content as $row) : $no++ ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row->title; ?></td>
                                <td><?= $row->slug; ?></td>
                                <td>
                                <?= form_open("category/delete/$row->id", ['method' => 'POST']); ?>
                                <?= form_hidden('id', "$row->id"); ?>
                                    <a href="<?= base_url("category/edit/$row->id") ?>" class="btn btn-sm">
                                        <i class="fas fa-edit text-info"></i>
                                    </a>
                                    <button type="submit" class="btn btn-sm" onclick="return confirm('Yakin ingin hapus?')">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                <?= form_close(); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Pagination -->
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <?= $pagination; ?>
                        </ul>
                    </nav>
                    <!-- End of Pagination -->

                </div>
            </div>

        </div>
    </div>
</main>