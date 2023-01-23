<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>

<div class="container-fluid py-4">
    <div class="row justify-content-between">
        <div class="col-auto">
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
            <div class="modal fade bd-example-modal-xl" id="modal_tambah_user" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modal_tambah_userLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                    <form class="modal-content" method="post" action="/manajemen-user">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal_tambah_userLabel">Tambah User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class=" mb-3">
                                            <input hidden type="text" name="id" id="id" class="form-control border-modal w-100 px-3" disabled>
                                            <div class="col-12 text-start ">
                                                <label for="username">Username</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="username" id="username" class="form-control border-modal w-100 px-3">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <div class="col-12 text-start ">
                                                <label for="group">Role</label>
                                            </div>
                                            <div class="col-12">
                                                <select name="group" autofocus class="form-control border-modal form-select px-3">
                                                    <option class="p-2" selected disabled>Pilih role user</option>
                                                    <option class="p-2" value="admin">Admin</option>
                                                    <option class="p-2" value="petugas">Petugas</option>
                                                    <option class="p-2" value="user">Warga</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <div class="col-12 text-start ">
                                                <label for="fullname">Nama Lengkap</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="fullname" id="fullname" class="form-control border-modal w-100 px-3">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <div class="col-12 text-start ">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="email" id="email" class="form-control border-modal w-100 px-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" mb-3">
                                            <div class="col-12 text-start ">
                                                <label for="ttl">Tempat, tanggal lahir</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="ttl" id="ttl" class="form-control border-modal w-100 px-3">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <div class="col-12 text-start ">
                                                <label for="agama">Agama</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="agama" id="agama" class="form-control border-modal w-100 px-3">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <div class="col-12 text-start ">
                                                <label for="pekerjaan">Pekerjaan</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control border-modal w-100 px-3">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <div class="col-12 text-start ">
                                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control border-modal w-100 px-3">
                                            </div>
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
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detail User</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($users as $usr) :
                            ?>
                                <tr>
                                    <td class="align-middle text-center text-sm">
                                        <span>
                                            <?= $no ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="<?= base_url() ?>/assets/img/<?= $usr->img_user ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?= $usr->username; ?></h6>
                                                <p class="text-xs text-secondary mb-0">ID : <?= $usr->id; ?></p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <p class="text-xs font-weight-bold m-0">
                                            <?php if ($usr->name == 'admin') : ?>
                                                <span class="badge badge-sm bg-gradient-success">Admin</span>
                                            <?php elseif ($usr->name == 'petugas') : ?>
                                                <span class="badge badge-sm bg-gradient-info">Petugas</span>
                                            <?php elseif ($usr->name == 'user') : ?>
                                                <span class="badge badge-sm bg-gradient-secondary">Warga</span>
                                            <?php endif; ?>
                                        </p>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <?= $usr->email; ?>
                                    </td>
                                    <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold">
                                            <?= $usr->nik; ?>
                                        </span>
                                    </td>
                                    <td class="align-middle text-center">
                                        <!-- Button trigger modal detail user -->
                                        <button type="" class="btn btn-sm m-0 bg-dark text-white border-0 mr-2" data-bs-toggle="modal" data-bs-target="#detail_user<?= $usr->id ?>">
                                            Detail
                                        </button>
                                        <!-- Modal detail user -->
                                        <div class="modal fade bd-example-modal-xl" id="detail_user<?= $usr->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detail_userLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                <form class="modal-content" method="post" action="/update-user">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="detail_userLabel">Detail User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class=" mb-3">
                                                                        <input hidden type="text" name="id" id="id" value="<?= $usr->id ?>" class="form-control border-modal w-100 px-3" disabled>
                                                                        <div class="col-12 text-start ">
                                                                            <label for="username">Username</label>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <input type="text" name="username" id="username" value="<?= $usr->username ?>" class="form-control border-modal w-100 px-3">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" mb-3">
                                                                        <div class="col-12 text-start ">
                                                                            <label for="name">Role</label>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <select name="name" autofocus class="form-control border-modal form-select px-3">
                                                                                <option class="p-2" disabled>Pilih role user</option>
                                                                                <option class="p-2" value="admin" <?php if ($usr->name == 'admin') {
                                                                                                                        echo ("selected");
                                                                                                                    }  ?>>Admin</option>
                                                                                <option class="p-2" value="petugas" <?php if ($usr->name == 'petugas') {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>>Petugas</option>
                                                                                <option class="p-2" value="user" <?php if ($usr->name == 'user') {
                                                                                                                        echo 'selected';
                                                                                                                    } ?>>Warga</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class=" mb-3">
                                                                        <div class="col-12 text-start ">
                                                                            <label for="fullname">Nama Lengkap</label>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <input type="text" name="fullname" id="fullname" value="<?= $usr->fullname ?>" class="form-control border-modal w-100 px-3">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" mb-3">
                                                                        <div class="col-12 text-start ">
                                                                            <label for="email">Email</label>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <input type="text" name="email" id="email" value="<?= $usr->email ?>" class="form-control border-modal w-100 px-3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class=" mb-3">
                                                                        <div class="col-12 text-start ">
                                                                            <label for="ttl">Tempat, tanggal lahir</label>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <input type="text" name="ttl" id="ttl" value="<?= $usr->ttl ?>" class="form-control border-modal w-100 px-3">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" mb-3">
                                                                        <div class="col-12 text-start ">
                                                                            <label for="agama">Agama</label>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <input type="text" name="agama" id="agama" value="<?= $usr->agama ?>" class="form-control border-modal w-100 px-3">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" mb-3">
                                                                        <div class="col-12 text-start ">
                                                                            <label for="pekerjaan">Pekerjaan</label>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <input type="text" name="pekerjaan" id="pekerjaan" value="<?= $usr->pekerjaan ?>" class="form-control border-modal w-100 px-3">
                                                                        </div>
                                                                    </div>
                                                                    <div class=" mb-3">
                                                                        <div class="col-12 text-start ">
                                                                            <label for="kewarganegaraan">Kewarganegaraan</label>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <input type="text" name="kewarganegaraan" id="kewarganegaraan" value="<?= $usr->kewarganegaraan ?>" class="form-control border-modal w-100 px-3">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-info">Edit User</button>
                                                        <a href="/hapus-user/<?= $usr->id ?>" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center">
                                        <!-- Button trigger modal konfirmasi hapus user -->
                                        <button type="button" class="badge border border-1 border-warning badge-warning text-warning " data-bs-toggle="modal" data-bs-target="#hapusUserModal<?= $usr->id ?>">
                                            <i class="fas fa-trash"></i>
                                        </button>

                                        <!-- Modal konfirmasi hapus user -->
                                        <div class="modal fade" id="hapusUserModal<?= $usr->id ?>" tabindex="-1" aria-labelledby="hapusUserModalLabel<?= $usr->id ?>" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="hapusUserModalLabel<?= $usr->id ?>">Konfirmasi Hapus User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah anda yakin ingin menghapus user <b><?= $usr->username ?></b> ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                        <a href="/hapus-user/<?= $usr->id ?>" class="btn btn-danger">
                                                            Hapus
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </td>
                                </tr>

                            <?php
                                $no++;
                            endforeach
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php

        ?>
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

    <?= $this->endSection(); ?>