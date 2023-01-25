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
                                                    <img src="../assets/img/icon-surat.png" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $srt->jenis; ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $srt->nomor_surat; ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $srt->pemohon; ?></p>
                                            <!-- <p class="text-xs text-secondary mb-0">Organization</p> -->
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
                                            <!-- Button trigger modal detail surat -->
                                            <button type="" class="btn btn-sm m-0 bg-dark text-white border-0 mr-2" data-bs-toggle="modal" data-bs-target="#detail_surat<?= $srt->id ?>">
                                                <i class="fas fa-tasks"></i>
                                            </button>
                                            <!-- Modal detail surat -->
                                            <div class="modal fade bd-example-modal-xl" id="detail_surat<?= $srt->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="detail_suratLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                    <form class="modal-content" method="post" action="/update-surat">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="detail_suratLabel">Detail Surat Pemohonan</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <input type="hidden" name="id_surat" value="<?= $srt->id ?>">
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start ">
                                                                                <label for="nomor_surat">No Surat</label>
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <input type="text" name="nomor_surat" id="nomor_surat" value="<?= $srt->nomor_surat ?>" class="form-control border-modal w-100 px-3" disabled required>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start ">
                                                                                <label for="jenis">Jenis Surat</label>
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <input type="text" name="jenis" id="jenis" value="<?= $srt->jenis ?>" class="form-control border-modal w-100 px-3" autofocus required>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start ">
                                                                                <label for="tanggal">tanggal</label>
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <input type="text" name="tanggal" id="tanggal" value="<?= $srt->tanggal_surat ?>" class="form-control border-modal w-100 px-3" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start ">
                                                                                <label for="pemohon">Pemohon</label>
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <input type="text" name="pemohon" id="pemohon" value="<?= $srt->pemohon ?>" class="form-control border-modal w-100 px-3" required>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start ">
                                                                                <label for="perihal">Perihal</label>
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <input type="text" name="perihal" id="perihal" value="<?= $srt->perihal ?>" class="form-control border-modal w-100 px-3" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start ">
                                                                                <label for="keperluan">Keperluan</label>
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <input type="text" name="keperluan" id="keperluan" value="<?= $srt->keperluan ?>" class="form-control border-modal w-100 px-3" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start ">
                                                                                <label for="status">Status</label>
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <select class="form-select border-modal w-100 px-3" name="status" id="status" required>
                                                                                    <option value="siap" <?php if ($srt->status == 'siap') {
                                                                                                                echo ('selected');
                                                                                                            } ?>>Siap</option>
                                                                                    <option value="antre" <?php if ($srt->status == 'antre') {
                                                                                                                echo ('selected');
                                                                                                            } ?>>Belum Siap</option>
                                                                                    <option value="dibatalkan" <?php if ($srt->status == 'dibatalkan') {
                                                                                                                    echo ('selected');
                                                                                                                } ?>>Dibatalkan</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" mb-3">
                                                                            <div class="col-12 text-start ">
                                                                                <label for="keterangan">Keterangan</label>
                                                                            </div>
                                                                            <div class="col-10">
                                                                                <textarea type="text" name="keterangan" id="keterangan" class="form-control border-modal w-100 px-3" required><?= $srt->keterangan ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-info">
                                                                <i class="fas fa-edit"></i>
                                                                Edit Surat
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center">

                                            <?php
                                            if ($srt->status == 'dibatalkan') :
                                            ?>
                                                <?php
                                                if ($srt->pesan == null) :

                                                ?>
                                                    <button class="badge border border-1 border-secondary text-secondary" data-bs-toggle="modal" data-bs-target="#pesan_pembatalan_surat<?= $srt->id ?>">
                                                        <i class="fas fa-envelope"></i>
                                                    </button>

                                                <?php else : ?>
                                                    <button class="badge bg-info border-0 position-relative" data-bs-toggle="modal" data-bs-target="#pesan_pembatalan_surat<?= $srt->id ?>">
                                                        <i class="fas fa-envelope"></i>
                                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-info bg-white">
                                                            ✓
                                                            <span class="visually-hidden">unread messages</span>
                                                        </span>
                                                    </button>
                                                <?php endif; ?>

                                            <?php else : ?>
                                                <a href="<?= base_url('cetak-surat') . "/" . $srt->id ?>" class="badge border border-1 border-info m-0 text-info" target="_blank"><i class="fas fa-print"></i></a>
                                            <?php
                                            endif;
                                            ?>
                                            <!-- Button trigger modal hapus surat -->
                                            <button type="button" class="badge border border-1 border-danger badge-danger text-danger" title="Hapus surat" data-bs-toggle="modal" data-bs-target="#hapusSuratModal<?= $srt->id ?>">
                                                <i class="fas fa-trash"></i>
                                            </button>

                                            <!-- Modal hapus surat -->
                                            <div class="modal fade" id="hapusSuratModal<?= $srt->id ?>" tabindex="-1" aria-labelledby="hapusSuratModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="hapusSuratModalLabel">Modal title</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <span>
                                                                Apakah anda yakin ingin menghapus <br> <b><?= $srt->jenis ?></b> milik <b><?= $srt->pemohon ?></b> ?
                                                            </span>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="<?= base_url() ?>/hapus-surat/<?= $srt->id ?>" class="btn btn-danger">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal pesan pembatalan surat -->
                                            <div class="modal fade bd-example-modal-xl" id="pesan_pembatalan_surat<?= $srt->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pesan_pembatalan_suratLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                    <form class="modal-content" method="post" action="/pesan-pembatalan">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="pesan_pembatalan_suratLabel">Pesan Terkait Pembatalan Surat</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="container-fluid">
                                                                <input type="text" name="id_surat" value="<?= $srt->id ?>" hidden>
                                                                <div class="row">
                                                                    <div class="col-4" style="text-align: left;">
                                                                        <div class="mb-3">
                                                                            <div class="flex align-items-center">
                                                                                <label for="no_surat">No Surat :</label>
                                                                            </div>
                                                                            <div class="">
                                                                                <?= $srt->nomor_surat ?>
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
                                                                                <textarea type="text" name="pesan" id="pesan" class="form-control border-modal w-100 px-3"><?= $srt->pesan ?></textarea>
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