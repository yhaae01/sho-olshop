<main role="main" class="container">
	<?php $this->load->view('layouts/alert'); ?>
	<div class="row">
		<?php $role = $this->session->userdata('role'); ?>
		<?php if ($role == 'member') : ?>
		<div class="col-md-3 col-sm-12">
			<div class="card mb-3">
				<div class="card-header">Menu</div>
				<div class="list-group list-group-flush">
					<li class="list-group-item">
						<a href="<?= base_url('myorder'); ?>">Pesananku</a>
					</li>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<div class="col-md-9 col-sm-12 mx-auto">
			<div class="row no-gutters">
				<div class="card mb-3" style="max-width: 800px;">
					<div class="row no-gutters">
						<div class="col-md-4">
							<img src="<?= $content->image ? base_url("assets/images/user/$content->image") : base_url("assets/images/user/default.jpg") ?>" class="card-img">
						</div>
						<div class="col-md-8 mt-3">
							<div class="card-body">
								<h4 class="card-title"><?= ucwords($content->name); ?></h4>
								<h5 class="text-gray-800"><?= $content->email; ?></h5>
								<a href="<?= base_url("/profile/update/$content->id"); ?>" class="btn btn-primary mt-5">Ubah</a>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</div>
	</div>
</main>
