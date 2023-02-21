<tr>
    <td class="align-middle">
        <div class="d-flex px-2 py-1">
            <div>
                <img src="<?= base_url() ?>/assets/img/<?= $row->img_user ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?= $row->username; ?></h6>
                <p class="text-xs text-secondary mb-0">ID : <?= $row->id; ?></p>
            </div>
        </div>
    </td>
    <td class="align-middle">
        <p class="text-xs font-weight-bold m-0">
            <?php if ($group[0]['name'] == 'admin') : ?>
                <span class="badge badge-sm bg-gradient-success">Admin</span>
            <?php elseif ($group[0]['name'] == 'petugas') : ?>
                <span class="badge badge-sm bg-gradient-info">Petugas</span>
            <?php elseif ($group[0]['name'] == 'user') : ?>
                <span class="badge badge-sm bg-gradient-secondary">Warga</span>
            <?php endif; ?>
        </p>

    </td>
    <td class="align-middle">
        <p class="text-xs font-weight-bold mb-0">
            <?= $row->email; ?>
        </p>
    </td>
    <td class="align-middle text-center">
        <!-- Button trigger modal detail user -->
        <button type="button" class="btn bg-dark text-white btn-circle btn-sm m-0" title="Detail User" data-bs-toggle="modal" data-bs-target="#editUserModal<?= $row->id ?>">
            <i class="fas fa-tasks"></i>
        </button>

        <!-- Modal detail + ubah user -->
        <div class="modal fade" id="editUserModal<?= $row->id ?>" tabindex="-1" aria-labelledby="editUserModalLabel<?= $row->id ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl ">
                <form action="/ubah-profil" method="post" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Ubah Profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <input type="hidden" name="id_user" value="<?= $row->id ?>">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class=" mb-3">
                                        <div class="col-12 text-start ">
                                            <label for="nik">NIK</label>
                                        </div>
                                        <div class="col-12">
                                            <input type="number" name="nik" id="nik" value="<?= $row->nik ?>" class="form-control border-modal w-100 px-3" required>
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <div class="col-12 text-start ">
                                            <label for="fullname">Nama Lengkap</label>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name="fullname" id="fullname" value="<?= $row->fullname ?>" class="form-control border-modal w-100 px-3" required>
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="col-12 text-start ">
                                                    <label for="tempat_lahir">Tempat lahir</label>
                                                </div>
                                                <div class="col-12">
                                                    <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?= $row->tempat_lahir ?>" class="form-control border-modal w-100 px-3" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="col-12 text-start ">
                                                    <label for="tgl_lahir">Tanggal lahir</label>
                                                </div>
                                                <div class="col-12">
                                                    <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $row->tgl_lahir ?>" class="form-control border-modal w-100 px-3" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class=" mb-3">
                                        <div class="col-12 text-start ">
                                            <label for="kk">KK</label>
                                        </div>
                                        <div class="col-12">
                                            <?php if ($row->kk !== '') : ?>
                                                <div id="portfolio">
                                                    <div class="portfolio-item">
                                                        <a href="<?= base_url() . "/uploads/kk/" . $row->kk; ?>" class="portfolio-popup">
                                                            <img src="<?= base_url() . "/uploads/kk/" . $row->kk; ?>" alt="your image" class="img-fluid" id="gambar">
                                                            <div class="portfolio-overlay">
                                                                <div class="portfolio-info">
                                                                    <div class="text-center">
                                                                        <i class="material-icons text-lg position-relative">visibility</i>
                                                                        <span class="ms-1">Lihat</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php else : ?>
                                                <div class="col-12">
                                                    <input readonly type="text" name="kk" id="kk" placeholder="Belum upload KK" class="form-control border-modal w-100 px-3" required>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class=" mb-3">
                                        <div class="col-12 text-start ">
                                            <label for="kewarganegaraan">Kewarganegaraan</label>
                                        </div>
                                        <div class="col-12">
                                            <select name="kewarganegaraan" id="kewarganegaraan" class="form-control form-select border-modal w-100 px-3" required>
                                                <option value="Indonesia" <?php if ($row->kewarganegaraan == 'Indonesia') {
                                                                                echo ("selected");
                                                                            } else {
                                                                                echo (" ");
                                                                            } ?>>Indonesia</option>
                                                <option value="Singapura" <?php if ($row->kewarganegaraan == 'Singapura') {
                                                                                echo ("selected");
                                                                            } else {
                                                                                echo (" ");
                                                                            } ?>>Singapura</option>
                                                <option value="Malaysia" <?php if ($row->kewarganegaraan == 'Malaysia') {
                                                                                echo ("selected");
                                                                            } else {
                                                                                echo (" ");
                                                                            } ?>>Malaysia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <div class="col-12 text-start ">
                                            <label for="agama">Agama</label>
                                        </div>
                                        <div class="col-12">
                                            <select name="agama" id="agama" class="form-control form-select border-modal w-100 px-3" required>
                                                <option value="Islam" <?php if ($row->agama == 'Islam') {
                                                                            echo ("selected");
                                                                        } else {
                                                                            echo (" ");
                                                                        } ?>>Islam</option>
                                                <option value="Katolik" <?php if ($row->agama == 'Katolik') {
                                                                            echo ("selected");
                                                                        } else {
                                                                            echo (" ");
                                                                        } ?>>Katolik</option>
                                                <option value="Hindu" <?php if ($row->agama == 'Hindu') {
                                                                            echo ("selected");
                                                                        } else {
                                                                            echo (" ");
                                                                        } ?>>Hindu</option>
                                                <option value="Kristen" <?php if ($row->agama == 'Kristen') {
                                                                            echo ("selected");
                                                                        } else {
                                                                            echo (" ");
                                                                        } ?>>Kristen</option>
                                                <option value="Budha" <?php if ($row->agama == 'Budha') {
                                                                            echo ("selected");
                                                                        } else {
                                                                            echo (" ");
                                                                        } ?>>Budha</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <div class="col-12 text-start ">
                                            <label for="pekerjaan">Pekerjaan</label>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" name="pekerjaan" id="pekerjaan" value="<?= $row->pekerjaan ?>" class="form-control border-modal w-100 px-3" required>
                                        </div>
                                    </div>
                                    <div class=" mb-3">
                                        <div class="col-12 text-start ">
                                            <label for="alamat">Alamat Tempat tinggal</label>
                                        </div>
                                        <div class="col-12">
                                            <textarea type="text" name="alamat" id="alamat" class="form-control border-modal w-100 px-3" required><?= $row->alamat ?></textarea>
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

    </td>
    <td class="align-middle text-center">
        <!-- Button trigger modal ubah group user -->
        <button type="button" class="badge border border-1 border-info badge-info text-info btn-change-group" data-id="<?= $row->id; ?>" title="Ubah Grup" data-bs-toggle="modal" data-bs-target="#changeGroupModal">
            <i class="fas fa-edit"></i>
        </button>

        <a href="<?= base_url() ?>/update-password/<?= $row->id; ?>" class="badge border border-1 border-warning badge-warning text-warning" title="Ubah Password">
            <i class="fas fa-key"></i>
        </a>


        <!-- Button trigger modal konfirmasi hapus user -->
        <button type="button" class="badge border border-1 border-danger badge-danger text-danger " title="Hapus User" data-bs-toggle="modal" data-bs-target="#hapusUserModal<?= $row->id ?>">
            <i class="fas fa-trash"></i>
        </button>
        <!-- Modal konfirmasi hapus user -->
        <div class="modal fade" id="hapusUserModal<?= $row->id ?>" tabindex="-1" aria-labelledby="hapusUserModalLabel<?= $row->id ?>" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusUserModalLabel<?= $row->id ?>">Konfirmasi Hapus User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah anda yakin ingin menghapus user <b><?= $row->username ?></b> ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="<?= base_url() ?>/hapus-user/<?= $row->id ?>" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </td>




</tr>