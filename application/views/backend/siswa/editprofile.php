<div class="container">

    <div class="card o-hidden border-0  my-5 col-lg-7 margin mx-auto">
        <div class="card-body p-0">

            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Edit Account!</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('Siswa/runEdit') ?>">

                            <div class=" form-group">
                                <input type="text" required class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= $user['email']; ?>" disabled>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class=" form-group">
                                <input type="text" required class="form-control form-control-user" id="nama" placeholder="Nama" name="nama" value="<?= $user['nama']; ?>">
                            </div>
                            <div class=" form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" required class="form-control form-control-user" id="password1" placeholder="New Password" name="password1">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>

                                </div>
                                <div class="col-sm-6">
                                    <input type="password" required class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                                </div>
                            </div>
                            <Button type="submit" class="btn btn-primary btn-user btn-block">
                                Edit Account
                            </Button>

                        </form>
                        <hr>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>