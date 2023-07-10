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
                        <?= $this->session->flashdata('message'); ?>
                        <form class="user" method="post" action="<?= base_url('kelolalistsiswa/runeditsiswa') ?>">

                            <div class=" form-group">
                                <div class="input-group input-group-outline">
                                <input type="text" required class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= $siswa['email']; ?>" disabled>
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                            <div class=" form-group">
                                <div class="input-group input-group-outline">
                                <input type="text" required class="form-control form-control-user" id="nama" placeholder="Nama" name="nama" value="<?= $siswa['nama']; ?>">
                            </div>
                            </div>
                            <div class=" form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="input-group input-group-outline">
                                    <input type="password" required class="form-control form-control-user" id="password1" placeholder="New Password" name="password1">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group input-group-outline">
                                    <input type="password" required class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                                </div>
                                </div>
                                <div>
                                    <input type="hidden" required class="form-control form-control-user" id="id" name="id" value="<?= $siswa['id']; ?>">

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