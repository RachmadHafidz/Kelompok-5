<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat Laporan Akta</h1>
                        </div>

                        <?php $notaris; ?>
                        <?php $client; ?>
                        <?php echo form_open_multipart('client/send'); ?>

                        <div class="col-sm-10">

                            <input type="hidden" class="form-control" id="id_akta" placeholder="id_akta" name="id_akta" value="<?= $akta['id_akta']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" nama_notaris">Nama Notaris</label>
                            <input type="text" class="form-control" id="nama_notaris" placeholder="nama_notaris" name="nama_notaris" value="<?= $akta['nama_notaris']; ?>" readonly>
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
                            <label for=" tanggal">File Akta</label>
                            <input type="text" class="form-control" id="akta" placeholder="akta" name="akta" value="<?= $akta['akta']; ?>" readonly>
                        </div>
                        <br>
                        <div class="col-sm-10">

                            <textarea class="form-control" id="lapor" placeholder="Tulis laporan disini" name="lapor"></textarea>
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