<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Akta Surat Kuasa</h1>
                        </div>

                        <?php $notaris; ?>
                        <?php $client; ?>
                        <form method="post" action="<?= base_url('notaris/balas1'); ?>">

                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="id_tanya" placeholder="id_tanya" name="id_tanya" value="<?= $balas['id_tanya']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="id" placeholder="id" name="id" value="<?= $balas['id']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?= $balas['nama']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="email" placeholder="email" name="email" value="<?= $balas['email']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="id_notaris" placeholder="id_notaris" name="id_notaris" value="<?= $balas['id_notaris']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <input type="text" class="form-control" id="nama" placeholder="nama" name="nama_notaris" value="<?= $balas['nama_notaris']; ?>" readonly>
                            </div>

                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="email" placeholder="email" name="email_notaris" value="<?= $balas['email_notaris']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <input class="form-control" id="pertanyaan" placeholder="Tulis pertanyaan disini" name="pertanyaan" value="<?= $balas['pertanyaan']; ?>" readonly>
                            </div>
                            <div class="col-sm-10">

                                <textarea class="form-control" id="jawaban" placeholder="Tulis jawaban disini" name="jawaban" value="<?= $balas['pertanyaan']; ?>"></textarea>
                            </div>
                            <div class="col-sm-10">
                                <label for=" keterangan">Keterangan</label>

                                <select name="keterangan" id="keterangan" class="form-control">
                                    <option value="<?= $balas['keterangan']; ?>"><?= $balas['keterangan']; ?></option>
                                    <option value="Terjawab">Terjawab</option>

                                </select>
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