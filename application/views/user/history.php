<!-- Main -->
<main>
  <section class="section-history">
    <div class="wrapper-search__history">
      <form action="<?= base_url(); ?>complaint/get" method="POST">
        <div class="input-group ">
          <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Cari..." aria-label="Recipient's username" aria-describedby="button-addon2">
          <button class="btn-search" type="submit" name="cari" id="button-addon2">Cari</button>
        </div>
      </form>
    </div>
    <div class="wrapper-card__history">
      <?php $i = 1;
      foreach ($reports as $report) : ?>
        <div class="card__history">
          <h2><?= $report['judul']; ?></h2>
          <?php if ($report['status'] == 'diterima') : ?>
            <p class="status__history approved-complaint"><?= $report['status']; ?></p>
          <?php elseif ($report['status'] == 'diproses') : ?>
            <p class="status__history onprocess-complaint"><?= $report['status']; ?></p>
          <?php else : ?>
            <p class="status__history done-complaint"><?= $report['status']; ?></p>
          <?php endif; ?>
          <div class="icon__history mt-4">
            <i class="ri-attachment-2"></i>
            <p><?= $report['categories']; ?></p>
          </div>
          <div class="icon__history">
            <i class="ri-barcode-line"></i>
            <p><?= $report['kode_unik']; ?></p>
          </div>
          <div class="icon__history">
            <i class="ri-time-line"></i>
            <p>Dikirim : <span><?= date('H:i d-m-Y', $report['date_created']); ?></span></p>
          </div>
          <div class="flex-button__history">
            <a href="<?= base_url(); ?>complaint/show/<?= $report['kode_unik']; ?>" class="btn-detail">Detail</a>
            <a href="<?= base_url(); ?>complaint/print/<?= $report['kode_unik']; ?>" class="btn-print">Cetak</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

</main>