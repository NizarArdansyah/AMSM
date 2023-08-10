<?= $this->extend('templates/index'); ?>
<?= $this->Section('page-content'); ?>
<div class="container-fluid">
    <div class="card">
        <form action="/ubah-profil" method="post">
            <div class="card-header">
                <h5 class="card-title" id="staticBackdropLabel">Ubah Profil</h5>
            </div>
            <div class="card-body">
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
                                <label for="kewarganegaraan">Kewarganegaraan</label>
                                <input type="text" name="kewarganegaraan" id="kewarganegaraan" value="<?= $user->kewarganegaraan ?>" class="form-control border-modal w-100 px-3">
                            </div>
                        </div>
                        <div class=" mb-3">
                            <div class="col-12 text-start ">
                                <label for="agama">Agama</label>
                            </div>
                            <div class="col-12">
                                <select name="agama" id="agama" class="form-control form-select border-modal w-100 px-3" required>
                                    <option value="Islam" <?= ($user->agama == 'Islam') ? ("selected") : "" ?>>Islam</option>
                                    <option value="Katolik" <?= ($user->agama == 'Katolik') ? ("selected") : "" ?>>Katolik</option>
                                    <option value="Hindu" <?= ($user->agama == 'Hindu') ? ("selected") : "" ?>>Hindu</option>
                                    <option value="Kristen" <?= ($user->agama == 'Kristen') ? ("selected") : "" ?>>Kristen</option>
                                    <option value="Budha" <?= ($user->agama == 'Budha') ? ("selected") : "" ?>>Budha</option>
                                </select>
                            </div>
                        </div>
                        <div class=" mb-3">
                            <div class="col-12 text-start ">
                                <label for="pekerjaan">Pekerjaan</label>
                                <input type="text" name="pekerjaan" id="pekerjaan" value="<?= $user->pekerjaan ?>" class="form-control border-modal w-100 px-3" required>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <div class="col-12 text-start ">
                            <label for="kk">KK</label>
                        </div>
                        <div class="col-12">
                            <?php if ($user->kk) : ?>
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
                            <?php else : ?>
                                <div class="col-12">
                                    <div class="alert alert-warning">
                                        Belum Upload KK
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-12 text-start ">
                                <label for="propinsi">Provinsi, Kota/Kabupaten, Kecamatan</label>
                            </div>

                            <div class="col-12 col-md-12 mb-3">
                                <select name="propinsi" id="propinsi" class="form-control form-select border-modal w-100 px-3" required>
                                    <?php if ($user->provinsi) : ?>
                                        <option value="<?= $user->provinsi ?>"><?= $user->provinsi ?></option>
                                    <?php endif ?>
                                </select>
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
            <div class="card-footer w-full d-flex justify-content-end gap-3">
                <button type="button" class="btn btn-sm border border-1 border-secondary btn-closeku">Close</button>
                <button type="submit" class="btn btn-sm btn-info">Kirim</button>
            </div>

            <input type="hidden" name="real_provinsi" id="real_provinsi">
            <input type="hidden" name="real_kota" id="real_kota">
            <input type="hidden" name="real_kecamatan" id="real_kecamatan">
            <input type="hidden" name="real_kelurahan" id="real_kelurahan">
        </form>
    </div>
</div>
<?= $this->endSection(); ?>

<?= $this->section('bsc'); ?>
<script>
    var selectedProvinsi = "<?= $user->provinsi; ?>"

    $('.btn-closeku').on('click', function() {
        window.history.back();
    });

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