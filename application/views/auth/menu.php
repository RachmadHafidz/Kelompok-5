<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create New Acount</h1>
                        </div>
                        <form class="user" method="post" action=" ">
                            <div class="form-group">
                                <a href="<?= base_url('auth/registration'); ?>" class="btn btn-success btn-lg btn-block">Client Account</a>
                            </div>
                            <div class="form-group">
                                <a href="<?= base_url('auth/regist'); ?>" class="btn btn-warning btn-lg btn-block">Notaris Account</a>
                            </div>


                        </form>
                        <hr>

                        <div class="text-center">
                            <a class="small" href="<?= base_url('auth'); ?>">Have already acount? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>