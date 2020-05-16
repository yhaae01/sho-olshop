<main role="main" class="container">
    <?php $this->load->view('layouts/alert'); ?>
    <div class="row">
        <div class="col-md-12 mx-auto">
        <h4 class="pt-3 pb-3">Pesanan</h4>
            <div class="card">
                <div class="card-header">
                    <div class="float-right">
                        <?= form_open(base_url('order/search'), ['method' => 'POST']); ?>
                            <div class="input-group">
                                <input type="text" class="form-control font-control-sm text-center" value="<?= $this->session->userdata('keyword'); ?>" name="keyword" placeholder="Cari . . .">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-fw fa-search"></i>
                                    </button>
                                    <a href="<?= base_url('order/reset'); ?>" class="btn btn-primary btn-sm">
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
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Total Belanja</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($content as $row) :?>
                            <tr>
                                <td>
                                    <a href="<?= base_url("order/detail/$row->id"); ?>"><strong>#<?= $row->invoice; ?></strong></a>
                                </td>
                                <td> <?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))); ?> </td>
                                <td> Rp.<?= number_format($row->total, 0, ',', '.') ?>,- </td>
                                <td>
                                    <?php $this->load->view('layouts/status', ['status' => $row->status]); ?>
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