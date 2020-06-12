<main role="main" class="container">
	<?php $this->load->view('layouts/alert'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					Detail Order #<?= $order->invoice ?>
					<div class="float-right">
						<?php $this->load->view('layouts/status', ['status' => $order->status]); ?>
					</div>
				</div>
				<div class="card-body">
					<p>Tanggal: <?= str_replace('-', '/', date("d-m-Y", strtotime($order->date))) ?></p>
					<p>Nama: <?= ucwords($order->name) ?></p>
					<p>Telepon: <?= $order->phone ?></p>
					<p>Alamat: <?= $order->address ?></p>
					<?php if ($order->status == 'delivered') : ?>
						<p>Resi: <?= $order->resi ?></p>
					<?php endif; ?>
					<table class="table">
						<thead>
							<tr>
								<th>Produk</th>
								<th class="text-center">Harga</th>
								<th class="text-center">Jumlah</th>
								<th class="text-center">Subtotal</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($order_detail as $row) : ?>
							<tr>
								<td>
									<p><img src="<?= $row->image ? base_url("assets/images/product/$row->image") : base_url('/images/product/default.png') ?>" alt="" height="50"> <strong><?= $row->title ?></strong></p>
								</td>
								<td class="text-center">Rp.<?= number_format($row->price, 0, ',', '.') ?>,-</td>
								<td class="text-center"><?= $row->qty ?></td>
								<td class="text-center">Rp.<?= number_format($row->subtotal, 0, ',', '.') ?>,-</td>
							</tr>
							<?php endforeach ?>
							<tr>
								<td colspan="3"><strong>Total:</strong></td>
								<td class="text-center"><strong>Rp.<?= number_format(array_sum(array_column($order_detail, 'subtotal')), 0, ',', '.') ?>,-</strong></td>
							</tr>
						</tbody>
					</table>
				</div>
				<?php if ($order->status == 'waiting') : ?>
				<div class="card-footer">
					<a href="<?= base_url("/myorder/confirm/$order->invoice") ?>" class="btn btn-success">Konfirmasi Pembayaran</a>
				</div>
				<?php endif ?>
			</div>

			<?php if (isset($order_confirm)) : ?>
			<div class="row mb-3 mt-5">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">
							Bukti Transfer
						</div>
						<div class="card-body">
							<p>No Rekening: <?= $order_confirm->account_number ?></p>
							<p>Atas Nama: <?= $order_confirm->account_name ?></p>
							<p>Nominal: Rp<?= number_format($order_confirm->nominal, 0, ',', '.') ?>,-</p>
							<p>Catatan: <?= $order_confirm->note ?></p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
						<div class="card-body text-center">
							<img src="<?= base_url("assets/images/confirm/$order_confirm->image") ?>" height="210" width="210">
						</div>
					</div>
				</div>
			</div>
			<?php endif ?>
		</div>
	</div>
</main>
