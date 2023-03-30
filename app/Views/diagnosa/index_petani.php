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
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="<?= base_url('petani/diagnosa/mulai') ?>" class="btn btn-primary">Mulai Diagnosa</a>
            </div>
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
            <h5 class="card-title">Riwayat Diagnosa</h5>
            <hr />
            <!-- Your Content Here -->
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Tanggal Diagnosa</th>
                            <th>Hasil</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($diagnosa as $diag) : ?>
                            <tr>
                                <td><?= $diag->diagnosa_tgl ?></td>
                                <td><?= $diag->penyakit_nama ?></td>
                                <td>
                                    <?= form_open(session('user')->user_type . '/diagnosa/delete') ?>
                                    <input type="hidden" name="diagnosa_id" value="<?= $diag->diagnosa_id ?>">
                                    <a href="<?= base_url(session('user')->user_type . '/diagnosa/' . $diag->diagnosa_id) ?>" class="badge bg-primary"><i class="bx bx-show-alt"></i></a>
                                    <button type="submit" class="badge bg-danger border" onclick="return confirm('Apakah anda yakin menghapus diagnosa ini?')"><i class="bx bx-trash-alt"></i></button>
                                    <?= form_close() ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>