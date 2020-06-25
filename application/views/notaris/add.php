<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Informasi Kantor</h1>
                        </div>

                        <form class="user" method="post" action="<?= base_url('notaris/add'); ?>">

                            <div class="col-sm-10">

                                <input type="hidden" class="form-control" id="id_notaris" placeholder="id_notaris" name="id_notaris" value="<?= $notaris['id_notaris']; ?>">
                            </div>
                            <div class="col-sm-10">
                                <label for=" hari">Hari Layanan</label>
                                <input type="text" class="form-control" id="hari" placeholder="hari" name="hari" value="<?= $notaris['hari']; ?>">
                            </div>


                            <div class="col-sm-10">
                                <label for=" jam">Jam Layanan</label>
                                <input type="text" class="form-control" id="jam" placeholder="jam" name="jam" value="<?= $notaris['jam']; ?>">
                            </div>
                            <div class="col-sm-10">
                                <label for=" alamat">Alamat Kantor</label>
                                <input type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat" value="<?= $notaris['alamat']; ?>">
                            </div>

                            <div class="col-sm-10">
                                <label for=" buat_akta">Catatan</label>
                                <input type="text" class="form-control" id="buat_akta" placeholder="buat_akta" name="buat_akta" value="<?= $notaris['buat_akta']; ?>">
                            </div>
                            <br>


                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Tambah</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>