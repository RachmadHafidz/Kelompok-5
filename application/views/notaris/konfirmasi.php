<div class="container">


    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">

            </form>
        </div>
    </div>
    <div class="row-mt-3">
        <div class="col-md-6">
            <br>
            <?php if (empty($akta)) : ?>
                <div class="alert alert-danger" role="alert">
                    akta tidak ditemukan !
                </div>
            <?php endif; ?>

            <ul class="list-group">
                <?php foreach ($akta as $a) : ?>
                    <li class="list-group-item"><?= $a['nama'] ?>
                        <h6><strong><?= $a['keterangan']; ?></strong></h6>
                        <a href="<?= base_url(); ?>notaris/ubah/<?= $a['id_akta']; ?>" class="badge badge-success float-right"> Detail</a>
                        <br>
                        <a href="<?= base_url(); ?>notaris/bayar/<?= $a['id_akta']; ?>" class="badge badge-primary float-right"> Pembayaran</a>



                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!-- ini digunakan untuk view pada menu informasi -->