
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur border-radius-lg top-0 z-index-3 shadow position-absolute mt-4 py-2 start-0 end-0 mx-4">
          <div class="container-fluid ps-2 pe-0">
    Algoritma dan Pemrograman  
            
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                
                <li class="nav-item">
                    <a class="nav-link me-2" href="<?php echo base_url('Auth/register'); ?>">
                      <i
                        class="fas fa-user-circle opacity-6 text-dark me-1 "
                      ></i>
                      Register
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link me-2" href="<?php echo base_url('Auth');?>/">
                      <i class="fas fa-key opacity-6 text-dark me-1"></i>
                      Login
                    </a>
                  </li>
              </ul>
              
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
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
                  <h4 class="font-weight-bolder">Register</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body">
              <form class="user" method="post" action="<?= base_url('Auth/registration') ?>">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="text" placeholder = "Nama" name = "nama" class="form-control">

                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label"></label>
                      <input type="email" placeholder = "Email" name = "email" class="form-control">
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
                      <button type="submit" class="btn btn-lg bg-gradient-success btn-lg w-100 mt-4 mb-0">Register</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="<?php echo base_url('Auth');?>/" class="text-info text-gradient font-weight-bold">Login</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
