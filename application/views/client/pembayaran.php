<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <a href="<?= base_url(); ?>client/unggah_bayar/" class="btn btn-warning float-left"> Unggah Bukti Pembayaran</a>
    <br>
    <br>
    <div class="row">
        <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>.


        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Notaris</th>
                <th scope="col">Jenis Akta </th>
                <th scope="col">Tanggal Buat</th>
                <th scope="col">Tanggal Pengambilan</th>
                <th scope="col">Jam Pengambilan</th>
                <th scope="col">Biaya Akta</th>
                <th scope="col">Rekening Pembayaran</th>
                <th scope="col">Status Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($pembayaran as $p) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $p->nama_notaris ?></td>
                    <td><?php echo $p->jenis ?></td>
                    <td><?php echo $p->tanggal ?></td>
                    <td><?php echo $p->ambil ?></td>
                    <td><?php echo $p->jam ?></td>
                    <td><?php echo $p->biaya ?></td>
                    <td><?php echo $p->rekening ?></td>
                    <td><?php echo $p->status_pembayaran ?></td>


                </tr>
            <?php } ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->