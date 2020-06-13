<main role="main" class="container">
    <div class="row">
        <div class="col-md-10 mx-auto">
        <h4 class="pt-3 pb-3">Form Produk</h4>
            <div class="card">

                <div class="card-body">
                    <?php echo form_open_multipart($form_action, ['method' => 'POST']);?>
                        <?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
                        <div class="form-group">
                            <label for="produk">Produk</label>
                            <?= form_input('title', $input->title, ['class' => 'form-control', 'autofocus' => true, 'id' => 'title', 'onkeyup' => 'createSlug()', 'autocomplete' => 'no']); ?>
                            <?= form_error('title'); ?>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <?= form_textarea(['name' => 'description', 'value' => $input->description, 'row' => '4', 'class' => 'form-control']); ?>
                            <?= form_error('description'); ?>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <?= 
                            form_input(['type' => 'text', 'name' => 'price', 'value' => $input->price, 'class' => 'form-control col-3', 'onkeypress' => 'return hanyaAngka(event)', 'maxlength' => '7']); ?>
                            <?= form_error('price'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <?= form_dropdown('id_category', getDropdownList('category', ['id', 'title']), $input->id_category, ['class' => 'form-control col-3']); ?>
                            <?= form_error('id_category'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Ada Stok</label> <br>
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'is_available', 'value' => 1, 'checked' => $input->is_available == 1 ? true : false, 'class' => 'form-check-input', 'id' => 'stok']); ?>
                                <label for="stok" class="form-check-label">Tersedia</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <?= form_radio(['name' => 'is_available', 'value' => 0, 'checked' => $input->is_available == 0 ? true : false, 'class' => 'form-check-input', 'id' => 'stok2']); ?>
                                <label for="stok2" class="form-check-label">Kosong</label>
                            </div>
                        </div>
						<div class="form-group">
							<label for="">Gambar</label>
							<br>
							<?= form_upload('image') ?>
							<?php if ($this->session->flashdata('image_error')) : ?>
								<small class="form-text text-danger"><?= $this->session->flashdata('image_error') ?></small>
							<?php endif ?>
							<?php if ($input->image): ?>
								<img src="<?= base_url("assets/images/product/$input->image") ?>" alt="" height="150">
							<?php endif ?>
						</div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <?= form_input('slug', $input->slug, ['class' => 'form-control', 'id' => 'slug']); ?>
                            <?= form_error('slug'); ?>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</main>