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

                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form">Tambah</button>
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
            <div>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gejala</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($data_gejala as $gejala) : ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $gejala->gejala_nama ?></td>
                                <td>
                                    <form action="<?= base_url(session('user')->user_type . '/gejala/delete') ?>" method="post">
                                        <input type="hidden" name="gejala_kode" value="<?= $gejala->gejala_kode ?>">
                                        <button type="button" class="badge bg-primary border" data-bs-toggle="modal" data-bs-target="#form<?= $gejala->gejala_kode ?>">Edit</button>
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus gejala?')" class="badge bg-danger border">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" aria-labelledby="formLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formLabel">Tambah Gejala</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open(session('user')->user_type . '/gejala/store', ['enctype' => 'multipart/form-data']) ?>
            <div class="modal-body">
                <div class="form-group mb-4">
                    <label for="gejala_nama">Gejala</label>
                    <input type="text" class="form-control <?= (isset(session('errors')['gejala_nama'])) ? 'is-invalid' : '' ?>" id="gejala_nama" name="gejala_nama" value="<?= old('gejala_nama') ?>">
                    <div class="invalid-feedback">
                        <?php if (isset(session('errors')['gejala_nama'])) : ?>
                            <?= session('errors')['gejala_nama'] ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group mb-4">
                    <label for="file">Gambar Gejala</label>
                    <input type="file" class="form-control <?= (isset(session('errors')['file'])) ? 'is-invalid' : '' ?>" id="file" name="file" value="<?= old('file') ?>" required>
                    <div class="invalid-feedback">
                        <?php if (isset(session('errors')['file'])) : ?>
                            <?= session('errors')['file'] ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<?php foreach ($data_gejala as $gejala) : ?>
    <div class="modal fade" id="form<?= $gejala->gejala_kode ?>" tabindex="-1" aria-labelledby="formLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formLabel">Tambah Gejala</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <?= form_open(session('user')->user_type . '/gejala/update', ['enctype' => 'multipart/form-data']) ?>
                <div class="modal-body">
                    <div class="form-group mb-4">
                        <input type="hidden" name="gejala_kode" value="<?= $gejala->gejala_kode ?>">
                        <label for="gejala_nama">Gejala</label>
                        <input type="text" class="form-control <?= (isset(session('errors')['gejala_nama'])) ? 'is-invalid' : '' ?>" id="gejala_nama" name="gejala_nama" value="<?= old('gejala_nama', $gejala->gejala_nama) ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['gejala_nama'])) : ?>
                                <?= session('errors')['gejala_nama'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-4">
                        <label for="file">Gambar Gejala (Kosongkan Jika Tidak Berubah)</label>
                        <input type="file" class="form-control <?= (isset(session('errors')['file'])) ? 'is-invalid' : '' ?>" id="file" name="file" value="<?= old('file') ?>">
                        <div class="invalid-feedback">
                            <?php if (isset(session('errors')['file'])) : ?>
                                <?= session('errors')['file'] ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <img src="<?= base_url('assets/img/gejala/' . $gejala->gejala_foto) ?>" alt="" class="img-thumbnail">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?= $this->endSection(); ?>