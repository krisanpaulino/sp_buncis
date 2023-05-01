<?= $this->extend('layout_admin'); ?>
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
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/berita') ?>">Berita</a>
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
            <h5 class="card-title"></h5>
            <hr />
            <!-- Your Content Here -->
            <form action="<?= base_url('admin/berita/store') ?>" method="post" enctype="multipart/form-data">
                <div class="form-group mb-4">
                    <label for="berita_judul">Judul Berita</label>
                    <input type="text" class="form-control <?= (isset(session('errors')['berita_judul'])) ? 'is-invalid' : '' ?>" id="berita_judul" name="berita_judul" value="<?= old('berita_judul') ?>">
                    <div class="invalid-feedback">
                        <?php if (isset(session('errors')['berita_judul'])) : ?>
                            <?= session('errors')['berita_judul'] ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="berita_isi">Isi Berita</label>
                    <textarea rows="10" cols="80" id="editor1" name="berita_isi"><?= old('berita_isi') ?></textarea>
                    <div class="invalid-feedback">
                        <?php if (isset(session('errors')['berita_isi'])) : ?>
                            <?= session('errors')['berita_isi'] ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="file">Thumbnail Berita</label>
                    <input type="file" class="form-control <?= (isset(session('errors')['file'])) ? 'is-invalid' : '' ?>" id="file" name="file" value="<?= old('file') ?>">
                    <div class="invalid-feedback">
                        <?php if (isset(session('errors')['file'])) : ?>
                            <?= session('errors')['file'] ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" name="berita_highlight" value="1" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Informasi (Hanya Tampil Di Dashboard)
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>