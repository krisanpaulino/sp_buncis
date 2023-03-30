<?= $this->extend('layout_admin'); ?>
<?= $this->section('content'); ?>
<div class="page-content">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Jumlah Petani</p>
                            <h4 class="my-1 text-info"><?= $jumlah_petani ?></h4>
                            <p class="mb-0 font-13"><b><a href="<?= base_url('admin/petani') ?>" class="text-primary">Lihat >></a></b></p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto"><i class="bx bxs-user-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Jumlah Pakar</p>
                            <h4 class="my-1 text-danger"><?= $jumlah_pakar ?></h4>
                            <p class="mb-0 font-13"><b><a href="<?= base_url('admin/pakar') ?>" class="text-primary">Lihat >></a></b></p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i class="bx bxs-user"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Diagnosa</p>
                            <h4 class="my-1 text-success"><?= $jumlah_diagnosa ?></h4>
                            <p class="mb-0 font-13"><b><a href="<?= base_url('admin/diagnosa') ?>" class="text-primary">Lihat >></a></b></p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto"><i class="bx bxs-bar-chart-alt-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Jumlah Penyakit</p>
                            <h4 class="my-1 text-warning"><?= $jumlah_penyakit ?></h4>
                            <p class="mb-0 font-13"><b><a href="<?= base_url('admin/penyakit') ?>" class="text-primary">Lihat >></a></b></p>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i class="bx bxs-category"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>