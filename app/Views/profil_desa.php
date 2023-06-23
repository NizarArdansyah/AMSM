<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>
<div class="container-fluid py-4">
    <div class="container-fluid px-2 px-md-4">

    </div>
    <footer class="footer pt-4  ">
        <div class="container-fluid">
            <div class="d-flex flex-row gap-4 align-items-center">
                <img src="<?= base_url() ?>/assets/img/logo_pekalongan.png" class="w-5 w-md-5" alt="main_logo">
                <div class="">
                    <h2>
                        SUSUNAN ORGANISASI DAN TATA KERJA PEMERINTAH DESA
                    </h2>
                    <h2>
                        DESA PODOSARI
                    </h2>
                </div>
            </div>
            <div class="my-5">
                <img src="<?= base_url() ?>/assets/img/struktur-organisasi.png" class="w-100" alt="main_logo">
            </div>
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