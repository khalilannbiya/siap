<div class="container-fluid">
  <div class="row">
    <h2>Detail aduan</h2>
  </div>

  <div class="row mt-5">
    <h4>Data Pengirim</h4>
  </div>

  <table class="table table-borderless">
    <tbody>
      <tr>
        <th>Nama</th>
        <td>: <a class="text-muted font-weight-bold" href="<?= base_url(); ?>user/detailUser/<?= $detail['id_user']; ?>"><?= $detail['name']; ?></a></td>
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
    </tbody>
  </table>
  <hr class="divider">
  <div class="row mt-4">
    <h4>Data Aduan</h4>
  </div>
  <table class="table table-borderless">
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
      <td>: <span class="font-weight-bold"><?= $detail['kode_unik']; ?></span></td>
    </tr>
    <tr>
      <th>Status</th>
      <?php if ($detail['status'] == "diterima") : ?>
        <td>: <span class="font-weight-bold text-capitalize text-success"><?= $detail['status']; ?></span></td>
      <?php elseif ($detail['status'] == "diproses") : ?>
        <td>: <span class="font-weight-bold text-capitalize text-warning"><?= $detail['status']; ?></span></td>
      <?php else : ?>
        <td>: <span class="font-weight-bold text-capitalize text-danger"><?= $detail['status']; ?></span></td>
      <?php endif; ?>
    </tr>
    <tr>
      <th>Dikirimkan</th>
      <td>: <?= date('H:i d-m-Y', $detail['date_created']); ?></td>
    </tr>
  </table>
</div>