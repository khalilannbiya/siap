  <main class="main-of-content">
    <section class="left-section">
      <!-- <i class="ri-arrow-left-s-line"></i> -->
      <h2>Daftarkan akun anda terlebih dahulu. Proses nya ga lama kok!!</h2>
      <img src="<?= base_url(); ?>assets/img/regis.png" alt="Ilustrasi Registrasi">
    </section>
    <section class="right-section">
      <h2>Daftar Akun</h2>
      <p>Sudah punya akun? <a href="<?= base_url(); ?>auth/">Masuk!</a></p>
      <form class="form-auth" action="<?= base_url(); ?>auth/registration" method="POST">
        <div class="row mb-3" id="row-layout">
          <div class="col" id="column-layout">
            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" value="<?= set_value('name'); ?>">
            <div class="form-text"><?= form_error('name'); ?></div>
          </div>
          <div class="col">
            <input type="text" class="form-control" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
            <div class="form-text"><?= form_error('email'); ?></div>
          </div>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" value="<?= set_value('nik'); ?>">
          <div class="form-text"><?= form_error('nik'); ?></div>
        </div>
        <div class="mb-3">
          <select class="form-select text-capitalize" aria-label="Default select example" name="gender" id="gender">
            <option value="" selected>Pilih jenis kelamin</option>
            <?php foreach ($gender as $gn) : ?>
              <option value="<?= $gn; ?>"><?= $gn; ?></option>
            <?php endforeach; ?>
          </select>
          <div class="form-text"><?= form_error('gender'); ?></div>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" id="nope" name="nope" placeholder="Nomor Telepon Aktif" value="<?= set_value('nope'); ?>">
          <div class="form-text"><?= form_error('nope'); ?></div>
        </div>
        <div class="form-floating mb-3">
          <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat Lengkap"></textarea>
          <label for="alamat">Alamat</label>
          <div class="form-text"><?= form_error('alamat'); ?></div>
        </div>
        <div class="row mb-3" id="row-password">
          <div class="col" id="column-password">
            <input type="password" id="password1" name="password1" class="form-control" placeholder="Password" aria-label="Password">
            <div class="form-text"><?= form_error('password1'); ?></div>
          </div>
          <div class="col">
            <input type="password" id="password2" name="password2" class="form-control" placeholder="Ulangi Password" aria-label="Last name">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">
          Daftar
        </button>
      </form>
    </section>
  </main>