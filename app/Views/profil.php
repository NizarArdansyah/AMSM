<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>
<div class="container-fluid py-4">
    <div class="row justify-content-between">
        <div class="col-auto">
            <?php if (session()->getFlashData('Berhasil')) : ?>
                <div class="alert alert-success alert-dismissible text-white" role="alert">
                    <span class="text-sm"><strong>Berhasil!</strong>, <?= session()->getFlashData('Berhasil') ?></span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif (session()->getFlashData('Gagal')) : ?>
                <div class="alert alert-danger alert-dismissible text-white" role="alert">
                    <span class="text-sm"><strong>Gagal!</strong>, <?= session()->getFlashData('Gagal') ?></span>
                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>
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
                            <?= $user->fullname ?>
                        </h5>
                        <p class="mb-0 font-weight-normal text-sm">
                            <?= $user->username ?> | <?= $user->email ?>
                        </p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                    <!-- Button trigger modal ubah profil -->
                    <div class="nav-wrapper position-relative end-0">
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link cursor-pointer mb-0 px-0 py-1 " data-bs-toggle="modal" data-bs-target="#modalUbahProfil">
                                    <i class="material-icons text-lg position-relative">settings</i>
                                    <span class="ms-1">Ubah Profile</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Modal ubah profil -->
                    <div class="modal fade" id="modalUbahProfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalUbahProfilLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <form action="/ubah-profil" method="post" class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalUbahProfilLabel">Lengkapi Profil</h5>
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
                                                        <input type="number" name="nik" id="nik" value="<?= $user->nik ?>" class="form-control border-modal w-100 px-3" required>
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="fullname">Nama Lengkap</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" name="fullname" id="fullname" value="<?= $user->fullname ?>" class="form-control border-modal w-100 px-3" required>
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="col-12 text-start ">
                                                                <label for="tempat_lahir">Tempat lahir</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" name="tempat_lahir" id="tempat_lahir" value="<?= $user->tempat_lahir ?>" class="form-control border-modal w-100 px-3" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="col-12 text-start ">
                                                                <label for="tgl_lahir">Tanggal lahir</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="date" name="tgl_lahir" id="tgl_lahir" value="<?= $user->tgl_lahir ?>" class="form-control border-modal w-100 px-3" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class=" mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="agama">Agama</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <select name="agama" id="agama" class="form-control form-select border-modal w-100 px-3" required>
                                                            <option value="Islam" <?= $user->agama == 'Islam' ?  "selected" : "" ?>>Islam</option>
                                                            <option value="Katolik" <?= $user->agama == 'Katolik' ?  "selected" : "" ?>>Katolik</option>
                                                            <option value="Hindu" <?= $user->agama == 'Hindu' ?  "selected" : "" ?>>Hindu</option>
                                                            <option value="Kristen" <?= $user->agama == 'Kristen' ?  "selected" : "" ?>>Kristen</option>
                                                            <option value="Budha" <?= $user->agama == 'Budha' ?  "selected" : "" ?>>Budha</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class=" mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="pekerjaan">Pekerjaan</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <select name="pekerjaan" id="pekerjaan" class="form-control form-select border-modal w-100 px-3" required>
                                                            <option value="Belum/ Tidak Bekerja" <?= $user->pekerjaan == 'Belum/ Tidak Bekerja' ? "selected" : "" ?>>Belum/ Tidak Bekerja</option>
                                                            <option value="Mengurus Rumah Tangga" <?= $user->pekerjaan == 'Mengurus Rumah Tangga' ? "selected" : "" ?>>Mengurus Rumah Tangga</option>
                                                            <option value="Pelajar/ Mahasiswa" <?= $user->pekerjaan == 'Pelajar/ Mahasiswa' ? "selected" : "" ?>>Pelajar/ Mahasiswa</option>
                                                            <option value="Pensiunan" <?= $user->pekerjaan == 'Pensiunan' ? "selected" : "" ?>>Pensiunan</option>
                                                            <option value="Pewagai Negeri Sipil" <?= $user->pekerjaan == 'Pewagai Negeri Sipil' ? "selected" : "" ?>>Pewagai Negeri Sipil</option>
                                                            <option value="Tentara Nasional Indonesia" <?= $user->pekerjaan == 'Tentara Nasional Indonesia' ? "selected" : "" ?>>Tentara Nasional Indonesia</option>
                                                            <option value="Kepolisisan RI" <?= $user->pekerjaan == 'Kepolisisan RI' ? "selected" : "" ?>>Kepolisisan RI</option>
                                                            <option value="Perdagangan" <?= $user->pekerjaan == 'Perdagangan' ? "selected" : "" ?>>Perdagangan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="kewarganegaraan">Kewarganegaraan</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" name="kewarganegaraan" id="kewarganegaraan" class="form-control border-modal px-3 w-100" value="<?= $user->kewarganegaraan ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <div class="row">
                                                    <div class="col-12 text-start ">
                                                        <label for="propinsi">Provinsi, Kota/Kabupaten, Kecamatan</label>
                                                    </div>

                                                    <div class="col-12 col-md-12 mb-3">
                                                        <select name="propinsi" id="propinsi" class="form-control form-select border-modal w-100 px-3" required></select>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <select name="kota" id="kota" class="form-control form-select border-modal w-100 px-3" required>
                                                            <?php if ($user->kabupaten) : ?>
                                                                <option value="<?= $user->kabupaten ?>"><?= $user->kabupaten ?></option>
                                                            <?php endif ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <select name="kecamatan" id="kecamatan" class="form-control form-select border-modal w-100 px-3" required>
                                                            <?php if ($user->kecamatan) : ?>
                                                                <option value="<?= $user->kecamatan ?>"><?= $user->kecamatan ?></option>
                                                            <?php endif ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <select name="kelurahan" id="kelurahan" class="form-control form-select border-modal w-100 px-3" required>
                                                            <?php if ($user->kelurahan) : ?>
                                                                <option value="<?= $user->kelurahan ?>"><?= $user->kelurahan ?></option>
                                                            <?php endif ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class=" mb-3">
                                                    <div class="col-12 text-start ">
                                                        <label for="alamat">Detail Alamat</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <textarea type="text" name="alamat" id="alamat" class="form-control border-modal w-100 px-3" required><?= $user->alamat ?></textarea>
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

                                <input type="hidden" name="real_provinsi" id="real_provinsi">
                                <input type="hidden" name="real_kota" id="real_kota">
                                <input type="hidden" name="real_kecamatan" id="real_kecamatan">
                                <input type="hidden" name="real_kelurahan" id="real_kelurahan">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-12">
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
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                        <div class="row">
                                            <div class="col-xl-4 d-flex flex-column justify-content-center">
                                                <strong class="text-dark">Kartu Keluarga</strong>
                                            </div>
                                            <div class="col-xl-8">
                                                <?php if ($user->kk != '' || $user->kk != null) : ?>
                                                    <div id="portfolio">
                                                        <div class="portfolio-item">
                                                            <a href="<?= base_url() . "/uploads/kk/" . $user->kk; ?>" class="portfolio-popup">
                                                                <img src="<?= base_url() . "/uploads/kk/" . $user->kk; ?>" alt="your image" class="img-fluid" id="gambar">
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
                                                <?php endif; ?>
                                                <!-- Button trigger modal upload KK -->
                                                <div class="nav-wrapper w-xl-45">
                                                    <ul class="nav nav-pills nav-fill p-1 bg-secondary text-white" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link cursor-pointer mb-0 px-0 py-1 text-white" data-bs-toggle="modal" data-bs-target="#modalUploadKK">
                                                                <i class="material-icons text-lg position-relative">upload_file</i>
                                                                <span class="ms-1">Upload</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Modal upload KK -->
                                                <div class="modal fade" id="modalUploadKK" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalUploadKKLabel" aria-hidden="true">
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
                                                                        <input type="hidden" name="id_user" value="<?= $user->id ?>">
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
                                                <?= $user->tgl_lahir ?>
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

