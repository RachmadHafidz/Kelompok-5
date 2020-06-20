<div class="container">


    <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari notaris.." name="keyword">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row-mt-3">
        <div class="col-md-6">
            <br>
            <?php if (empty($notaris)) : ?>
                <div class="alert alert-danger" role="alert">
                    Notaris tidak ditemukan !
                </div>
            <?php endif; ?>

            <ul class="list-group">
                <?php foreach ($notaris as $ifo) : ?>
                    <li class="list-group-item"><?= $ifo['nama'] ?>

                        <a href="<?= base_url(); ?>client/detail/<?= $ifo['id_notaris']; ?>" class="badge badge-primary float-right"> Detail</a>
                        <br>
                        <a href="<?= base_url(); ?>client/buat_akta/<?= $ifo['id_notaris']; ?>" class="badge badge-success float-right"> Buat Akta</a>
                        <br>
                        <a href="<?= base_url(); ?>client/layanan/<?= $ifo['id_notaris']; ?>" class="badge badge-warning float-right">Layanan</a>
                        <br>
                        <a href="<?= base_url(); ?>client/tanya/<?= $ifo['id_notaris']; ?>" class="badge badge-info float-right">Tanya Notaris</a>
                        <br>


                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<!-- ini digunakan untuk view pada menu informasi -->