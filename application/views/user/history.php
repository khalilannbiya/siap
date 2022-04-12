<!-- Main -->
<main>
  <section class="section-history">
    <div class="wrapper-card__history">
      <?php $i = 1;
      foreach ($reports as $report) : ?>
        <div class="card__history">
          <h2><?= $report['judul']; ?></h2>
          <p class="status__history"><?= $report['status']; ?></p>
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
          <a href="<?= base_url(); ?>complaint/show/<?= $report['kode_unik']; ?>" class="btn btn-primary">Detail</a>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

</main>