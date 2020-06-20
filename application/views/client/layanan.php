<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Layanan
                </div>
                <div class="card-body">
                    <h4>
                        <strong>
                            <center><?= $notaris['nama']; ?></center>
                        </strong>
                    </h4>
                    <h5><strong> Hari Layanan</strong></h5>
                    <p class="card-title"><?= $notaris['hari']; ?></p>
                    <h5><strong> Jam Layanan</strong></h5>
                    <p class="card-title"><?= $notaris['jam']; ?></p>
                    <h5><strong> Alamat Kantor</strong></h5>
                    <p class="card-text"><?= $notaris['alamat']; ?></p>
                    <h5><strong> Biaya Buat Akta</strong></h5>
                    <p class="card-text"><?= $notaris['buat_akta']; ?></p>



                    <a href="<?= base_url() ?>client/info" class="btn btn-primary">Kembali</a>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- digunakan untuk view dari tampilan detail data-->