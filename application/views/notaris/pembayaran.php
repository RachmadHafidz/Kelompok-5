<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"> Pembayaran</h1>
                        </div>

                        <?php $notaris; ?>
                        <?php $client; ?>
                        <?php echo form_open_multipart('notaris/biaya'); ?>

                        <div class="col-sm-10">

                            <input type="hidden" class="form-control" id="id_akta" placeholder="id_akta" name="id_akta" value="<?= $akta['id_akta']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?= $akta['nama']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">

                            <input type="hidden" class="form-control" id="email" placeholder="email" name="email" value="<?= $akta['email']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">

                            <input type="hidden" class="form-control" id="email_notaris" placeholder="email_notaris" name="email_notaris" value="<?= $akta['email_notaris']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">

                            <input type="hidden" class="form-control" id="nama_notaris" placeholder="nama" name="nama_notaris" value="<?= $notaris['nama']; ?>" readonly>
                        </div>

                        <div class="col-sm-10">
                            <label for=" jenis">Jenis Akta</label>
                            <input type="text" class="form-control" id="jenis" placeholder="jenis" name="jenis" value="<?= $akta['jenis']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" tanggal">Tanggal Buat</label>
                            <input type="text" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal" value="<?= $akta['tanggal']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" ambil">Tanggal Pengambilan</label>
                            <input type="text" class="form-control" id="ambil" placeholder="ambil" name="ambil" value="Menunggu Lunas" readonly>
                        </div>

                        <div class="col-sm-10">
                            <label for=" jam">Jam Pengambilan</label>
                            <input type="text" class="form-control" id="jam" placeholder="jam" name="jam" value="Menunggu Lunas" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" biaya">Biaya Akta</label>
                            <input type="text" class="form-control" id="biaya" placeholder="biaya" name="biaya">
                        </div>
                        <div class="col-sm-10">
                            <label for=" biaya">Rekening Pembayaran</label>
                            <input type="text" class="form-control" id="rekening" placeholder="rekening" name="rekening">
                        </div>
                        <div class="col-sm-10">
                            <label for=" biaya">Status Pembayaran</label>
                            <input type="text" class="form-control" id="status_pembayaran" placeholder="status_pembayaran" name="status_pembayaran" value="Belum Lunas" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" bukti">Bukti Pembayaran</label>
                            <input type="text" class="form-control" id="bukti" placeholder="bukti" name="bukti" value="Belum ada" readonly>
                        </div>


                        <br>
                        <div class="col-sm-10">
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