<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">Data
                berhasil <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    <?php endif; ?>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/img/profile/') . $client['foto']; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $client['nama']; ?></h5>
                    <p class="card-text"><?= $client['email']; ?></p>
                    <p class="card-text"><small class="text-muted">Registered since <?= date('d F Y', $client['daftar']); ?></small></p>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->