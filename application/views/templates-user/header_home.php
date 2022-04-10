<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Styling -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style-user.css" />

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />

  <!-- Icon Bootsrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />

  <!-- Remixicon -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />

  <!-- ========= favicon ========= -->
  <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/favicon.png" type="image/x-icon" />

  <title>SIAP | <?= $title; ?></title>
</head>

<body>
  <!-- ======================= Navbar ======================= -->
  <header>
    <nav class="nav-bar">
      <div class="logo">
        <a href="#">
          <img src="<?= base_url(); ?>assets/img/logo-siap.png" alt="Logo SIAP" />
        </a>
      </div>
      <ul class="nav-links">
        <li>
          <a href="#welcoming-section">Beranda</a>
        </li>
        <li>
          <a href="#section-statistik">Statistik</a>
        </li>
        <li>
          <a href="#about-us">Tentang Kami</a>
        </li>
        <li class="btn-nav">
          <a href="<?= base_url(); ?>auth/registration" class="btn-regis">Daftar</a>
        </li>
        <li class="btn-nav">
          <a href="<?= base_url(); ?>auth" class="btn-login">Masuk</a>
        </li>
      </ul>
      <div class="nav-btn">
        <a href="<?= base_url(); ?>auth/registration" class="btn-regis">Daftar</a>
        <a href="<?= base_url(); ?>auth" class="btn-login ms-2">Masuk</a>
      </div>
      <div class="menu-toggle">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>
      </div>
    </nav>
  </header>