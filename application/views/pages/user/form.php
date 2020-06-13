<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
        <h4 class="pt-3 pb-3">Form Pengguna</h4>
            <div class="card">

                <div class="card-body">
                    <?php echo form_open_multipart($form_action, ['method' => 'POST']);?>
                        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                        <div class="form-group">
                            <label for="name">Nama :</label>
                            <?= form_input('name', $input->name, ['class' => 'form-control', 'autofocus' => true, 'autocomplete' => 'no']); ?>
                            <?= form_error('name'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email :</label>
                            <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'autocomplete' => 'no']); ?>
                            <?= form_error('email'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password : </label>
                            <?= form_password('password', '', ['class' => 'form-control']); ?>
                            <?= form_error('password'); ?>
                        </div>
                        <div class="form-group">
                            <label>Role</label> <br>
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'role', 'value' => 'admin', 'checked' => $input->role == 'admin' ? true : false, 'class' => 'form-check-input', 'id' => 'role']); ?>
                                <label for="role" class="form-check-label">Admin</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'role', 'value' => 'member', 'checked' => $input->role == 'member' ? true : false, 'class' => 'form-check-input', 'id' => 'role2']); ?>
                                <label for="role2" class="form-check-label">Member</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Status</label> <br>
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'is_active', 'value' => '1', 'checked' => $input->is_active == 1 ? true : false, 'class' => 'form-check-input', 'id' => 'status']); ?>
                                <label for="status" class="form-check-label">Aktif</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'is_active', 'value' => '0', 'checked' => $input->is_active == 0 ? true : false, 'class' => 'form-check-input', 'id' => 'status2']); ?>
                                <label for="status2" class="form-check-label">Tidak Aktif</label>
                            </div>
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