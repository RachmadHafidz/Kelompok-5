<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Form Pembuatan Akta</h1>
                        </div>


                        <h5 class="float-right"><strong>Notaris <?= $notaris['nama']; ?></strong></h5>
                        <br>
                        <br>
                        <?php $notaris; ?>
                        <?php $client; ?>
                        <?php echo form_open_multipart('client/sewa1'); ?>

                        <input type="hidden" name="idnot" value="<?= $idnot ?>">
                        <div class="form-group">
                            <p>Form pengajuan pembuatan akta jual beli
                                <a href="<?= base_url('client/download_sk'); ?>">download file disini </a></p>
                        </div>
                        <div class="form-group">
                            <p>Form pengajuan pembuatan surat kuasa
                                <a href="<?= base_url('client/download_sk3'); ?>">download file disini </a></p>
                        </div>

                        <div class="form-group">
                            <p>Form pengajuan pembuatan akta sewa menyewa
                                <a href="<?= base_url('client/download_sk2'); ?>">download file disini </a></p>
                        </div>
                        <div class=" col-sm-10">
                            <label for=" jenis">Jenis Akta</label>

                            <select name="jenis" id="jenis" class="form-control">
                                <option>Pilih Jenis Akta</option>
                                <option value="Akta Sewa Menyewa">Akta Sewa Menyewa</option>
                                <option value="Akta Jual Beli">Akta Jual Beli</option>
                                <option value="Surat Kuasa">Surat Kuasa</option>

                            </select>
                        </div>
                        <br>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file">
                                <label class="custom-file-label" for="file">Pilih file</label>
                            </div>
                        </div>



                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="tanggal" placeholder="tanggal" name="tanggal" value="<?php echo date("Y-m-d"); ?>">
                        </div>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="keterangan" placeholder="keterangan" name="keterangan" value="Menunggu Konfirmasi" readonly>
                        </div>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="catatan" placeholder="catatan" name="catatan" value="Belum ada catatan" readonly>
                        </div>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="akta" placeholder="akta" name="akta" value="Belum ada Akta" readonly>
                        </div>


                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="nama_notaris" placeholder="nama" name="nama_notaris" value="<?= $notaris['nama']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="email_notaris" placeholder="email_notaris" name="email_notaris" value="<?= $notaris['email']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= $client['nama']; ?>" readonly>
                        </div>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="email" name="email" placeholder="email" value="<?= $client['email']; ?>" readonly>
                        </div>
                        <br>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="tanggal" value="<?php echo date("Y-m-d"); ?>"" readonly>
                        </div>
                        

                        <br>
                        <div class=" col-sm-10">
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>





                        </form>
                        <hr>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>