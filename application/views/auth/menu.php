<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Buat akun baru</h1>
                        </div>
                        <form class="user" method="post" action=" ">
                            <div class="form-group">
                                <a href="<?= base_url('auth/registration'); ?>" class="btn btn-success btn-lg btn-block">Akun Client</a>
                            </div>
                            <div class="form-group">
                                <a href="<?= base_url('auth/regist'); ?>" class="btn btn-warning btn-lg btn-block"> Akun Notaris </a>
                            </div>


                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>