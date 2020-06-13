<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
        <h4 class="pt-3 pb-3">Form Kategori</h4>
            <div class="card">
                <div class="card-body">
                    <?= form_open($form_action, ['method' => 'POST']); ?>
                        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                        <div class="form-group">
                            <label for="title">Kategori</label>
                            <?= form_input('title', $input->title, ['class' => 'form-control', 'autofocus' => true, 'id' => 'title', 'onkeyup' => 'createSlug()', 'autocomplete' => 'no']); ?>
                            <?= form_error('title'); ?>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug']); ?>
                            <?= form_error('slug'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    <?= form_close(); ?>
                </div>
            </div>

        </div>
    </div>
</main>