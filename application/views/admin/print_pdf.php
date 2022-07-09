<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700&display=swap" rel="stylesheet">

  <title><?= $title; ?></title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      /* width: 8.27in;
      height: 11.69in;
      padding: 1cm; */
      font-family: 'Inter', sans-serif;
    }

    /* Header */
    .flex-heading {
      margin-top: 0.5cm;
    }

    .image-instansi {
      width: 2.5cm;
      padding-left: 3.5cm;
      float: left;
    }

    .wrapper-text {
      float: right;
      padding-right: 3.5cm;
    }

    .wrapper-text h1 {
      font-size: 25pt;
      text-align: center;
      margin-bottom: 0;
    }

    .wrapper-text h2 {
      font-size: 20pt;
      text-align: center;
      margin-top: -10px;
      margin-bottom: 0;
    }

    .wrapper-text p {
      font-size: 10pt;
      text-align: center;
      margin-bottom: 0;
    }

    .border-bottom {
      border-bottom: 3px solid;
      margin-top: 3.5cm;
    }

    /* Body */

    .header {
      font-size: 16pt;
      font-weight: 600;
      margin-top: 1cm;
      text-align: center;
    }

    .heading-table {
      margin-top: 0.5cm;
      padding-left: 25px;
      margin-bottom: 0;
      font-size: 12pt;
      font-weight: 700;
    }

    table {
      width: 100%;
      padding: 0 25px;
      font-size: 12pt;
    }

    th,
    td {
      padding: 5px 0;
      vertical-align: top;
      text-align: justify;
    }

    .divider {
      margin-top: 5px;
    }

    table th {
      width: 20%;
      font-weight: 600;
    }

    .text-capitalize {
      text-transform: capitalize;
    }
  </style>


</head>

<body>
  <div class="flex-heading">
    <img class="image-instansi" src="<?= base_url(); ?>assets/img/logo-daerah.png" alt="">
    <div class="wrapper-text">
      <h1 class="text-center fw-bold text-uppercase">Kabupaten Karawang</h1>
      <h2 class="text-center">Kelurahan Situdam</h2>
      <p class="text-center">Situdam, Kec. Jatisari, Kabupaten Karawang, Jawa Barat 41374</p>
    </div>
  </div>
  <div class="border-bottom"></div>
  <h2 class="header">Bukti Cetak Aduan</h2>

  <h4 class="heading-table">Data Pengirim : </h4>
  <hr class="divider">
  <table>
    <tbody>
      <tr>
        <th>Nama</th>
        <td>: <span><?= $complaint['name']; ?></span></td>
      </tr>
      <tr>
        <th>Email</th>
        <td>: <span><?= $complaint['email']; ?></span></td>
      </tr>
      <tr>
        <th>Nomor Telepon</th>
        <td>: <span><?= $complaint['no_hp']; ?></span></td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td>: <span><?= $complaint['address']; ?></span></td>
      </tr>
      <tr>
        <th>NIK</th>
        <td>: <span><?= $complaint['nik']; ?></span></td>
      </tr>
    </tbody>
  </table>

  <h4 class="heading-table mt-5">Data Aduan : </h4>
  <hr class="divider">
  <table>
    <tbody>
      <tr>
        <th>Kategori</th>
        <td>: <span><?= $complaint['categories']; ?></span></td>
      </tr>
      <tr>
        <th>Judul</th>
        <td>: <span><?= $complaint['judul']; ?></span></td>
      </tr>
      <tr>
        <th>Isi Aduan</th>
        <td>: <span><?= $complaint['body']; ?></span></td>
      </tr>
      <tr>
        <th>Status</th>
        <td class="text-capitalize">: <span><?= $complaint['status']; ?></span></td>
      </tr>
      <tr>
        <th>Dikirimkan</th>
        <td>: <span><?= $complaint['date_created']; ?></span></td>
      </tr>
      <tr>
        <th>Dicetak</th>
        <td>: <span><?= date('H:i d-m-Y'); ?></span></td>
      </tr>
    </tbody>
  </table>


</body>

</html>