<main role="main" class="container">
    <?php $this->load->view('layouts/alert'); ?>
    <div class="row">
        <div class="col-md-10 mx-auto">
        <h4 class="pt-3 pb-3">Pengguna</h4>

            <div class="card">
                <div class="card-header">
                    <a href="<?= base_url('user/create') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i>
                        Tambah</a>

                        <div class="float-right">
                        <form action="<?= base_url('user/search') ?>" method="post">
                            <div class="input-group">
                                <input type="text" name="keyword" value="<?= $this->session->userdata('keyword'); ?>" class="form-control font-control-sm text-center"
                                    placeholder="Cari . . .">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                    <a href="<?= base_url('user/reset'); ?>" class="btn btn-primary btn-sm">
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
                                <th scope="col">No</th>
                                <th scope="col">Nama Pengguna</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                        <?php $no = 0; foreach ($content as $row ) : $no++; ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td>
                                    <p>
                                        <img src="<?= $row->image ? base_url("assets/images/user/$row->image") : base_url("assets/images/user/default.jpg") ?>" alt="" height="60">
                                        <?= ucwords($row->name); ?>
                                    </p>
                                </td>
                                <td><?= $row->email; ?></td>
                                <td><?= ucwords($row->role); ?></td>
                                <td><?= $row->is_active ? 'Aktif' : 'Tidak Aktif' ?></td>
                                <td>
                                    <?= form_open(base_url("user/delete/$row->id"), ['method' => 'POST']); ?>
                                    <?= form_hidden('id', $row->id); ?>
                                        <a href="<?= base_url("user/edit/$row->id") ?>" class="btn btn-sm">
                                            <i class="fas fa-edit text-info"></i>
                                        </a>
                                        <button type="submit" class="btn btn-sm"
                                            onclick="return confirm('Yakin ingin hapus?')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </button>
                                    <?= form_close() ?>
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