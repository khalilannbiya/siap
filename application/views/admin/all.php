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
    <h1 class="h3 mb-0 text-gray-800">Semua Data Aduan</h1>
  </div>

  <div class="row-sm mb-4">
    <form action="<?= base_url(); ?>complaint" method="POST">
      <div class="input-group mb-3">
        <input type="text" name="keyword" class="form-control" placeholder="Masukkan kata kunci..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
        </div>
      </div>
    </form>
  </div>

  <div class="row justify-content-center mb-4">
    <a href="<?= base_url(); ?>complaint" class="col-md-2 mr-3 mt-2 btn btn-primary">Semua</a>
    <a href="<?= base_url(); ?>complaint/index/diterima" class="col-md-2 mr-3 mt-2 btn btn-success">Diterima</a>
    <a href="<?= base_url(); ?>complaint/index/diproses" class="col-md-2 mr-3 mt-2 btn btn-warning">Diproses</a>
    <a href="<?= base_url(); ?>complaint/index/selesai" class="col-md-2 mr-3 mt-2 btn btn-danger">Selesai</a>
  </div>

  <div class="table-responsive-xl">
    <table class="table table-striped table-borderless table-hover">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Kategori</th>
          <th scope="col">Status</th>
          <th scope="col">Waktu dikirim</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($complaints) : ?>
          <?php $i = 1;
          foreach ($complaints as  $complaint) : ?>
            <?php if ($complaint['status'] == 'diterima') : ?>
              <tr class="table-success font-weight-bold">
              <?php elseif ($complaint['status'] == 'diproses') : ?>
              <tr class="table-warning font-weight-bold">
              <?php else : ?>
              <tr class="table-danger font-weight-bold">
              <?php endif; ?>
              <th scope="row"><?= $i++; ?></th>
              <td><?= $complaint['name']; ?></td>
              <td><?= $complaint['categories']; ?></td>
              <?php if ($complaint['status'] == 'diterima') : ?>
                <td class="text-capitalize text-success font-weight-bold"><?= $complaint['status']; ?></td>
              <?php elseif ($complaint['status'] == 'diproses') : ?>
                <td class="text-capitalize text-warning font-weight-bold"><?= $complaint['status']; ?></td>
              <?php else : ?>
                <td class="text-capitalize text-danger font-weight-bold"><?= $complaint['status']; ?></td>
              <?php endif; ?>
              <td><?= date('d-m-Y', $complaint['date_created']); ?></td>
              <td>
                <div class="dropdown">
                  <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                    Menu
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item text-info font-weight-bold" href="<?= base_url(); ?>admin/print/<?= $complaint['kode_unik']; ?>">Cetak</a>
                    <a class="dropdown-item text-primary font-weight-bold" href="<?= base_url(); ?>admin/detailAduan/<?= $complaint['kode_unik']; ?>">Detail</a>
                    <a class="dropdown-item text-danger font-weight-bold" href="<?= base_url(); ?>admin/hapusAduan/<?= $complaint['kode_unik']; ?>">Hapus</a>
                    <a class="dropdown-item text-success font-weight-bold" href="<?= base_url(); ?>complaint/update/<?= $complaint['kode_unik']; ?>">Ubah</a>
                    <?php if ($complaint['status'] == "diterima") : ?>
                      <hr class="dropdown-divider">
                      <a class="dropdown-item text-warning font-weight-bold" href="<?= base_url(); ?>admin/process/<?= $complaint['kode_unik']; ?>">Proses</a>
                    <?php elseif ($complaint['status'] == "diproses") : ?>
                      <hr class="dropdown-divider">
                      <a class="dropdown-item text-danger font-weight-bold" href="<?= base_url(); ?>admin/selesai/<?= $complaint['kode_unik']; ?>">Selesai</a>
                    <?php else : ?>

                    <?php endif; ?>
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