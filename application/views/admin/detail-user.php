<div class="container-fluid">
  <div class="row">
    <h2>Detail User</h2>
  </div>

  <div class="row mt-5">
    <h4>Data User</h4>
  </div>

  <table class="table table-borderless">
    <tbody>
      <tr>
        <th>Nama</th>
        <td>: <?= $user['name']; ?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td>: <?= $user['email']; ?></td>
      </tr>
      <tr>
        <th>Jenis Kelamin</th>
        <td>: <?= $user['jenis_kelamin']; ?></td>
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
        <th>Bergabung Sejak</th>
        <td>: <?= date('H:i d-m-Y', $user['date_created']); ?></td>
      </tr>
    </tbody>
  </table>
</div>