<?= $this->section('bsc'); ?>
<script>
    var selectedProvinsi = "<?= $user->provinsi; ?>"
    $(document).ready(function() {
        getProvinsi();

        $('#propinsi').on('click', function() {
            var id = $(this).val();
            getKota(id);
        });

        // propinsi on change
        $('#propinsi').on('change', function() {
            var id = $(this).val();
            getKota(id);

            var prop = $(this).find(':selected').text();
            $('#real_provinsi').val(prop);
        });

        // kota on change
        $('#kota').on('change', function() {
            var id = $(this).val();
            getKecamatan(id);

            // real kota
            var kota = $(this).find(':selected').text();
            $('#real_kota').val(kota);
        });

        // kecamatan on change
        $('#kecamatan').on('change', function() {
            var id = $(this).val();
            getKelurahan(id);

            // real kecamatan
            var kecamatan = $(this).find(':selected').text();
            $('#real_kecamatan').val(kecamatan);
        });

        // kelurahan on change
        $('#kelurahan').on('change', function() {
            // real kelurahan
            var kelurahan = $(this).find(':selected').text();
            $('#real_kelurahan').val(kelurahan);
        });
    });

    function getProvinsi() {
        $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', function(data) {
            $('#propinsi').empty();
            $('#propinsi').append('<option value="">Pilih Propinsi</option>');
            $.each(data, function(key, val) {
                if (val.name.toLowerCase() == selectedProvinsi.toLowerCase()) {
                    $('#propinsi').append('<option value="' + val.id + '" selected>' + val.name + '</option>');
                } else {
                    $('#propinsi').append('<option value="' + val.id + '">' + val.name + '</option>');
                }
            });
        });
    }

    function getKota(pid) {
        $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/regencies/' + pid + '.json', function(data) {
            $('#kota').empty();
            $('#kota').append('<option value="">Pilih Kota / Kabupaten</option>');
            $.each(data, function(key, val) {
                $('#kota').append('<option value="' + val.id + '">' + val.name + '</option>');
            });
        });
    }

    function getKecamatan(kid) {
        $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/districts/' + kid + '.json', function(data) {
            $('#kecamatan').empty();
            $('#kecamatan').append('<option value="">Pilih Kecamatan</option>');
            $.each(data, function(key, val) {
                $('#kecamatan').append('<option value="' + val.id + '">' + val.name + '</option>');
            });
        });
    }

    function getKelurahan(kecid) {
        $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/villages/' + kecid + '.json', function(data) {
            $('#kelurahan').empty();
            $('#kelurahan').append('<option value="">Pilih Kelurahan</option>');
            $.each(data, function(key, val) {
                $('#kelurahan').append('<option value="' + val.id + '">' + val.name + '</option>');
            });
        });
    }
</script>
<?= $this->endSection(); ?>