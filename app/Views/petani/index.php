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
                    <li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#form">Tambah</button>
            <!-- Modal -->
            <div class="modal fade" id="form" tabindex="-1" aria-labelledby="formLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formLabel">Tambah Petani</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('admin/petani/store') ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group mb-4">
                                    <label for="petani_nama">Nama petani</label>
                                    <input type="text" class="form-control <?= (isset(session('errors')['petani_nama'])) ? 'is-invalid' : '' ?>" id="petani_nama" name="petani_nama" value="<?= old('petani_nama') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['petani_nama'])) : ?>
                                            <?= session('errors')['petani_nama'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="petani_jk">Jenis Kelamin</label>
                                    <select class="form-select <?= (isset(session('errors')['petani_jk'])) ? 'is-invalid' : '' ?>" id="petani_jk" name="petani_jk" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" <?= (old('petani_jk') == 'L') ? 'selected' : '' ?>>Laki - Laki</option>
                                        <option value="P" <?= (old('petani_jk') == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['petani_jk'])) : ?>
                                            <?= session('errors')['petani_jk'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="petani_tempatlahir">Tempat Lahir</label>
                                    <input type="text" class="form-control <?= (isset(session('errors')['petani_tempatlahir'])) ? 'is-invalid' : '' ?>" id="petani_tempatlahir" name="petani_tempatlahir" value="<?= old('petani_tempatlahir') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['petani_tempatlahir'])) : ?>
                                            <?= session('errors')['petani_tempatlahir'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="petani_tgllahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control <?= (isset(session('errors')['petani_tgllahir'])) ? 'is-invalid' : '' ?>" id="petani_tgllahir" name="petani_tgllahir" value="<?= old('petani_tgllahir') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['petani_tgllahir'])) : ?>
                                            <?= session('errors')['petani_tgllahir'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="petani_alamat">Alamat</label>
                                    <input type="text" class="form-control <?= (isset(session('errors')['petani_alamat'])) ? 'is-invalid' : '' ?>" id="petani_alamat" name="petani_alamat" value="<?= old('petani_alamat') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['petani_alamat'])) : ?>
                                            <?= session('errors')['petani_alamat'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="user_email">Email</label>
                                    <input type="text" class="form-control <?= (isset(session('errors')['user_email'])) ? 'is-invalid' : '' ?>" id="user_email" name="user_email" value="<?= old('user_email') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['user_email'])) : ?>
                                            <?= session('errors')['user_email'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="petani_hp">No. HP</label>
                                    <input type="text" class="form-control <?= (isset(session('errors')['petani_hp'])) ? 'is-invalid' : '' ?>" id="petani_hp" name="petani_hp" value="<?= old('petani_hp') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['petani_hp'])) : ?>
                                            <?= session('errors')['petani_hp'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="petani_foto">Foto</label>
                                    <input type="file" class="form-control <?= (isset(session('errors')['petani_foto'])) ? 'is-invalid' : '' ?>" id="petani_foto" name="petani_foto">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['petani_foto'])) : ?>
                                            <?= session('errors')['petani_foto'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
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
            <h5 class="card-title"></h5>
            <hr />
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Petani</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_petani as $petani) : ?>
                            <tr>
                                <td><?= $petani->petani_nama ?></td>
                                <td><?= $petani->petani_jk ?></td>
                                <td><?= $petani->petani_alamat ?></td>
                                <td>
                                    <form action="<?= base_url('admin/petani/delete') ?>" method="post">
                                        <input type="hidden" name="petani_id" value="<?= $petani->petani_id ?>">
                                        <a href="<?= base_url('admin/petani/' . $petani->petani_id) ?>" class="badge bg-info">Detail</a>
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus petani?')" class="badge bg-danger border">Hapus</button>
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
<?= $this->endSection(); ?>