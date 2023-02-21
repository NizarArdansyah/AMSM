<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>

<div class="container-fluid py-4">
    <div class="row justify-content-between">
        <?php
        if (isset($validation)) {
            $erros = $validation->getErrors();
            $erros = array_values($erros);
            $erros = $erros[0];
            echo $erros;
        }
        // dd($erros->getErrors());
        ?>
        <!-- <?php if (isset($validation)) { ?>
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
        <?php } ?> -->
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

            <?php if (!$profil_lengkap) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <span class="alert-icon text-white"><i class="fas fa-exclamation-triangle"></i></span>
                    <span class="alert-text text-white">Anda belum melengkapi profil, silahkan lengkapi profil anda <a href="<?= base_url('profil') ?>" class="text-white font-weight-bold text-decoration-underline">disini</a></span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>


        <div class="col-auto">
            <!-- Button trigger modal pengajuan surat -->
            <button class="btn btn-outline-info" <?= !$profil_lengkap ? 'disabled' : '' ?> data-bs-toggle="modal" data-bs-target="#modal_buat_surat">
                Buat Baru
                <i class="material-icons opacity-10">add</i>
            </button>

            <!-- Modal pengajuan surat -->
            <div class="modal fade bd-example-modal-xl" id="modal_buat_surat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                    <form class="modal-content" method="post" action="/pengajuan-surat">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Buat Surat Pemohonan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class=" mb-3">
                                            <div class="col-12 text-start">
                                                <label for="jenis">Jenis Surat</label>
                                            </div>
                                            <div class="col-12">
                                                <select name="jenis" autofocus required class="form-control border-modal form-select px-3">
                                                    <option class="p-2" disabled>Pilih jenis surat</option>
                                                    <option class="p-2" value="Surat Keterangan">Surat Keterangan</option>
                                                    <option class="p-2" value="Surat Keterangan Usaha">Surat Keterangan Usaha</option>
                                                    <option class="p-2" value="Surat Keterangan Tidak Mampu">Surat Keterangan Tidak Mampu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <div class="col-12 text-start">
                                                <label for="perihal">Perihal</label>
                                            </div>
                                            <div class="col-12">
                                                <select name="perihal" id="perihal" required class="form-control border-modal form-select px-3">
                                                    <option class="p-2" disabled>Pilih perihal</option>
                                                    <option class="p-2" value="Permohonan">Permohonan</option>
                                                    <option class="p-2" value="Pengajuan">Pengajuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" mb-3">
                                            <div class="col-12 text-start">
                                                <label for="keperluan">Keperluan</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="keperluan" id="keperluan" required class="form-control border-modal w-100 px-3">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <div class="col-12 text-start">
                                                <label for="keterangan">Keterangan</label>
                                            </div>
                                            <div class="col-12">
                                                <textarea type="text" name="keterangan" id="keterangan" required class="form-control border-modal w-100 px-3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">Buat Surat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Daftar Pemohonan Surat</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Pemohon</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Permohonan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Detail Surat</th>
                                    <?php if (in_groups('user')) : ?>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pesan</th>
                                    <?php else : ?>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($surat as $srt) :
                                ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="<?= base_url() ?>/assets/img/icon-surat.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $srt->jenis; ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $srt->nomor_surat; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $srt->pemohon; ?></p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <?php
                                            if ($srt->status == 'antre') :
                                            ?>
                                                <span class="badge badge-sm bg-gradient-info"><?= $srt->status; ?></span>
                                            <?php
                                            elseif ($srt->status == 'siap') :
                                            ?>
                                                <span class="badge badge-sm bg-gradient-success"><?= $srt->status; ?></span>
                                            <?php
                                            else :
                                            ?>
                                                <span class="badge badge-sm bg-gradient-danger"><?= $srt->status; ?></span>
                                            <?php
                                            endif;
                                            ?>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $srt->tanggal_surat; ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <!-- Button trigger modal detail surat  -->
                                            <button class="badge bg-dark text-white border-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $srt->id ?>">
                                                Detail
                                            </button>
                                            <!-- Modal detail surat -->
                                            <div class="modal fade bd-example-modal-xl" id="staticBackdrop<?= $srt->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                    <form class="modal-content" method="post" action="/update-pengajuan-surat">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Detail Surat Pemohonan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="hidden" name="id_surat" value="<?= $srt->id ?>">
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="nomor_surat">No Surat</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <input type="text" name="nomor_surat" id="nomor_surat" readonly value="<?= $srt->nomor_surat ?>" class="form-control border-modal w-100 px-3" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="jenis">Jenis Surat</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <select name="jenis" autofocus class="form-control border-modal form-select px-3" required>
                                                                                    <option class="p-2" disabled>Pilih jenis surat</option>
                                                                                    <option class="p-2" value="Surat Keterangan" <?php if ($srt->jenis == 'Surat Keterangan') {
                                                                                                                                        echo ("selected");
                                                                                                                                    }  ?>>Surat Keterangan</option>
                                                                                    <option class="p-2" value="Surat Keterangan Usaha" <?php if ($srt->jenis == 'Surat Keterangan Usaha') {
                                                                                                                                            echo 'selected';
                                                                                                                                        } ?>>Surat Keterangan Usaha</option>
                                                                                    <option class="p-2" value="Surat Keterangan Tidak Mampu" <?php if ($srt->jenis == 'Surat Keterangan Tidak Mampu') {
                                                                                                                                                    echo 'selected';
                                                                                                                                                } ?>>Surat Keterangan Tidak Mampu</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="tanggal">tanggal</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <input disabled type="text" name="tanggal" id="tanggal" value="<?= $srt->tanggal_surat ?>" class="form-control border-modal w-100 px-3" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="pemohon">Pemohon</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <input disabled type="text" name="pemohon" id="pemohon" value="<?= $srt->pemohon ?>" class="form-control border-modal w-100 px-3" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="perihal">Perihal</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <input type="text" name="perihal" id="perihal" value="<?= $srt->perihal ?>" class="form-control border-modal w-100 px-3" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="keperluan">Keperluan</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <input type="text" name="keperluan" id="keperluan" value="<?= $srt->keperluan ?>" class="form-control border-modal w-100 px-3" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="keterangan">Keterangan</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <textarea type="text" name="keterangan" id="keterangan" class="form-control border-modal w-100 px-3" required><?= $srt->keterangan ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-info">Edit Surat</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">
                                            <?php
                                            if ($srt->pesan !== '') :
                                            ?>
                                                <button class="badge bg-info text-white border-0 position-relative" data-bs-toggle="modal" data-bs-target="#pesan_pembatalan_surat<?= $srt->id ?>">
                                                    <i class="fas fa-envelope"></i>
                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        1
                                                        <span class="visually-hidden">unread messages</span>
                                                    </span>
                                                </button>
                                            <?php
                                            else :
                                            ?>
                                                <button disabled class="badge border border-1 border-secondary text-secondary border-0">
                                                    <i class="fas fa-envelope"></i>
                                                </button>
                                            <?php endif; ?>
                                            <!-- Modal pesan pembatalan surat -->
                                            <div class="modal fade bd-example-modal-xl" id="pesan_pembatalan_surat<?= $srt->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pesan_pembatalan_suratLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                    <form class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="pesan_pembatalan_suratLabel">Pesan Terkait Pembatalan Surat</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" style="text-align: start;">
                                                            <div class="d-flex w-100 gap-4 align-items-center">
                                                                <div class="w-5 p-1 bg-outline-dark shadow-card rounded-3" title="Petugas">
                                                                    <img src="<?= base_url() ?>/assets/img/default.svg" class="rounded-circle w-100" alt="" srcset="">
                                                                </div>
                                                                <p class="m-0"><?= $srt->pesan; ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                <?php
                                endforeach
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer pt-4 ">
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