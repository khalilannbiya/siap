<!-- Main -->
<main>
  <!-- Section Form Complaint -->
  <form action="<?= base_url(); ?>complaint/add" class="form-complaint" method="POST">
    <section>
      <h2>Data Diri</h2>
      <hr class="divider">
      <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $user['name']; ?>" disabled>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" disabled>
      </div>
      <div class="mb-3">
        <label for="nope" class="form-label">Nomor Telepon Aktif</label>
        <input type="text" class="form-control" id="nope" name="nope" value="<?= $user['no_hp']; ?>" disabled>
      </div>
      <div class="mb-3">
        <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
        <input type="text" class="form-control" id="nik" name="nik" value="<?= $user['nik']; ?>" disabled>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control" value="<?= $user['address']; ?>" disabled><?= $user['address']; ?>"</textarea>
      </div>
    </section>
    <section>
      <h2>Data Aduan</h2>
      <hr class="divider">
      <div class="mb-3">
        <select class="form-select text-capitalize" aria-label="Default select example" name="categories" id="categories">
          <option value="" selected>Pilih Kategori</option>
          <?php foreach ($categories as $category) : ?>
            <option value="<?= $category; ?>"><?= $category; ?></option>
          <?php endforeach; ?>
        </select>
        <div class="form-text"><?= form_error('categories'); ?></div>
      </div>
      <div class="mb-3">
        <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan judul" value="<?= set_value('judul'); ?>">
        <div class="form-text"><?= form_error('judul'); ?></div>
      </div>
      <div class="form-floating mb-3">
        <textarea name="body" id="body" class="form-control" placeholder="Isi aduan"></textarea>
        <label for="body">Isi aduan</label>
        <div class="form-text"><?= form_error('body'); ?></div>
      </div>
    </section>

    <button type="submit" class="btn btn-primary">Kirim</button>
  </form>
</main>