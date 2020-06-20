<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tanya Notaris</h1>
                        </div>
                        <h5 class="float-right"><strong>Notaris <?= $notaris['nama']; ?></strong></h5>
                        <br>
                        <br>

                        <?php $notaris; ?>
                        <?php $client; ?>
                        <form method="post" action="<?= base_url('client/tanya1'); ?>">

                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="id" placeholder="id" name="id" value="<?= $client['id']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="nama" placeholder="nama" name="nama" value="<?= $client['nama']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="email" placeholder="email" name="email" value="<?= $client['email']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="id_notaris" placeholder="id_notaris" name="id_notaris" value="<?= $notaris['id_notaris']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="nama" placeholder="nama" name="nama_notaris" value="<?= $notaris['nama']; ?>" readonly>
                            </div>

                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="email" placeholder="email" name="email_notaris" value="<?= $notaris['email']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <textarea class="form-control" id="pertanyaan" placeholder="Tulis pertanyaan disini" name="pertanyaan"></textarea>
                            </div>
                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="jawaban" placeholder="Tulis jawaban disini" name="jawaban" value=""></input>
                            </div>
                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="keterangan" placeholder="keterangan" name="keterangan" value="Menunggu Jawaban" readonly>
                            </div>
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal" value="<?php echo date("Y-m-d"); ?>"" readonly>
                        </div>


                        <br>
                        <div class=" col-sm-10">
                                <button type="submit" class="btn btn-success">Kirim</button>
                            </div>





                        </form>
                        <hr>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>