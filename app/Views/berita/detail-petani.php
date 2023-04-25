<?= $this->extend('layout_petani'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3"><?= $title ?></div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('petani') ?>"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="<?= base_url('petani/berita') ?>">Berita</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $berita->berita_judul ?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="text-center mb-4">
        <h1><?= $berita->berita_judul ?></h1>
        <p class="text-muted">Tanggal : <?= $berita->berita_tgl ?></p>
    </div>
    <div class="card">
        <div class="card-body">
            <!-- Your Content Here -->
            <br>
            <div class="text-center">
                <img src="<?= base_url('assets/img/profile/' . $berita->berita_thumbnail) ?>" alt="" class="img-fluid">
            </div>
            <br>
            <?= $berita->berita_isi ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>