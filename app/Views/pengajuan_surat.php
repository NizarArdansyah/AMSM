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
            <!-- Button trigger modal pengajuan surat -->
            <button class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modal_buat_surat">
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
                                                <select name="jenis" autofocus class="form-control border-modal form-select px-3">
                                                    <option class="p-2" selected disabled>Pilih jenis surat</option>
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
                                                <input type="text" name="perihal" id="perihal" class="form-control border-modal w-100 px-3">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" mb-3">
                                            <div class="col-12 text-start">
                                                <label for="keperluan">Keperluan</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" name="keperluan" id="keperluan" class="form-control border-modal w-100 px-3">
                                            </div>
                                        </div>
                                        <div class=" mb-3">
                                            <div class="col-12 text-start">
                                                <label for="keterangan">Keterangan</label>
                                            </div>
                                            <div class="col-12">
                                                <textarea type="text" name="keterangan" id="keterangan" class="form-control border-modal w-100 px-3"></textarea>
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
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
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
                                            <!-- Button trigger modal detail surat permohonan -->
                                            <button class="badge bg-dark text-white border-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?= $srt->id ?>">
                                                Detail
                                            </button>
                                            <!-- Modal detail surat permohonan-->
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
                                                                                <input type="text" name="nomor_surat" id="nomor_surat" value="<?= $srt->nomor_surat ?>" class="form-control border-modal w-100 px-3" disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="jenis">Jenis Surat</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <select name="jenis" autofocus class="form-control border-modal form-select px-3">
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
                                                                                <input disabled type="text" name="tanggal" id="tanggal" value="<?= $srt->tanggal_surat ?>" class="form-control border-modal w-100 px-3">
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="pemohon">Pemohon</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <input disabled type="text" name="pemohon" id="pemohon" value="<?= $srt->pemohon ?>" class="form-control border-modal w-100 px-3">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="perihal">Perihal</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <input type="text" name="perihal" id="perihal" value="<?= $srt->perihal ?>" class="form-control border-modal w-100 px-3">
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="keperluan">Keperluan</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <input type="text" name="keperluan" id="keperluan" value="<?= $srt->keperluan ?>" class="form-control border-modal w-100 px-3">
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start">
                                                                                <label for="keterangan">Keterangan</label>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <textarea type="text" name="keterangan" id="keterangan" class="form-control border-modal w-100 px-3"><?= $srt->keterangan ?></textarea>
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
                                                            <p class="flex-wrap"><?= $srt->pesan; ?></p>
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