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

  <title>Ini Judul</title>
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
        <td>: <span>Syeich Khalil Annbiya</span></td>
      </tr>
      <tr>
        <th>Email</th>
        <td>: <span>syeichkhalil30@gmail.com</span></td>
      </tr>
      <tr>
        <th>Nomor Telepon</th>
        <td>: <span>089892995622</span></td>
      </tr>
      <tr>
        <th>Alamat</th>
        <td>: <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Corporis, exercitationem, adipisci necessitatibus facere labore perferendis aliquid praesentium reprehenderit cupiditate voluptate, dolores explicabo sint. Modi repellendus eveniet animi sunt impedit corrupti. Illo harum, deleniti iure facilis repellendus id, hic debitis accusamus dolore architecto incidunt provident totam nemo nostrum earum quas fuga alias suscipit! Modi ullam consequuntur harum voluptates quo excepturi velit.</span></td>
      </tr>
      <tr>
        <th>NIK</th>
        <td>: <span>3215013006010005</span></td>
      </tr>
    </tbody>
  </table>

  <h4 class="heading-table mt-5">Data Aduan : </h4>
  <hr class="divider">
  <table>
    <tbody>
      <tr>
        <th>Kategori</th>
        <td>: <span>Kebakaran</span></td>
      </tr>
      <tr>
        <th>Judul</th>
        <td>: <span>Apa aja dah judul mah</span></td>
      </tr>
      <tr>
        <th>Isi Aduan</th>
        <td>: <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit, distinctio voluptas, sit voluptates modi corrupti itaque similique et delectus consequatur incidunt doloribus, tempora libero quis esse aliquid amet blanditiis praesentium nesciunt eius magnam magni? A facilis architecto magni veritatis sunt molestias officiis dolore. Dolorum, eveniet. Nobis rerum voluptas culpa natus?</span></td>
      </tr>
      <tr>
        <th>Status</th>
        <td class="">: <span>Diterima</span></td>
      </tr>
      <tr>
        <th>Dikirimkan</th>
        <td>: <span>13:21 24-06-2211</span></td>
      </tr>
      <tr>
        <th>Dicetak</th>
        <td>: <span>13:21 24-06-2211</span></td>
      </tr>
    </tbody>
  </table>


</body>

</html>