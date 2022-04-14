<!-- Main -->
<main>
  <section class="section-detail">
    <div class="wrapper-data__detail">
      <h2>Data pribadi</h2>
      <hr class="divider">
      <table class="table-detail">
        <tr>
          <th>Nama</th>
          <td>: <?= $user['name']; ?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td>: <?= $user['email']; ?></td>
        </tr>
        <tr>
          <th>NIK</th>
          <td>: <?= $user['nik']; ?></td>
        </tr>
        <tr>
          <th>Nomor Telepon</th>
          <td>: <?= $user['no_hp']; ?></td>
        </tr>
        <tr>
          <th>Alamat</th>
          <td>: <?= $user['address']; ?></td>
        </tr>
        <tr>
          <th>Jenis Kelamin</th>
          <td>: <?= $user['jenis_kelamin']; ?></td>
        </tr>
        <tr>
          <th>Begabung sejak</th>
          <td>: <?= date('H:i d-m-Y', $user['date_created']); ?></td>
        </tr>
      </table>
    </div>
    <a href="<?= base_url(); ?>complaint/get" class=" btn btn-secondary back-to-history">Kembali</a>
  </section>
</main>