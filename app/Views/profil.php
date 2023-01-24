<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>
<div class="container-fluid py-4">
    <div class="container-fluid px-2 px-md-4">
        <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('/assets/img/profile-background.png');">
            <span class=""></span>
        </div>
        <div class="card card-body mx-3 mx-md-4 mt-n6">
            <div class="row gx-4 mb-2">
                <div class="col-auto">
                    <div class="avatar avatar-xl bg-gradient-dark position-relative">
                        <img src="/assets/img/<?= $user->img_user ?>" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            <?= $user->username ?>
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            <?= $user->email ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <!-- Button trigger modal ubah profil -->
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link cursor-pointer mb-0 px-0 py-1 " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="material-icons text-lg position-relative">settings</i>
                                    <span class="ms-1">Ubah Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Modal ubah profil -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                            <form action="/ubah-profil" method="post" class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Ubah Profil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <input type="hidden" name="id_user" value="<?= $user->id ?>">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class=" mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="nik">NIK</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="number" name="nik" id="nik" value="<?= $user->nik ?>" class="form-control border-modal w-100 px-3">
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="fullname">Nama Lengkap</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" name="fullname" id="fullname" value="<?= $user->fullname ?>" class="form-control border-modal w-100 px-3">
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="ttl">Tempat & Tanggal lahir</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" name="ttl" id="ttl" value="<?= $user->ttl ?>" class="form-control border-modal w-100 px-3">
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="kewarganegaraan">Kewarganegaraan</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" name="kewarganegaraan" id="kewarganegaraan" value="<?= $user->kewarganegaraan ?>" class="form-control border-modal w-100 px-3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class=" mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="agama">Agama</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" name="agama" id="agama" value="<?= $user->agama ?>" class="form-control border-modal w-100 px-3">
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="pekerjaan">Pekerjaan</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" name="pekerjaan" id="pekerjaan" value="<?= $user->pekerjaan ?>" class="form-control border-modal w-100 px-3">
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="alamat">Alamat Tempat tinggal</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <textarea type="text" name="alamat" id="alamat" class="form-control border-modal w-100 px-3"><?= $user->alamat ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn border border-1 border-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-info">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-12 col-xl-8">
                        <div class="card card-plain h-100">
                            <div class="card-header pb-0 p-3">
                                <div class="row d-flex align-items-center py-2 rounded-3">
                                    <div class="col text-start ">
                                        <a href="javascript:;">
                                            <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Profile"></i>
                                        </a>
                                        <span class="mb-0 m-2 text-bold text-start ">Informasi Profil</span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-3">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <strong class="text-dark">Full Name</strong>
                                            </div>
                                            <div class="col-xl-8">
                                                <?= $user->fullname ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <strong class="text-dark">NIK</strong>
                                            </div>
                                            <div class="col-xl-8">
                                                <?= $user->nik ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <strong class="text-dark">Tempat & Tanggal lahir</strong>
                                            </div>
                                            <div class="col-xl-8">
                                                <?= $user->ttl ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <strong class="text-dark">Kewarganegaraan</strong>
                                            </div>
                                            <div class="col-xl-8">
                                                <?= $user->kewarganegaraan ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <strong class="text-dark">Agama</strong>
                                            </div>
                                            <div class="col-xl-8">
                                                <?= $user->agama ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <strong class="text-dark">Pekerjaan</strong>
                                            </div>
                                            <div class="col-xl-8">
                                                <?= $user->pekerjaan ?>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm">
                                        <div class="row">
                                            <div class="col-xl-4">
                                                <strong class="text-dark">Alamat</strong>
                                            </div>
                                            <div class="col-xl-8">
                                                <?= $user->alamat ?>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer pt-4  ">
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