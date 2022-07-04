<?php if ($this->session->flashdata('message')) : ?>
  <div class="alert my-alert alert-success alert-dismissible fade show container fixed-top" role="alert">
    <strong>Yeayyyyy!</strong>
    <?= $this->session->flashdata('message'); ?>
  </div>
<?php elseif ($this->session->flashdata('messageWrong')) : ?>
  <div class="alert my-alert alert-danger alert-dismissible fade show container fixed-top" role="alert">
    <strong>Wahhhh!</strong>
    <?= $this->session->flashdata('messageWrong'); ?>
  </div>
<?php endif; ?>
<main class="main-of-content">
  <section class="left-section">
    <!-- <i class="ri-arrow-left-s-line"></i> -->
    <h2>Silahkan masuk untuk segera mengirimkan aduan!</h2>
    <img src="<?= base_url(); ?>assets/img/login.png" alt="Ilustrasi Login">
  </section>
  <section class="right-section login-page-section">
    <h2>Masuk</h2>
    <p>Belum punya akun? <a href="<?= base_url(); ?>auth/registration">Daftar</a></p>
    <form class="form-auth login-page" action="<?= base_url(); ?>auth/" method="POST">
      <div class="mb-4">
        <label for="email" class="form-label">Alamat email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email" value="<?= set_value('email'); ?>">
        <div class="form-text"><?= form_error('email'); ?></div>
      </div>
      <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
        <div class="form-text"><?= form_error('password'); ?></div>
      </div>
      <h3 class="help-service">Bantuan? <a target="_blank" href="https://api.whatsapp.com/send?phone=+6281289617082&text=Halo,%20bantuan%20tentang">Klick disini!</a></h3>
      <button type="submit" class="btn btn-primary">
        Masuk
      </button>
    </form>
  </section>
</main>