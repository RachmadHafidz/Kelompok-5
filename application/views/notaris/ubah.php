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
                        <?php echo form_open_multipart('notaris/jajal'); ?>

                        <div class="col-sm-10">

                            <input type="hidden" class="form-control" id="id_akta" placeholder="id_akta" name="id_akta" value="<?= $akta['id_akta']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <label for=" nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="nama" name="nama" value="<?= $akta['nama']; ?>" readonly>
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
                            <label for=" keterangan">Keterangan</label>

                            <select name="keterangan" id="keterangan" class="form-control">
                                <option value="<?= $akta['keterangan']; ?>"><?= $akta['keterangan']; ?></option>
                                <option value="Sedang di proses">Sedang di proses</option>
                                <option value="Ditolak">Ditolak</option>
                                <option value="Selesai">Selesai</option>
                            </select>
                        </div>
                        <div class="col-sm-10">
                            <label for=" catatan">Catatan</label>
                            <input type="text" class="form-control" id="catatan" placeholder="catatan" name="catatan" value="<?= $akta['catatan']; ?>">
                        </div>

                        <div class="col-sm-9">
                            <label for=" akta">Akta</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" value="<?= $akta['akta']; ?>" id="akta" name="akta">
                                <label class="custom-file-label" for="akta">Choose file</label>
                            </div>
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