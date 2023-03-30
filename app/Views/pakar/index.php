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
                            <h5 class="modal-title" id="formLabel">Tambah Pakar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="<?= base_url('admin/pakar/store') ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group mb-4">
                                    <label for="pakar_nama">Nama Pakar</label>
                                    <input type="text" class="form-control <?= (isset(session('errors')['pakar_nama'])) ? 'is-invalid' : '' ?>" id="pakar_nama" name="pakar_nama" value="<?= old('pakar_nama') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['pakar_nama'])) : ?>
                                            <?= session('errors')['pakar_nama'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pakar_jk">Jenis Kelamin</label>
                                    <select class="form-select <?= (isset(session('errors')['pakar_jk'])) ? 'is-invalid' : '' ?>" id="pakar_jk" name="pakar_jk" required>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" <?= (old('pakar_jk') == 'L') ? 'selected' : '' ?>>Laki - Laki</option>
                                        <option value="P" <?= (old('pakar_jk') == 'P') ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['pakar_jk'])) : ?>
                                            <?= session('errors')['pakar_jk'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pakar_tempatlahir">Tempat Lahir</label>
                                    <input type="text" class="form-control <?= (isset(session('errors')['pakar_tempatlahir'])) ? 'is-invalid' : '' ?>" id="pakar_tempatlahir" name="pakar_tempatlahir" value="<?= old('pakar_tempatlahir') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['pakar_tempatlahir'])) : ?>
                                            <?= session('errors')['pakar_tempatlahir'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pakar_tgllahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control <?= (isset(session('errors')['pakar_tgllahir'])) ? 'is-invalid' : '' ?>" id="pakar_tgllahir" name="pakar_tgllahir" value="<?= old('pakar_tgllahir') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['pakar_tgllahir'])) : ?>
                                            <?= session('errors')['pakar_tgllahir'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pakar_alamat">Alamat</label>
                                    <input type="text" class="form-control <?= (isset(session('errors')['pakar_alamat'])) ? 'is-invalid' : '' ?>" id="pakar_alamat" name="pakar_alamat" value="<?= old('pakar_alamat') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['pakar_alamat'])) : ?>
                                            <?= session('errors')['pakar_alamat'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pakar_pekerjaan">Profesi</label>
                                    <input type="text" class="form-control <?= (isset(session('errors')['pakar_pekerjaan'])) ? 'is-invalid' : '' ?>" id="pakar_pekerjaan" name="pakar_pekerjaan" value="<?= old('pakar_pekerjaan') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['pakar_pekerjaan'])) : ?>
                                            <?= session('errors')['pakar_pekerjaan'] ?>
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
                                    <label for="pakar_hp">No. HP</label>
                                    <input type="text" class="form-control <?= (isset(session('errors')['pakar_hp'])) ? 'is-invalid' : '' ?>" id="pakar_hp" name="pakar_hp" value="<?= old('pakar_hp') ?>">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['pakar_hp'])) : ?>
                                            <?= session('errors')['pakar_hp'] ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="pakar_foto">Foto</label>
                                    <input type="file" class="form-control <?= (isset(session('errors')['pakar_foto'])) ? 'is-invalid' : '' ?>" id="pakar_foto" name="pakar_foto">
                                    <div class="invalid-feedback">
                                        <?php if (isset(session('errors')['pakar_foto'])) : ?>
                                            <?= session('errors')['pakar_foto'] ?>
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
                            <th>Nama Pakar</th>
                            <th>Jenis Kelamin</th>
                            <th>Profesi Pakar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data_pakar as $pakar) : ?>
                            <tr>
                                <td><?= $pakar->pakar_nama ?></td>
                                <td><?= $pakar->pakar_jk ?></td>
                                <td><?= $pakar->pakar_pekerjaan ?></td>
                                <td>
                                    <form action="<?= base_url('admin/pakar/delete') ?>" method="post">
                                        <input type="hidden" name="pakar_id" value="<?= $pakar->pakar_id ?>">
                                        <a href="<?= base_url('admin/pakar/' . $pakar->pakar_id) ?>" class="badge bg-info">Detail</a>
                                        <button type="submit" onclick="return confirm('Apakah anda yakin ingin menghapus pakar?')" class="badge bg-danger border">Hapus</button>
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