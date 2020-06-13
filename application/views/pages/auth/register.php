<main role="main" class="container">
    <?php $this->load->view('layouts/alert'); ?>
    <div class="row">
        <div class="col-6 mx-auto">
        <h4 class="pt-3 pb-3">Form Registrasi</h4>
            <div class="card">
                <div class="card-body">
                    <?= form_open('register', ['method' => 'POST']); ?>
                        <div class="form-group">
                            <label for="name">Nama :</label>
                            <?= form_input('name', $input->name, ['class' => 'form-control', 'autofocus' => true]); ?>
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
                            <label for="password2">Ulangi Password : </label>
                            <?= form_password('password2', '', ['class' => 'form-control']); ?>
                            <?= form_error('password2'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</main>