<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <div class="row mt-3">

        <div class="col-md-6">
            <a href="<?= base_url() ?>notaris/add" class="btn btn-primary">Tambah/ubah layanan</a>
        </div>
    </div>
    <hr>




    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">

            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5><strong> Hari Layanan</strong></h5>
                    <p class="card-title"><?= $notaris['hari']; ?></p>
                    <h5><strong> Jam Layanan</strong></h5>
                    <p class="card-title"><?= $notaris['jam']; ?></p>
                    <h5><strong> Alamat Kantor</strong></h5>
                    <p class="card-text"><?= $notaris['alamat']; ?></p>
                    <h5><strong> Biaya Buat Akta</strong></h5>
                    <p class="card-text"><?= $notaris['buat_akta']; ?></p>




                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->