<tr>
    <td class="align-middle">
        <div class="d-flex px-2 py-1">
            <div>
                <img src="<?= base_url() ?>/assets/img/<?= $row->img_user ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h6 class="mb-0 text-sm"><?= $row->fullname; ?></h6>
                <p class="text-xs text-secondary mb-0"><?= $row->username ?> | <?= $row->id; ?></p>
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
    <td class="align-middle">
        <p class="text-xs font-weight-bold mb-0">
            <?= $row->nik; ?>
        </p>
    </td>
    <td class="align-middle text-center">
        <!-- Button trigger modal detail user -->
        <a href="/manajemen-user/<?= $row->id ?>" class="btn btn-icon bg-dark text-white btn-circle btn-sm m-0 btn-edit-user">
            <i class="fas fa-tasks"></i>
            </a>

        <?php if (!$row->kk) : ?>
            <button type="button" class="btn btn-icon bg-warning text-white btn-circle btn-sm m-0" title="Detail User" data-bs-toggle="modal" data-bs-target="#modalUploadKK<?= $row->id ?>">
                <small>KK</small>
            </button>

            <!-- Modal upload KK -->
            <div class="modal fade" id="modalUploadKK<?= $row->id ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalUploadKKLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <form method="post" action="<?= base_url(); ?>/upload-kk" enctype="multipart/form-data">
                            <?= csrf_field(); ?>
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalUploadKKLabel">Upload Kartu Keluarga</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid">
                                    <input type="hidden" name="id_user" value="<?= $row->id ?>">
                                    <div class="row">
                                        <div class="col-12 text-start ">
                                            <label for="kk">Pilih File</label>
                                            <input type="file" name="kk" id="kk" class="form-control border-modal w-100 px-3" required>
                                            <small>
                                                KK harus harus file berformat .jpg, .jpeg, .png, dan .pdf dengan maksimal ukuran 2 MB
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn border border-1 border-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" value="upload" class="btn btn-info">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif ?>
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
                        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <a href="<?= base_url() ?>/hapus-user/<?= $row->id ?>" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </div>
                </div>
            </div>
        </div>


    </td>




</tr>