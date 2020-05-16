<?php
    if ($status == 'waiting') {
        $badgeStatus    = 'badge-primary';
        $status         = 'Menunggu Pembayaran';
    }

    if ($status == 'paid') {
        $badgeStatus    = 'badge-secondary';
        $status         = 'Dibayar';
    }

    if ($status == 'delivered') {
        $badgeStatus    = 'badge-success';
        $status         = 'Dikirim';
    }

    if ($status == 'cancel') {
        $badgeStatus    = 'badge-danger';
        $status         = 'Dibatalkan';
    }
?>

<?php if ($status) : ?>
    <span class="badge badge-pill <?= $badgeStatus ?>"><?= $status; ?></span>
<?php endif; ?>