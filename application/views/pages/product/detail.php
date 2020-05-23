<div class="container">
    <div class="row mt-3">
        <div class="col-md-6 mx-auto">
            <h5 class="mb-3"><strong>Detail Produk</strong></h5>
            <div class="card">
                <!-- <div class="card-header">
                    Detail Produk
                </div> -->
                <div class="card-body">
                    <h5 class="card-title text-center mb-5">
                        <img src="<?= base_url("assets/images/product/$content->image") ?>" class="img-thumbnail rounded" width="300">
                    </h5>
                    <h4 class="card-title"><?= ucwords($product['title']); ?></h4>
                    <p class="card-subtitle"><?= $product['description']; ?></p>
                    <p class="card-text mb-4 mt-3 text-muted">Rp. <?= $product['price']; ?>,-</p>
                    <a href="<?= base_url('home'); ?>" class="btn btn-primary"> <i class="fas fa-angle-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>