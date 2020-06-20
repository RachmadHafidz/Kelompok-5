<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Notaris</th>
                <th scope="col">Tanggal Tanya </th>
                <th scope="col">Pertanyaan</th>
                <th scope="col">Jawaban</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($jawaban as $j) {
            ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $j->nama_notaris ?></td>
                    <td><?php echo $j->tanggal ?></td>
                    <td><?php echo $j->pertanyaan ?></td>
                    <td><?php echo $j->jawaban ?></td>


                </tr>
            <?php } ?>
        </tbody>
    </table>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->