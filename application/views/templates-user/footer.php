<footer id="footer-user">
  <div class="flex-footer">
    <div class="identitas">
      <img src="<?= base_url(); ?>assets/img/logo-siap.png" alt="Logo siap" />
      <address>Situdam, Jatisari, Situdam, Kec. Jatisari, Kabupaten Karawang, Jawa Barat 41374</address>
    </div>
    <div class="links">
      <h2>Useful Links</h2>
      <?php if ($session_cek) : ?>
        <ul>
          <li>
            <i class="ri-arrow-right-s-fill"></i>
            <a href="<?= base_url(); ?>user">Beranda</a>
          </li>
          <li>
            <i class="ri-arrow-right-s-fill"></i>
            <a href="#section-statistik">Buat aduan</a>
          </li>
          <li>
            <i class="ri-arrow-right-s-fill"></i>
            <a href="#about-us">Riwayat</a>
          </li>
          <li>
            <i class="ri-arrow-right-s-fill"></i>
            <a href="#uniccode-search-section">My Profile</a>
          </li>
        </ul>
      <?php else : ?>
        <ul>
          <li>
            <i class="ri-arrow-right-s-fill"></i>
            <a href="#welcoming-section">Beranda</a>
          </li>
          <li>
            <i class="ri-arrow-right-s-fill"></i>
            <a href="#section-statistik">Statistik</a>
          </li>
          <li>
            <i class="ri-arrow-right-s-fill"></i>
            <a href="#about-us">Tentang Kami</a>
          </li>
          <li>
            <i class="ri-arrow-right-s-fill"></i>
            <a href="#uniccode-search-section">Lacak Aduan</a>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </div>
  <h6>Copyright © <strong>Siap</strong>. All Rights Reserved</h6>
</footer>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>assets/js/app.js"></script>
</body>

</html>