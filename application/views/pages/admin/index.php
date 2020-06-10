<div class="container">
    <h2>Hello, <?= ucwords($this->session->userdata('name')); ?></h2>

    <div class="row mt-5">
    
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5>Total Pesanan</h5>
                </div>
                <div class="card-body">
                    <h3 class="card-text text-center mb-3">

                    </h3>
                    <a href="<?= base_url('order'); ?>" class="btn btn-outline-primary btn-block btn-sm">Detail</a>
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
                        <?= 
                            $this->Admin_model->getUserWhere(['role' => 'member'])->num_rows(); 
                        ?>
                    </h3>
                    <a href="<?= base_url('user'); ?>" class="btn btn-outline-primary btn-block btn-sm">Detail</a>
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
                        <?= 
                            $this->Admin_model->getProductWhere(['is_available' => 1])->num_rows(); 
                        ?>
                    </h3>
                    <a href="<?= base_url('product'); ?>" class="btn btn-outline-primary btn-block btn-sm">Detail</a>
                </div>
            </div>
        </div>
        
    </div>

</div>