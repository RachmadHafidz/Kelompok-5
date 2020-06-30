<div class="container">


    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">

            </form>
        </div>
    </div>
    <div class="row-mt-3">
        <div class="col-md-6">

            <?php if (empty($pembayaran)) : ?>
                <div class="alert alert-danger" role="alert">
                    Pembayaran tidak ditemukan !
                </div>
            <?php endif; ?>

            <ul class="list-group">
                <?php foreach ($pembayaran as $a) : ?>
                    <li class="list-group-item"><?= $a['nama'] ?>
                        <h6><strong><?= $a['status_pembayaran']; ?></strong></h6>
                        <br>
                        <a href="<?= base_url(); ?>notaris/eduit/<?= $a['id_akta']; ?>" class="badge badge-warning float-right">Konfirmasi Pembayaran</a>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!-- ini digunakan untuk view pada menu informasi -->