<div class="container-fluid">
  <?php if ($this->session->flashdata()) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Yeayyyy!</strong> <?= $this->session->flashdata('message'); ?>.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Tambah Kategori
  </button>

  <div class="table-responsive mt-5">
    <table class="table table-borderless">
      <thead class="thead-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Categories</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;
        foreach ($categories as $category) : ?>
          <tr>
            <th scope="row"><?= $i++; ?></th>
            <td><?= $category['categories']; ?></td>
            <td>
              <a href="<?= base_url(); ?>admin/deleteCategories/<?= $category['id']; ?>" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="POST">
            <div class="form-group">
              <label for="categories">Tambah Kategori</label>
              <input type="text" class="form-control" id="categories" name="categories" aria-describedby="emailHelp">
              <small id="emailHelp" class="form-text text-danger"><?= form_error('categories'); ?></small>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>