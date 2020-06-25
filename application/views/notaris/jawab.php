<div class="container">


    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari " name="keyword">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row-mt-3">
        <div class="col-md-6">
            <h3>DAFTAR PERTANYAAN</h3>
            <?php if (empty($tanya)) : ?>
                <div class="alert alert-danger" role="alert">
                    akta tidak ditemukan !
                </div>
            <?php endif; ?>

            <ul class="list-group">
                <?php foreach ($tanya as $t) : ?>
                    <li class="list-group-item"><?= $t['nama'] ?>
                        <h6><strong><?= $t['keterangan']; ?></strong></h6>
                        <br>
                        <a href="<?= base_url(); ?>notaris/balas/<?= $t['id_tanya']; ?>" class="badge badge-info float-right"> Jawab</a>
                        <br>


                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!-- ini digunakan untuk view pada menu informasi -->