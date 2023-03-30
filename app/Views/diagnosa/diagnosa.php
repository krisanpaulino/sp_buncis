<?= $this->extend('layout_petani'); ?>
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
            <!-- <h5 class="card-title"></h5>
            <hr /> -->
            <!-- Your Content Here -->
            <div class="d-flex align-items-center">
                <div class="flex-grow-1 ms-3">
                    <?= form_open('petani/diagnosa/proses/' . $diagnosa_id) ?>
                    <input type="hidden" name="gejala_kode" value="<?= $gejala->gejala_kode ?>">
                    <h5 class="mt-2 text-center">Apakah <?= $gejala->gejala_nama ?> ?</h5>
                    <div class="text-center">
                        <img src="<?= base_url('assets/img/gejala/' . $gejala->gejala_foto) ?>" alt="" class="img-fluid" style="width:200px">
                    </div>
                    <div class="d-flex justify-content-center mt-2">
                        <button type="submit" name="jawaban" value="Ya" class="btn btn-primary m-2">Ya</button>
                        <button type="submit" name="jawaban" value="Tidak" class="btn btn-primary m-2">Tidak</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>