<div class="container">
    <h2>Hai, <?= ucwords($this->session->userdata('name')); ?></h2>

    <div class="row mt-5">
    
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Total Pesanan</h5>
                </div>
                <div class="card-body">
                    <h5 class="card-text mb-3">Belum Dibayar 
                        <p class="badge badge-pill badge-primary">
                            <?= 
                                $this->Admin_model->getOrderWhere(['status' => 'waiting'])->num_rows(); 
                            ?>
                        </p> 
                    </h5>
                    <h5 class="card-text mb-3">Dibayar 
                        <p class="badge badge-pill badge-secondary">
                            <?= 
                                $this->Admin_model->getOrderWhere(['status' => 'paid'])->num_rows(); 
                            ?>
                        </p> 
                    </h5>
                    <h5 class="card-text mb-3">Dikirim 
                        <p class="badge badge-pill badge-success">
                            <?= 
                                $this->Admin_model->getOrderWhere(['status' => 'delivered'])->num_rows(); 
                            ?>
                        </p> 
                    </h5>
                    <h5 class="card-text mb-3">Dibatalkan 
                        <p class="badge badge-pill badge-danger">
                            <?= 
                                $this->Admin_model->getOrderWhere(['status' => 'cancel'])->num_rows(); 
                            ?>
                        </p> 
                    </h5>
                    <!-- Total semua pesanan -->
                    <!-- <h3 class="card-text text-center mb-3"> -->
                        <!-- <?= 
                            $this->Admin_model->getOrderWhere(['total' >= 1])->num_rows(); 
                        ?> -->
                    <!-- </h3> -->
                    <a href="<?= base_url('order'); ?>" class="btn btn-outline-info btn-block btn-sm">Detail</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Total Produk</h5>
                </div>
                <div class="card-body">
                    <h3 class="card-text text-center mb-3">
                    <i class="fas fa-tags mr-3"></i>
                        <?= 
                            $this->Admin_model->getProductWhere(['is_available' => 1])->num_rows(); 
                        ?>
                    </h3>
                    <a href="<?= base_url('product'); ?>" class="btn btn-outline-info btn-block btn-sm">Detail</a>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Total Pengguna</h5>
                </div>
                <div class="card-body">
                    <h3 class="card-text text-center mb-3">
                    <i class="fas fa-users mr-3"></i>
                        <?= 
                            $this->Admin_model->getUserWhere(['role' => 'member'])->num_rows(); 
                        ?>
                    </h3>
                    <a href="<?= base_url('user'); ?>" class="btn btn-outline-info btn-block btn-sm">Detail</a>
                </div>
            </div>
        </div>
        
    </div>

</div>