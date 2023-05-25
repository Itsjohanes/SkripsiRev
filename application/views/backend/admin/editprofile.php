
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">

  
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-info h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-reset.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Edit Profile</h4>
                  <p class="mb-0">Edit Profile Anda</p>
                </div>
                <div class="card-body">
              <form class="user" method="post" action="<?= base_url('Admin/runEdit') ?>">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="text" placeholder = "Nama" value="<?= $user['nama']; ?>" name = "nama" class="form-control">

                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="email" placeholder = "Email" name = "email"  value="<?= $user['email']; ?>" disabled class="form-control">
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>

                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="password" placeholder = "Password" name = "password1"  class="form-control">
                      <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>


                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="password" placeholder = "Password Confirmation" name = "password2"  class="form-control">

                    </div>
                  
                    <div class="text-center">
                      <button type="submit" class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0">Edit</button>
                    </div>
                  </form>
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
