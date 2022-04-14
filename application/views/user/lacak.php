<!-- Main -->
<main>
  <section class="section-detail">
    <div class="wrapper-complaint__detail">
      <h2>Detail Aduan</h2>
      <hr class="divider">
      <table class="table-detail">
        <tr>
          <th>Nama</th>
          <td>: <?= $result['name']; ?></td>
        </tr>
        <tr>
          <th>Kategori</th>
          <td>: <?= $result['categories']; ?></td>
        </tr>
        <tr>
          <th>Judul</th>
          <td>: <?= $result['judul']; ?></td>
        </tr>
        <tr>
          <th>Isi aduan</th>
          <td>: <?= $result['body']; ?></td>
        </tr>
        <tr>
          <th>Kode unik</th>
          <td>: <span class="fw-bold"><?= $result['kode_unik']; ?></span></td>
        </tr>
        <tr>
          <th>Status</th>
          <?php if ($result['status'] == "diterima") : ?>
            <td>: <span class="fw-bold text-capitalize text-success"><?= $result['status']; ?></span></td>
          <?php elseif ($result['status'] == "diproses") : ?>
            <td>: <span class="fw-bold text-capitalize text-warning"><?= $result['status']; ?></span></td>
          <?php else : ?>
            <td>: <span class="fw-bold text-capitalize text-danger"><?= $result['status']; ?></span></td>
          <?php endif; ?>
        </tr>
        <tr>
          <th>Dikirimkan</th>
          <td>: <?= date('H:i d-m-Y', $result['date_created']); ?></td>
        </tr>
      </table>
    </div>
    <a href="<?= base_url(); ?>home/" class=" btn btn-secondary back-to-history">Kembali</a>
  </section>
</main>