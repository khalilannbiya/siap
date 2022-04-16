<div class="container-fluid">
  <form action="complaint/update" method="POST">
    <input type="hidden" name="id" value="<?= $complaint['id']; ?>">
    <div class="form-group">
      <label for="">Kategori</label>
      <select class="form-control" id="categories" name="categories">
        <?php foreach ($categories as $category) : ?>
          <?php if ($category === $complaint['categories']) : ?>
            <option selected value="<?= $category['categories']; ?>"><?= $category['categories']; ?></option>
          <?php else : ?>
            <option value="<?= $category['categories']; ?>"><?= $category['categories']; ?></option>
          <?php endif; ?>
        <?php endforeach; ?>
      </select>
      <small id="emailHelp" class="form-text text-danger"><?= form_error('categories'); ?></small>
    </div>
    <div class="form-group">
      <label for="judul">Judul</label>
      <input type="text" class="form-control" id="judul" name="judul" value="<?= $complaint['judul']; ?>">
      <small id="emailHelp" class="form-text text-danger"><?= form_error('judul'); ?></small>
    </div>
    <div class="form-group">
      <label for="body">Isi Aduan</label>
      <textarea class="form-control" id="body" name="body" rows="3"><?= $complaint['body']; ?></textarea>
      <small id="emailHelp" class="form-text text-danger"><?= form_error('body'); ?></small>
    </div>
    <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
  </form>
</div>