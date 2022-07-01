<div class="container-fluid">

  <?php if ($this->session->flashdata()) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Yeayyyy!</strong> <?= $this->session->flashdata('message'); ?>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data User</h1>
  </div>

  <div class="row-sm mb-4">
    <form action="<?= base_url(); ?>admin/user" method="POST">
      <div class="input-group mb-3">
        <input type="text" name="pencarian" class="form-control" placeholder="Masukkan kata kunci..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit" name="cari" id="button-addon2">Cari</button>
        </div>
      </div>
    </form>
  </div>

  <div class="table-responsive-xl">
    <table class="table table-striped table-borderless table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Nomor Telepon</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($users) : ?>
          <?php $i = 1;
          foreach ($users as $user) : ?>
            <tr>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $user['name']; ?></td>
              <td><?= $user['email']; ?></td>
              <td><?= $user['no_hp']; ?></td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    Menu
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item text-primary font-weight-bold" href="<?= base_url(); ?>admin/detailUser/<?= $user['id_user']; ?>">Detail</a>
                    <a class="dropdown-item text-danger font-weight-bold" href="<?= base_url(); ?>admin/deleteUser/<?= $user['id_user']; ?>">Hapus</a>
                  </div>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <div class="alert alert-danger" role="alert">
            Yahhhhhh, data nya belum ada!
          </div>
        <?php endif; ?>
      </tbody>
    </table>
  </div>


</div>