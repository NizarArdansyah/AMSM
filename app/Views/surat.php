<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>
    <style>
        html {
            font-family: Arial, Helvetica, sans-serif;
            color: #094471;
        }

        .logo-kab {
            width: 100px;
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
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        ?>
        <div id="kop_surat" class="d-flex position-relative justify-content-center border-bottom border-4 border-dark">
            <div class="logo-kab align-self-start position-absolute">
                <img src="https://rekreartive.com/wp-content/uploads/2019/03/Logo-Pekalongan-Kabupaten-Pekalongan-Hitam-Putih-750x923.jpg.webp" class="" style="width: 100%;" alt="main_logo">
            </div>
            <div class="text-center">
                <H2>
                    PEMERINTAH KABUPATEN PEKALONGAN<br>KECAMATAN KESESI<br>DESA PODOSARI
                </H2>
                <i>Jl. Raya Podosari No. 1 Podosari, Kesesi, Pekalongan 51162</i>
            </div>
        </div>
        <span>Kode Desa : 33260904</span>
        <div class="text-center">
            <h4 class="judul_surat m-0"><?= $surat->jenis ?></h4>
            <small>Nomor : <?= $surat->nomor_surat ?></small>
        </div>
        <div class="isi_surat">
            <span class="p-5 paragraph">
                Yang bertanda tangan dibawah ini, menerangkan bahwa :
            </span>
            <div class="row">
                <div class="col-3">
                    <ol class="number">
                        <li>Nama</li>
                        <li>Tempat & Tanggal Lahir</li>
                        <li>Kewarganegaraan & Agama</li>
                        <li>Pekerjaan</li>
                        <li>Tempat Tinggal</li><br>
                        <li>Surat bukti diri</li>
                        <li>Keperluan</li>
                        <li>Keterangan</li>
                    </ol>
                </div>
                <div class="col">
                    <ul class="list-unstyled">
                        <li>: <?= $surat->pemohon ?></li>
                        <li>: TTL</li>
                        <li>: WNI</li>
                        <li>: Pekerjaan</li>
                        <li>: Alamat</li>
                        <li>: </li>
                        <li>: Buti diri</li>
                        <li>: <?= $surat->keperluan ?></li>
                        <li>: <?= $surat->keterangan ?></li>
                    </ul>
                </div>
            </div>
            <span>Demikian surat keterangan ini kami buat untuk dapat dipergunakan sebagaimana mestinya.</span>
        </div>
        <div class="d-flex flex-column align-items-end mt-4">
            <div class="text-center">
                <p><?= $tanggal ?></p>
                <p>Kepala Desa Podosari</p>
                <div class="position-relative" style="width: fit-content;">
                    <img src="<?= base_url() ?>/assets/img/ttd.png" alt="" srcset="" style="width: 200px; top:-60px; z-index: 10;" class="position-absolute">
                </div>
                <p style="margin-top: 100px;"><strong>NURCAHYO</strong></p>
            </div>
        </div>
    </div>
</body>

</html>