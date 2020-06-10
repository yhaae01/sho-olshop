<main role="main" class="container">
    <?php $this->load->view('layouts/alert'); ?>
    <div class="row">
        <div class="col-6 mx-auto">
        <h4 class="pt-3 pb-3">Login</h4>
            <div class="card">
                <div class="card-body">
                    <?= form_open('login', ['method' => 'POST']); ?>
                        <div class="form-group">
                            <label for="email">Email </label>
                            <?= form_input(['type' => 'email', 'name' => 'email','autocomplete' => 'no', 'value' => $input->email, 'class' => 'form-control']); ?>
                            <?= form_error('email'); ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password </label>
                            <?= form_password('password', '', ['class' => 'form-control']); ?>
                            <?= form_error('password'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</main>