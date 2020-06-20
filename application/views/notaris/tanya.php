<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <a href="<?= base_url(); ?>notaris/jawab/" class="btn btn-warning float-left"> Jawab Pertanyaan</a>
    <br>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Client</th>
                <th scope="col">Tanggal Tanya </th>
                <th scope="col">Pertanyaan</th>


            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($tanya as $t) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $t->nama ?></td>
                    <td><?php echo $t->tanggal ?></td>
                    <td><?php echo $t->pertanyaan ?></td>



                </tr>
            <?php } ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->