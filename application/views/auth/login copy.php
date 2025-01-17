<div class="container">
  <!-- Outer Row -->
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">Login Page</h1>
                  <?php if ($this->session->flashdata('message')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>Yeayyyyy!</strong>
                      <?= $this->session->flashdata('message'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php elseif ($this->session->flashdata('messageWrong')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <strong>Wahhhh!</strong>
                      <?= $this->session->flashdata('messageWrong'); ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  <?php endif; ?>
                </div>
                <form class="user" method="POST" action="<?= base_url(); ?>auth/">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>" />
                    <div class="text-danger"><?= form_error('email'); ?></div>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" />
                    <div class="text-danger"><?= form_error('password'); ?></div>
                  </div>
                  <button type="submit" class="btn btn-primary btn-user btn-block">
                    Login
                  </button>
                  <hr />
                </form>
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url(); ?>auth/registration">Create an Account!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>