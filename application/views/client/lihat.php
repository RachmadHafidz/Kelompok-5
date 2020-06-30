<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <a href="<?= base_url(); ?>client/lapor/" class="btn btn-danger float-left"> Laporkan Akta</a>
    <br>
    <br>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">Terima
                    kasih permintaan anda segera <?= $this->session->flashdata('flash'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('flash1')) : ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">Mohon maaf permintaan anda
                    tidak dapat diproses. Mohon coba lagi <?= $this->session->flashdata('flash1'); ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            </div>
        </div>
    <?php endif; ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Notaris</th>
                <th scope="col">File </th>
                <th scope="col">Jenis Akta </th>
                <th scope="col">Keterangan</th>
                <th scope="col">Catatan</th>
                <th scope="col">Akta</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($akta as $u) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $u->nama_notaris ?></td>
                    <td><?php echo $u->file ?></td>
                    <td><?php echo $u->jenis ?></td>
                    <td><?php echo $u->keterangan ?></td>
                    <td><?php echo $u->catatan ?></td>
                    <td><?php echo $u->akta ?></td>
                    <td>
                        <a href="<?php echo base_url() . 'client/download/' . $u->id_akta; ?>" class="badge badge-primary">Download</a>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->