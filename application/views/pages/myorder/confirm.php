<main role="main" class="container">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<div class="card">
				<div class="card-header">
					Konfirmasi Pesanan #<?= $order->invoice ?>
					<div class="float-right">
						<?php $this->load->view('layouts/status', ['status' => $order->status]); ?>
					</div>
				</div>
				<?= form_open_multipart($form_action, ['method' => 'POST']) ?>
					<?= form_hidden('id_orders', $order->id); ?>
					<div class="card-body">
						<div class="form-group">
							<label for="">Transaksi</label>
							<input type="text" class="form-control" value="<?= $order->invoice ?>" readonly>
						</div>
						<div class="form-group">
							<label for="">Dari Rekening a/n</label>
							<input type="text" name="account_name" value="<?= $input->account_name ?>" class="form-control">
							<?= form_error('account_name') ?>
						</div>
						<div class="form-group">
							<label for="">No Rekening</label>
							<input type="text" name="account_number" class="form-control col-3" onkeypress="return hanyaAngka(event)" maxlength="20" value="<?= $input->account_number ?>">
							<?= form_error('account_number') ?>
						</div>
						<div class="form-group">
							<label for="">Sebesar</label>
							<input type="text" name="nominal" readonly value="<?= $order->total ?>" class="form-control col-2" onkeypress="return hanyaAngka(event)" maxlength="10">
							<?= form_error('nominal') ?>
						</div>
						<div class="form-group">
							<label for="">Catatan</label>
							<textarea name="note" id="" cols="30" rows="5" class="form-control">-</textarea>
						</div>
						<div class="form-group">
							<label for="">Bukti Transfer</label> <br>
							<input type="file" name="image" id="">
							<?php if ($this->session->flashdata('image_error')) : ?>
								<small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
							<?php endif ?>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-success">Konfirmasi Pembayaran</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
