<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>

<div class="container-fluid py-4">
    <?php if (in_groups('user')) : ?>
        <!-- alert jika belum melengkapi profil -->
        <?php if (!$profil_lengkap) : ?>
            <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                <span class="alert-icon text-white"><i class="fas fa-exclamation-triangle"></i></span>
                <span class="alert-text text-white">Lengkapi profil anda untuk dapat menggunakanan layanan surat, silahkan lengkapi profil anda <a href="<?= base_url('profil') ?>" class="text-white font-weight-bold text-decoration-underline">disini</a></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
        <?php endif; ?>

        <!-- card jumlah surat -->
        <div class="row mb-4">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Surat</p>
                            <h4 class="mb-0">
                                <?= count($surat) ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Surat dalam proses</p>
                            <h4 class="mb-0">
                                <?php
                                $count = 0;
                                foreach ($surat as $s) {
                                    if ($s->status == 'antre') {
                                        $count++;
                                    }
                                }
                                echo $count;
                                ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Surat yang diterima</p>
                            <h4 class="mb-0">
                                <?php
                                $count = 0;
                                foreach ($surat as $s) {
                                    if ($s->status == 'siap') {
                                        $count++;
                                    }
                                }
                                echo $count;
                                ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Surat yang dibatalkan</p>
                            <h4 class="mb-0">
                                <?php
                                $count = 0;
                                foreach ($surat as $s) {
                                    if ($s->status == 'dibatalkan') {
                                        $count++;
                                    }
                                }
                                echo $count;
                                ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- pesan pembatalan -->
        <div class="row mb-4">
            <div class="col-12 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <h6>Pembatalan Surat</h6>
                                <p class="text-sm mb-0">
                                    <span class="font-weight-bold ms-1">
                                        <?php
                                        $count = 0;
                                        foreach ($surat as $s) {
                                            if ($s->status == 'dibatalkan') {
                                                $count++;
                                            }
                                        }
                                        if ($count == 0) {
                                            $count = 'Tidak ada';
                                        } else {
                                            $count = $count;
                                        }
                                        echo $count;
                                        ?>
                                    </span> surat yang dibatalkan
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-4">
                            <table id="data_table" class="table align-items-center mb-0 ">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($surat as $s) : ?>
                                        <?php if ($s->status == 'dibatalkan') : ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="<?= base_url() ?>/assets/img/icon-surat.png" class="avatar avatar-sm me-3" alt="xd">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"><?= $s->jenis ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <?php
                                                    if ($s->status == 'antre') :
                                                    ?>
                                                        <span class="badge badge-sm bg-gradient-info"><?= $s->status; ?></span>
                                                    <?php
                                                    elseif ($s->status == 'siap') :
                                                    ?>
                                                        <span class="badge badge-sm bg-gradient-success"><?= $s->status; ?></span>
                                                    <?php
                                                    else :
                                                    ?>
                                                        <span class="badge badge-sm bg-gradient-danger"><?= $s->status; ?></span>
                                                    <?php
                                                    endif;
                                                    ?>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class=""><?= $s->tanggal_surat ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <?php
                                                    if ($s->pesan !== '') :
                                                    ?>
                                                        <button class="badge bg-info text-white border-0 position-relative" data-bs-toggle="modal" data-bs-target="#pesan_pembatalan_surat<?= $s->id ?>">
                                                            <i class="fas fa-envelope"></i>
                                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                                1
                                                                <span class="visually-hidden">unread messages</span>
                                                            </span>
                                                        </button>
                                                    <?php
                                                    else :
                                                    ?>
                                                        <button disabled class="badge border border-1 border-secondary text-secondary">
                                                            <i class="fas fa-envelope"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                    <!-- Modal pesan pembatalan surat -->
                                                    <div class="modal fade bd-example-modal-xl" id="pesan_pembatalan_surat<?= $s->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pesan_pembatalan_suratLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                            <form class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="pesan_pembatalan_suratLabel">Pesan Terkait Pembatalan Surat</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" style="text-align: start;">
                                                                    <p class="flex-wrap"><?= $s->pesan; ?></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php elseif (in_groups('petugas')) : ?>
        <!-- alert jika belum melengkapi profil -->
        <?php if (!$profil_lengkap) : ?>
            <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                <span class="alert-icon text-white"><i class="fas fa-exclamation-triangle"></i></span>
                <span class="alert-text text-white">Lengkapi profil anda untuk dapat menggunakanan layanan surat, silahkan lengkapi profil anda <a href="<?= base_url('profil') ?>" class="text-white font-weight-bold text-decoration-underline">disini</a></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- card jumlah surat -->
        <div class="row mb-4">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Surat</p>
                            <h4 class="mb-0">
                                <?= count($surats) ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Surat dalam proses</p>
                            <h4 class="mb-0">
                                <?php
                                $count = 0;
                                foreach ($surats as $s) {
                                    if ($s->status == 'antre') {
                                        $count++;
                                    }
                                }
                                echo $count;
                                ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Surat yang diterima</p>
                            <h4 class="mb-0">
                                <?php
                                $count = 0;
                                foreach ($surats as $s) {
                                    if ($s->status == 'siap') {
                                        $count++;
                                    }
                                }
                                echo $count;
                                ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Surat yang dibatalkan</p>
                            <h4 class="mb-0">
                                <?php
                                $count = 0;
                                foreach ($surats as $s) {
                                    if ($s->status == 'dibatalkan') {
                                        $count++;
                                    }
                                }
                                echo $count;
                                ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
        </div>


        <!-- pesan pembatalan -->
        <div class="row mb-4">
            <div class="col-12 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <h6>Pembatalan Surat</h6>
                                <p class="text-sm mb-0">
                                    <span class="font-weight-bold ms-1">
                                        <?php
                                        $count = 0;
                                        foreach ($surats as $s) {
                                            if ($s->status == 'dibatalkan') {
                                                $count++;
                                            }
                                        }
                                        if ($count == 0) {
                                            $count = 'Tidak ada';
                                        } else {
                                            $count = $count;
                                        }
                                        echo $count;
                                        ?>
                                    </span> surat yang dibatalkan
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-4">
                            <table id="data_table" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($surats as $s) : ?>
                                        <?php if ($s->status == 'dibatalkan') : ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="<?= base_url() ?>/assets/img/icon-surat.png" class="avatar avatar-sm me-3" alt="xd">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"><?= $s->jenis ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <?php
                                                    if ($s->status == 'antre') :
                                                    ?>
                                                        <span class="badge badge-sm bg-gradient-info"><?= $s->status; ?></span>
                                                    <?php
                                                    elseif ($s->status == 'siap') :
                                                    ?>
                                                        <span class="badge badge-sm bg-gradient-success"><?= $s->status; ?></span>
                                                    <?php
                                                    else :
                                                    ?>
                                                        <span class="badge badge-sm bg-gradient-danger"><?= $s->status; ?></span>
                                                    <?php
                                                    endif;
                                                    ?>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class=""><?= $s->tanggal_surat ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <?php
                                                    if ($s->pesan !== '') :
                                                    ?>
                                                        <button class="badge bg-info border-0 position-relative" data-bs-toggle="modal" data-bs-target="#pesan_pembatalan_surat<?= $s->id ?>">
                                                            <i class="fas fa-envelope"></i>
                                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-info bg-white">
                                                                ✓
                                                                <span class="visually-hidden">unread messages</span>
                                                            </span>
                                                        </button>
                                                    <?php
                                                    else :
                                                    ?>
                                                        <button class="badge border border-1 border-secondary text-secondary" data-bs-toggle="modal" data-bs-target="#pesan_pembatalan_surat<?= $s->id ?>">
                                                            <i class="fas fa-envelope"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                    <!-- Modal pesan pembatalan surat -->
                                                    <div class="modal fade bd-example-modal-xl" id="pesan_pembatalan_surat<?= $s->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pesan_pembatalan_suratLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                            <form class="modal-content" method="post" action="/pesan-pembatalan">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="pesan_pembatalan_suratLabel">Pesan Terkait Pembatalan Surat</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <input type="text" name="id_surat" value="<?= $s->id ?>" hidden>
                                                                        <div class="row">
                                                                            <div class="col-4" style="text-align: left;">
                                                                                <div class="mb-3">
                                                                                    <div class="flex align-items-center">
                                                                                        <label for="no_surat">No Surat :</label>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <?= $s->nomor_surat ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12" style="text-align: left;">
                                                                                <div class="mb-3">
                                                                                    <div class="text-left flex align-items-center">
                                                                                        <label for="pesan">Pesan</label>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <textarea type="text" name="pesan" id="pesan" class="form-control border-modal w-100 px-3"><?= $s->pesan ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-info">Kirim Pesan</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif (in_groups('admin')) : ?>
        <!-- alert jika belum melengkapi profil -->
        <?php if (!$profil_lengkap) : ?>
            <div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
                <span class="alert-icon text-white"><i class="fas fa-exclamation-triangle"></i></span>
                <span class="alert-text text-white">Lengkapi profil anda untuk dapat menggunakanan layanan surat, silahkan lengkapi profil anda <a href="<?= base_url('profil') ?>" class="text-white font-weight-bold text-decoration-underline">disini</a></span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <!-- card jumlah surat -->
        <div class="row mb-4">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Surat</p>
                            <h4 class="mb-0">
                                <?= count($surats) ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Surat dalam proses</p>
                            <h4 class="mb-0">
                                <?php
                                $count = 0;
                                foreach ($surats as $s) {
                                    if ($s->status == 'antre') {
                                        $count++;
                                    }
                                }
                                echo $count;
                                ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Surat yang diterima</p>
                            <h4 class="mb-0">
                                <?php
                                $count = 0;
                                foreach ($surats as $s) {
                                    if ($s->status == 'siap') {
                                        $count++;
                                    }
                                }
                                echo $count;
                                ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Surat yang dibatalkan</p>
                            <h4 class="mb-0">
                                <?php
                                $count = 0;
                                foreach ($surats as $s) {
                                    if ($s->status == 'dibatalkan') {
                                        $count++;
                                    }
                                }
                                echo $count;
                                ?>
                            </h4>
                        </div>
                    </div>

                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></p>
                    </div>
                </div>
            </div>
        </div>


        <!-- pesan pembatalan -->
        <div class="row mb-4">
            <div class="col-12 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-12 col-12">
                                <h6>Pembatalan Surat</h6>
                                <p class="text-sm mb-0">
                                    <span class="font-weight-bold ms-1">
                                        <?php
                                        $count = 0;
                                        foreach ($surats as $s) {
                                            if ($s->status == 'dibatalkan') {
                                                $count++;
                                            }
                                        }
                                        if ($count == 0) {
                                            $count = 'Tidak ada';
                                        } else {
                                            $count = $count;
                                        }
                                        echo $count;
                                        ?>
                                    </span> surat yang dibatalkan
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-4">
                            <table id="data_table" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Waktu</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pesan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($surats as $s) : ?>
                                        <?php if ($s->status == 'dibatalkan') : ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="<?= base_url() ?>/assets/img/icon-surat.png" class="avatar avatar-sm me-3" alt="xd">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"><?= $s->jenis ?></h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <?php
                                                    if ($s->status == 'antre') :
                                                    ?>
                                                        <span class="badge badge-sm bg-gradient-info"><?= $s->status; ?></span>
                                                    <?php
                                                    elseif ($s->status == 'siap') :
                                                    ?>
                                                        <span class="badge badge-sm bg-gradient-success"><?= $s->status; ?></span>
                                                    <?php
                                                    else :
                                                    ?>
                                                        <span class="badge badge-sm bg-gradient-danger"><?= $s->status; ?></span>
                                                    <?php
                                                    endif;
                                                    ?>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class=""><?= $s->tanggal_surat ?></span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <?php
                                                    if ($s->pesan !== '') :
                                                    ?>
                                                        <button class="badge bg-info border-0 position-relative" data-bs-toggle="modal" data-bs-target="#pesan_pembatalan_surat<?= $s->id ?>">
                                                            <i class="fas fa-envelope"></i>
                                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-info bg-white">
                                                                ✓
                                                                <span class="visually-hidden">unread messages</span>
                                                            </span>
                                                        </button>
                                                    <?php
                                                    else :
                                                    ?>
                                                        <button class="badge border border-1 border-secondary text-secondary" data-bs-toggle="modal" data-bs-target="#pesan_pembatalan_surat<?= $s->id ?>">
                                                            <i class="fas fa-envelope"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                    <!-- Modal pesan pembatalan surat -->
                                                    <div class="modal fade bd-example-modal-xl" id="pesan_pembatalan_surat<?= $s->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pesan_pembatalan_suratLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                            <form class="modal-content" method="post" action="/pesan-pembatalan">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="pesan_pembatalan_suratLabel">Pesan Terkait Pembatalan Surat</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="container-fluid">
                                                                        <input type="text" name="id_surat" value="<?= $s->id ?>" hidden>
                                                                        <div class="row">
                                                                            <div class="col-4" style="text-align: left;">
                                                                                <div class="mb-3">
                                                                                    <div class="flex align-items-center">
                                                                                        <label for="no_surat">No Surat :</label>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <?= $s->nomor_surat ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12" style="text-align: left;">
                                                                                <div class="mb-3">
                                                                                    <div class="text-left flex align-items-center">
                                                                                        <label for="pesan">Pesan</label>
                                                                                    </div>
                                                                                    <div class="">
                                                                                        <textarea type="text" name="pesan" id="pesan" class="form-control border-modal w-100 px-3"><?= $s->pesan ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-info">Kirim Pesan</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>





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