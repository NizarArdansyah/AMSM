<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>

<div class="container-fluid py-4">
    <div class="row justify-content-between">
        <div class="col-auto">
            <?php if (isset($validation)) { ?>
                <div class="col-md-12">
                    <?php foreach ($validation->getErrors() as $error) : ?>
                        <div class="alert alert-warning text-white d-flex justify-content-between" role="alert">
                            <div>
                                <i class="fas fa-bell me-2"></i>
                                <?= esc($error) ?>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php } ?>
            <?php
            if (session()->getFlashData('Berhasil')) :
            ?>
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <span class="text-sm"><strong>Berhasil!</strong>, <?= session()->getFlashData('Berhasil') ?></span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            elseif (session()->getFlashData('Gagal')) :
            ?>
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm"><strong>Gagal!</strong>, <?= session()->getFlashData('Gagal') ?></span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            endif;
            ?>
        </div>
        <div class="col-auto">
            <!-- Button trigger modal tambah user -->
            <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modal_tambah_user">
                Tambah User
                <i class="material-icons opacity-10">add</i>
            </button>

            <!-- Modal tambah user -->
            <div class="modal fade " id="modal_tambah_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_tambah_userLabel" aria-hidden="true">
                <div class="modal-dialog modal-l modal-dialog-centered modal-dialog-scrollable">
                    <form class="modal-content" method="post" action="/tambah-user">
                        <?php csrf_field(); ?>
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal_tambah_userLabel">Tambah User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="form-group row mb-3">
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control border-modal w-100 px-3  form-control-user <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control border-modal w-100 px-3 form-control-user <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password" class="form-control border-modal w-100 px-3 form-control-user <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                        </div>

                                        <div class="col-sm-6">
                                            <input type="password" name="pass_confirm" class="form-control border-modal w-100 px-3 form-control-user <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Tambah User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Daftar User</h6>
                </div>
            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-4">
                    <table id="data_table" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detail User</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($users as $rw) {
                                $row = "row" . $rw->id;
                                echo $$row;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer class="footer py-4  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-4 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script> -
                            Aplikasi Sistem Manajemen Surat
                        </div>

                    </div>
                </div>
        </footer>
    </div>

    <!-- modal update group -->
    <form action="/ubah-group" method="post">
        <div class="modal fade" id="changeGroupModal" tabindex="-1" role="dialog" aria-labelledby="changeGroupModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changeGroupModal">Ubah Grup</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class=" p-3">
                            <div class="row align-items-start">
                                <div class="col-md-4 mb-8pt mb-md-0">
                                    <div class="media align-items-left">
                                        <div class="d-flex flex-column media-body media-middle">
                                            <span class="card-title">Grup</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mb-8pt mb-md-0">
                                    <select name="group" class="form-control border-modal form-select px-3" data-toggle="select">
                                        <?php foreach ($groups as $key => $row) : ?>
                                            <option value="<?= $row->id; ?>"><?= $row->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" class="id">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>