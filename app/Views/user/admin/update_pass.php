<?= $this->extend('templates/index'); ?>
<?= $this->Section('page-content'); ?>

<div class="container-fluid">
    <?php if (isset($validation)) { ?>
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
    <?php } ?>

    <form class="bg-gradient-white shadow-warning shadow-lg rounded-3 mb-4 mt-4" action="/update-password" method="post">
        <div class="modal-header">
            <h6 class="modal-title">Ubah Password</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <input type="text" name="id" id="id" value="<?= $id ?>" hidden>
                        <div class="col-12 text-start ">
                            <label for="password">Password</label>
                        </div>
                        <div class="col-12">
                            <input type="password" name="password" id="password" class="form-control border-modal w-100 px-3">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-12 text-start ">
                            <label for="pass_confirm">Konfirmasi Password</label>
                        </div>
                        <div class="col-12">
                            <input type="password" name="pass_confirm" id="pass_confirm" class="form-control border-modal w-100 px-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-warning" title="Ubah Password">
                <i class="fas fa-key"></i> Ubah Password
            </button>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>