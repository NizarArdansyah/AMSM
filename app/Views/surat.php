<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <title>
        <?= $surat->jenis . "-" . $surat->nomor_surat ?>
    </title>

    <style>
        @page {
            size: A4
        }

        html {
            font-family: Arial, Helvetica, sans-serif;
            color: #094471;
            text-align: justify;
        }

        .logo-kab {
            width: 70px;
            left: 0;
        }

        .judul_surat {
            text-decoration: underline;
            text-transform: uppercase;
        }

        #kop_surat {
            padding: 1em;
            margin-top: 1em;
            margin-bottom: 1em;
        }

        .paragraph {
            padding-bottom: 10px;
        }

        .ttd {
            margin-top: .5em;
            margin-right: 2.5em;
        }
        .sheet.padding-y-0mm {
            padding-top: 0mm !important;
            padding-bottom: 0mm !important;
        }
        .sheet.padding-x-15mm {
            padding-left: 15mm !important;
            padding-right: 15mm !important;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="A4" onload="window.print()">
    <section class="sheet padding-x-15mm padding-y-0mm">
        <?php
        ?>
        <div id="kop_surat" class="d-flex position-relative justify-content-center border-bottom border-3 border-dark">
            <div class="logo-kab position-absolute">
                <img src="https://rekreartive.com/wp-content/uploads/2019/03/Logo-Pekalongan-Kabupaten-Pekalongan-Hitam-Putih-750x923.jpg.webp"
                    class="" style="width: 100%;" alt="main_logo">
            </div>
            <div class="text-center">
                <h4>
                    PEMERINTAH KABUPATEN PEKALONGAN<br>KECAMATAN KESESI DESA PODOSARI
                </h4>
                <i>Jl. Raya Podosari No. 1 Podosari, Kesesi, Pekalongan 51162</i>
            </div>
        </div>
        <span>Kode Desa : 33260904</span>
        <div class="text-center mb-4 mt-3">
            <h4 class="judul_surat m-0">
                <?= $surat->jenis ?>
            </h4>
            <small>Nomor :
                <?= $surat->nomor_surat ?>
            </small>
        </div>
        <div class="isi_surat">
            <p class="paragraph mb-2">
                <span class="">
                    Yang bertanda tangan dibawah ini, menerangkan bahwa :
                </span>
            </p>
            <div class="row">
                <div class="col-12">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>Nama</th>
                                <th>:</th>
                                <td>
                                    <?= $data_pemohon[0]->fullname ?>
                                </td>
                            </tr>
                            <tr>
                                <th style="width:35%;">Tempat & Tanggal Lahir</th>
                                <th>:</th>
                                <td>
                                    <?= $data_pemohon[0]->tempat_lahir ?>,
                                    <?= $data_pemohon[0]->tgl_lahir ?>
                                </td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <th>:</th>
                                <td>
                                    <?= $data_pemohon[0]->nik ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Kewarganegaraan</th>
                                <th>:</th>
                                <td>
                                    <?= $data_pemohon[0]->kewarganegaraan ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Agama</th>
                                <th>:</th>
                                <td>
                                    <?= $data_pemohon[0]->agama ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Pekerjaan</th>
                                <th>:</th>
                                <td>
                                    <?= $data_pemohon[0]->pekerjaan ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Tempat Tinggal</th>
                                <th>:</th>
                                <td>
                                    <?= 
                                        $data_pemohon[0]->alamat . " Kecamatan " . ucfirst(strtolower($data_pemohon[0]->kecamatan)) . " Kabupaten " . ucfirst(strtolower($data_pemohon[0]->kabupaten)) . " Provinsi " . ucfirst(strtolower($data_pemohon[0]->provinsi))
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Keperluan</th>
                                <th>:</th>
                                <td style="text-align:justify;">
                                    <?= $surat->keperluan ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Keterangan</th>
                                <th>:</th>
                                <td style="text-align:justify;">
                                    <?= $surat->keterangan ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <span>Demikian surat keterangan ini kami buat untuk dapat dipergunakan sebagaimana mestinya.</span>
        </div>
        <div class="ttd d-flex flex-column align-items-end">
            <div class="text-center">
                <p>
                    <?= $tanggal ?><br>
                    Kepala Desa Podosari
                </p>

                <!-- Gambar tanda tangan -->
                <!-- <div class="position-relative" style="width: fit-content;">
                    <img src="<?= base_url() ?>/assets/img/ttd.png" alt="" srcset=""
                        style="width: 200px; top:-60px; z-index: 10;" class="position-absolute">
                </div> -->
                <!-- Nama Kepala Desa -->
                <p style="margin-top: 100px;"><strong>NURCAHYO</strong></p>
            </div>
        </div>
        </div>
</body>

</html>