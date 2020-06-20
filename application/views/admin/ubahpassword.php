<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">Password
                berhasil <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('flash1')) : ?>
        <div class="row mt-3">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">Password
                <?= $this->session->flashdata('flash1'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-8">

            <form action="<?= base_url('admin/ubahpassword'); ?>" method="post">
                <div class="form-group">
                    <label for="current_password">Password</label>
                    <input type="password" class="form-control" name="current_password" id="current_password">
                    <?= form_error('current_password', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="new_password">Password Baru</label>
                    <input type="password" class="form-control" name="new_password" id="new_password">
                    <?= form_error('new_password', ' <small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Ubah Password</button>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->