<!-- Main -->
<main>
  <section class="section-detail">
    <div class="card mb-3" style="max-width: 540px;">
      <div class="row g-0">
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Profile</h5>
            <p class="card-text">Nama : <?= $detail['name']; ?></p>
            <p class="card-text">Email : <?= $detail['email']; ?></p>
            <p class="card-text">Nomor Telepon : <?= $detail['no_hp']; ?></p>
            <p class="card-text">Alamat : <?= $detail['address']; ?></p>
            <p class="card-text">NIK : <?= $detail['nik']; ?></p>
            <p class="card-text">Kategori : <?= $detail['categories']; ?></p>
            <p class="card-text">Judul : <?= $detail['judul']; ?></p>
            <p class="card-text">Body : <?= $detail['body']; ?></p>
            <p class="card-text">Kode Unik : <?= $detail['kode_unik']; ?></p>
            <p class="card-text">Status : <span id="status"><?= $detail['status']; ?></span> </p>
            <p class="card-text"><small class="text-muted">Bergabung sejak <?= date('H:i d-m-Y', $detail['date_created']); ?></small></p>
            <a href="<?= base_url(); ?>complaint/get" class="btn btn-secondary">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>