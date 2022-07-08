<!-- Main -->
<main>
  <section class="section-detail">
    <div class="wrapper-data__detail">
      <h2>Data Pengirim</h2>
      <hr class="divider">
      <table class="table-detail">
        <tr>
          <th>Nama</th>
          <td>: <?= $detail['name']; ?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td>: <?= $detail['email']; ?></td>
        </tr>
        <tr>
          <th>Nomor Telepon</th>
          <td>: <?= $detail['no_hp']; ?></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td>: <?= $detail['address']; ?></td>
        </tr>
        <tr>
          <th>NIK</th>
          <td>: <?= $detail['nik']; ?></td>
        </tr>
      </table>
    </div>
    <div class="wrapper-complaint__detail">
      <h2>Data Aduan</h2>
      <hr class="divider">
      <table class="table-detail">
        <tr>
          <th>Kategori</th>
          <td>: <?= $detail['categories']; ?></td>
        </tr>
        <tr>
          <th>Judul</th>
          <td>: <?= $detail['judul']; ?></td>
        </tr>
        <tr>
          <th>Isi aduan</th>
          <td>: <?= $detail['body']; ?></td>
        </tr>
        <tr>
          <th>Kode unik</th>
          <td>: <span class="fw-bold"><?= $detail['kode_unik']; ?></span></td>
        </tr>
        <tr>
          <th>Status</th>
          <?php if ($detail['status'] == "diterima") : ?>
            <td>: <span class="fw-bold text-capitalize text-success"><?= $detail['status']; ?></span></td>
          <?php elseif ($detail['status'] == "diproses") : ?>
            <td>: <span class="fw-bold text-capitalize text-warning"><?= $detail['status']; ?></span></td>
          <?php else : ?>
            <td>: <span class="fw-bold text-capitalize text-danger"><?= $detail['status']; ?></span></td>
          <?php endif; ?>
        </tr>
        <tr>
          <th>Dikirimkan</th>
          <td>: <?= $detail['date_created']; ?></td>
        </tr>
      </table>
    </div>
    <a href="<?= base_url(); ?>complaint/get" class=" btn btn-secondary back-to-history">Kembali</a>
  </section>
</main>