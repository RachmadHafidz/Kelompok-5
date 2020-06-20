<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Notaris
                </div>
                <div class="card-body">

                    <h5 class="card-title"><?= $notaris['nama']; ?></h5>
                    <h6 class="card-title"><?= $notaris['no_sk']; ?></h6>
                    <p class="card-text"><?= $notaris['telepon']; ?></p>


                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $notaris['foto']; ?>" alt="image" height="150" width="150"></p>
                    <a href="<?= base_url() ?>client/info" class="btn btn-primary">Kembali</a>



                </div>
            </div>
        </div>
    </div>
</div>
<!-- digunakan untuk view dari tampilan detail data-->