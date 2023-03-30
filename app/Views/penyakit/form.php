<?= $this->extend('layout_' . session('user')->user_type); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="bx bx-home-alt"></i></a>
                    </li>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url(session('user')->user_type) ?>/penyakit">Data Penyakit</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
            <div class="text-white"><?= session('success') ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <?php if (session()->has('danger')) : ?>
        <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
            <div class="text-white"><?= session('danger') ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <div class="card">
        <div class="card-body">
            <h6 class="mb-0 text-uppercase"><?= $form_title ?></h6>
            <hr />
            <?php if ($penyakit->penyakit_kode == null) : ?>
                <?= form_open(session('user')->user_type . '/penyakit/store', ['enctype' => 'multipart/form-data']) ?>
                <input type="hidden" name="penyakit_kode" value="<?= $penyakit->penyakit_kode ?>">
            <?php else : ?>
                <?= form_open(session('user')->user_type . '/penyakit/update', ['enctype' => 'multipart/form-data']) ?>
                <input type="hidden" name="penyakit_kode" value="<?= $penyakit->penyakit_kode ?>">
            <?php endif ?>
            <div class="form-group mb-4">
                <label for="penyakit_nama">Nama Penyakit</label>
                <input type="text" class="form-control <?= (isset(session('errors')['penyakit_nama'])) ? 'is-invalid' : '' ?>" id="penyakit_nama" name="penyakit_nama" value="<?= old('penyakit_nama', $penyakit->penyakit_nama) ?>">
                <div class="invalid-feedback">
                    <?php if (isset(session('errors')['penyakit_nama'])) : ?>
                        <?= session('errors')['penyakit_nama'] ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="file">Gambar Penyakit</label>
                <input type="file" class="form-control <?= (isset(session('errors')['file'])) ? 'is-invalid' : '' ?>" id="file" name="file" value="<?= old('file') ?>" <?= ($penyakit->penyakit_kode == null) ? 'required' : '' ?>>
                <div class="invalid-feedback">
                    <?php if (isset(session('errors')['file'])) : ?>
                        <?= session('errors')['file'] ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="penyakit_detail">Detail Penyakit</label>
                <textarea id="editor" name="penyakit_detail" aria-hidden="true" style="display: none;" required><?= old('penyakit_detail', $penyakit->penyakit_detail) ?></textarea>
                <div class="invalid-feedback">
                    <?php if (isset(session('errors')['penyakit_detail'])) : ?>
                        <?= session('errors')['penyakit_detail'] ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group mb-4">
                <label for="penyakit_solusi">Solusi</label>
                <textarea id="editor1" name="penyakit_solusi" aria-hidden="true" style="display: none;" required><?= old('penyakit_solusi', $penyakit->penyakit_solusi) ?></textarea>
                <div class="invalid-feedback">
                    <?php if (isset(session('errors')['penyakit_solusi'])) : ?>
                        <?= session('errors')['penyakit_solusi'] ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Penyakit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('scripts'); ?>
<script src="<?= base_url() ?>/assets/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor');
    CKEDITOR.replace('editor1');
</script>
<?= $this->endSection(); ?>