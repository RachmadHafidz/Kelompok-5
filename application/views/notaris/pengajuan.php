<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <a href="<?= base_url(); ?>notaris/konfirmasi/" class="btn btn-warning float-left"> Konfirmasi Akta</a>
    <br>
    <br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>

                <th scope="col">Nama Client</th>
                <th scope="col">File </th>
                <th scope="col">Jenis Akta </th>
                <th scope="col">Tanggal </th>
                <th scope="col">Keterangan</th>
                <th scope="col">Catatan</th>
                <th scope="col">Akta</th>
                <th scope="col">Laporan</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
        <tbody>
            <?php

            $no = 1;
            foreach ($akta as $u) :
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>

                    <td><?php echo $u->nama ?></td>
                    <td><?php echo $u->file ?></td>
                    <td><?php echo $u->jenis ?></td>
                    <td><?php echo $u->tanggal ?></td>
                    <td><?php echo $u->keterangan ?></td>
                    <td><?php echo $u->catatan ?></td>
                    <td><?php echo $u->akta ?></td>
                    <td><?php echo $u->lapor ?></td>
                    <td>

                        <a href="<?php echo base_url() . 'notaris/download/' . $u->id_akta; ?>" class="badge badge-primary">Download</a>


                    </td>


                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->