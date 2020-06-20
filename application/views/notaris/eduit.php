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
                        <?php echo form_open_multipart('notaris/ngedit'); ?>
                        <div class="col-sm-10">

                            <input type="hidden" class="form-control" id="id_pembayaran" placeholder="id_pembayaran" name="id_pembayaran" value="<?= $pembayaran['id_pembayaran']; ?>" readonly>
                        </div>

                        <div class="col-sm-10">
                            <label for=" nama_notaris">Nama</label>
                            <input type="text" class="form-control" id="id_akta" placeholder="id_akta" name="id_akta" value="<?= $pembayaran['id_pembayaran']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?= $pembayaran['nama']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" nama">Nama</label>
                            <input type="text" class="form-control" id="email" placeholder="email" name="email" value="<?= $pembayaran['email']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" nama">Nama</label>
                            <input type="text" class="form-control" id="email_notaris" placeholder="email_notaris" name="email_notaris" value="<?= $pembayaran['email_notaris']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" nama_notaris">Nama</label>
                            <input type="hidden" class="form-control" id="nama_notaris" placeholder="nama" name="nama_notaris" value="<?= $pembayaran['nama']; ?>" readonly>
                        </div>

                        <div class="col-sm-10">
                            <label for=" jenis">Jenis Akta</label>
                            <input type="text" class="form-control" id="jenis" placeholder="jenis" name="jenis" value="<?= $pembayaran['jenis']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" tanggal">Tanggal Buat</label>
                            <input type="text" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal" value="<?= $pembayaran['tanggal']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" ambil">Tanggal Pengambilan</label>
                            <input type="date" class="form-control" id="ambil" placeholder="ambil" name="ambil" value="<?= $pembayaran['ambil']; ?>">
                        </div>

                        <div class="col-sm-10">
                            <label for=" jam">Jam Pengambilan</label>
                            <input type="time" class="form-control" id="jam" placeholder="jam" name="jam" value="<?= $pembayaran['jam']; ?>">
                        </div>
                        <div class="col-sm-10">
                            <label for=" biaya">Biaya Akta</label>
                            <input type="text" class="form-control" id="biaya" placeholder="biaya" name="biaya" value="<?= $pembayaran['biaya']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" status_pembayaran">Status Pembayaran</label>

                            <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                                <option value="<?= $pembayaran['status_pembayaran']; ?>"><?= $pembayaran['status_pembayaran']; ?></option>
                                <option value="Lunas">Lunas</option>

                            </select>
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