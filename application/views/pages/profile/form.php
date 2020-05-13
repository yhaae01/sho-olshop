<main role="main" class="container">
    <div class="row">
        <div class="col-md-12">
        <h4 class="pt-3 pb-3">Form Profile</h4>
            <div class="card">
                <div class="card-body">
                    <?php echo form_open_multipart($form_action, ['method' => 'POST']);?>
                        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                        <div class="form-group">
                            <label for="name">Nama :</label>
                            <?= form_input('name', $input->name, ['class' => 'form-control', 'autofocus' => true]); ?>
                            <?= form_error('name'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control']); ?>
                            <?= form_error('email'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password : </label>
                            <?= form_password('password', '', ['class' => 'form-control']); ?>
                            <?= form_error('password'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label> <br>
                            <?= form_upload('image'); ?>
                            <?php if ($this->session->flashdata('image_error')) : ?>
                                <small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
                            <?php endif ?>

                            <?php if (isset($input->image)) :?>
                                <img src="<?= base_url("/assets/images/user/$input->image") ?>" height="150">
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</main>