<main role="main" class="container">
    <?php $this->load->view('layouts/alert'); ?>
    <div class="row">
        <div class="col-md-12">
        <h4 class="pt-3 pb-3">Checkout Berhasil</h4>
            <div class="card">
                <div class="card-body">
                    <h5>Nomor Order: <?= $content->invoice; ?></h5>
                    <p>Terima kasih sudah berbelanja.</p>
                    <p>Silahkan lakukan pembayaran untuk bisa kami proses selanjutnya dengan cara:</p>
                    <ol>
                        <li>Lakukan pembayaran pada rekening <strong>BNI SYARIAH 0672626793</strong> a/n SHOJIRU</li>
                        <li>Sertakan keterangan dengan nomor order: <strong><?= $content->invoice; ?></strong></li>
                        <li>Total pembayaran: <strong>Rp.<?= number_format($content->total, 0, ',', '.') ?>,-</strong></li>
                    </ol>
                    <p>Jika sudah, silahkan kirimkan bukti transfer dihalaman konfirmasi atau bisa <a href="#">klik disini</a></p>
                    <a href="<?= base_url() ?>" class="btn btn-primary"> <i class="fas fa-angle-left"> Kembali</i> </a>
                </div>
            </div>
        </div>
    </div>
</main>