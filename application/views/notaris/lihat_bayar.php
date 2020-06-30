<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-3">
            <div class="alert alert-success alert-dismissible fade show" role="alert">Detail Pembayaran
                berhasil <?= $this->session->flashdata('flash'); ?>.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    <?php endif; ?>
    <a href="<?= base_url(); ?>notaris/konfirmasi_bayar/" class="btn btn-warning float-left"> Konfirmasi Pembayaran</a>
    <br>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Client</th>
                <th scope="col">Jenis Akta </th>
                <th scope="col">Tanggal Buat</th>
                <th scope="col">Tanggal Pengambilan</th>
                <th scope="col">Jam Pengambilan</th>
                <th scope="col">Biaya Akta</th>
                <th scope="col">Status Pembayaran</th>
                <th scope="col">Bukti</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($pembayaran as $p) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $p->nama ?></td>
                    <td><?php echo $p->jenis ?></td>
                    <td><?php echo $p->tanggal ?></td>
                    <td><?php echo $p->ambil ?></td>
                    <td><?php echo $p->jam ?></td>
                    <td><?php echo $p->biaya ?></td>
                    <td><?php echo $p->status_pembayaran ?></td>
                    <td><?php echo $p->bukti ?></td>
                    <td>
                        <a href="<?php echo base_url() . 'notaris/download0/' . $p->id_pembayaran; ?>" class="badge badge-primary">Download</a>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->