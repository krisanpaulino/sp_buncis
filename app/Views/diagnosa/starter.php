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
                    <li class="breadcrumb-item"><a href="<?= base_url('petani/diagnosa') ?>">Diagnosa</a>
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
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1 ms-3">
                        <h5 class="mt-0">Mulai Diagnosa Penyakit Tanaman Buncis</h5>
                        <p class="mb-0">Proses diagnosa dilakukan dengan meng-konfirmasi kondisi tanaman buncis yang terkena penyakit. Sejumlah gejala akan muncul satu per satu dan anda dipersilahkan untuk memilih <b>'Ya'</b> atau <b>'Tidak'</b> sesuai dengan keadaan tanaman buncis yang didiagnosa. Gejala dan hasil yang muncul selanjutnya akan dipengaruhi pilihan-pilihan anda sebelumnya.</p>
                        <p class="mt-2">
                            <?= form_open('petani/diagnosa/create-diagnosa') ?>
                            <button type="submit" class="btn btn-primary">Mulai Diagnosa >></button>
                            <?= form_close() ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>