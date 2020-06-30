<div class="container">


    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">

            </form>
        </div>
    </div>
    <div class="row-mt-3">
        <div class="col-md-6">

            <?php if (empty($akta)) : ?>
                <div class="alert alert-danger" role="alert">
                    Akta tidak ditemukan !
                </div>
            <?php endif; ?>

            <ul class="list-group">
                <?php foreach ($akta as $a) : ?>
                    <li class="list-group-item"><?= $a['nama_notaris'] ?>
                        <h6><strong><?= $a['akta']; ?></strong></h6>
                        <br>
                        <a href="<?= base_url(); ?>client/laporan/<?= $a['id_akta']; ?>" class="badge badge-danger float-right">Buat Laporan</a>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!-- ini digunakan untuk view pada menu informasi -->