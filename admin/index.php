<?php
session_start();
include "../koneksi/koneksi.php";
if (isset($_GET["include"])) {
 $include = $_GET["include"];
 if ($include == "konfirmasi-login") {
  include "include/konfirmasilogin.php";
 } elseif ($include == "signout") {
  include "include/signout.php";
 } elseif ($include == "konfirmasi-edit-profil") {
  include "include/konfirmasieditprofil.php";
 } elseif ($include == "konfirmasi-tambah-kategori-buku") {
  include "include/konfirmasitambahkategoribuku.php";
 } elseif ($include == "konfirmasi-edit-kategori-buku") {
  include "include/konfirmasieditkategoribuku.php";
 } elseif ($include == "konfirmasi-tambah-tag") {
  include "include/konfirmasitambahtag.php";
 } elseif ($include == "konfirmasi-edit-tag") {
  include "include/konfirmasiedittag.php";
 } elseif ($include == "konfirmasi-tambah-penerbit") {
  include "include/konfirmasitambahpenerbit.php";
 } elseif ($include == "konfirmasi-edit-penerbit") {
  include "include/konfirmasieditpenerbit.php";
 } elseif ($include == "konfirmasi-tambah-kategori-blog") {
  include "include/konfirmasitambahkategoriblog.php";
 } elseif ($include == "konfirmasi-edit-kategori-blog") {
  include "include/konfirmasieditkategoriblog.php";
 } elseif ($include == "konfirmasi-edit-konten") {
  include "include/konfirmasieditkonten.php";
 } elseif ($include == "konfirmasi-ubah-password") {
  include "include/konfirmasiubahpassword.php";
 } elseif ($include == "konfirmasi-tambah-buku") {
  include "include/konfirmasitambahbuku.php";
 } elseif ($include == "konfirmasi-edit-buku") {
  include "include/konfirmasieditbuku.php";
 } elseif ($include == "konfirmasi-tambah-blog") {
  include "include/konfirmasitambahblog.php";
 } elseif ($include == "konfirmasi-edit-blog") {
  include "include/konfirmasieditblog.php";
 } elseif ($include == "konfirmasi-tambah-user") {
  include "include/konfirmasitambahuser.php";
 } elseif ($include == "konfirmasi-edit-user") {
  include "include/konfirmasiedituser.php";
 }
}
?>

<!DOCTYPE html>
<html>

<head>
  <?php include "includes/head.php" ?>
</head>

<body>
  <?php
//cek ada get include
if (isset($_GET["include"])) {
 $include = $_GET["include"];
 //cek apakah ada session id admin
 if (isset($_SESSION['id_user'])) {
  ?>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include "includes/header.php" ?>
      <?php include "includes/sidebar.php" ?>
      <div class="content-wrapper">
        <?php
if ($include == "kategori-buku") {
   include "include/kategoribuku.php";
  } elseif ($include == "tambah-kategori-buku") {
   include "include/tambahkategoribuku.php";
  } elseif ($include == "profil") {
   include "include/profil.php";
  } elseif ($include == "edit-profil") {
   include "include/editprofil.php";
  } elseif ($include == "edit-kategori-buku") {
   include "include/editkategoribuku.php";
  } elseif ($include == "tag") {
   include "include/tag.php";
  } elseif ($include == "tambah-tag") {
   include "include/tambahtag.php";
  } elseif ($include == "edit-tag") {
   include "include/edittag.php";
  } elseif ($include == "penerbit") {
   include "include/penerbit.php";
  } elseif ($include == "tambah-penerbit") {
   include "include/tambahpenerbit.php";
  } elseif ($include == "edit-penerbit") {
   include "include/editpenerbit.php";
  } elseif ($include == "kategori-blog") {
   include "include/kategoriblog.php";
  } elseif ($include == "tambah-kategori-blog") {
   include "include/tambahkategoriblog.php";
  } elseif ($include == "edit-kategori-blog") {
   include "include/editkategoriblog.php";
  } elseif ($include == "konten") {
   include "include/konten.php";
  } elseif ($include == "detail-konten") {
   include "include/detailkonten.php";
  } elseif ($include == "edit-konten") {
   include "include/editkonten.php";
  } elseif ($include == "ubah-password") {
   include "include/ubahpassword.php";
  } elseif ($include == "buku") {
   include "include/buku.php";
  } elseif ($include == "tambah-buku") {
   include "include/tambahbuku.php";
  } elseif ($include == "edit-buku") {
   include "include/editbuku.php";
  } elseif ($include == "detail-buku") {
   include "include/detailbuku.php";
  } elseif ($include == "blog") {
   include "include/blog.php";
  } elseif ($include == "tambah-blog") {
   include "include/tambahblog.php";
  } elseif ($include == "edit-blog") {
   include "include/editblog.php";
  } elseif ($include == "detail-blog") {
   include "include/detailblog.php";
  } elseif ($include == "user") {
   include "include/user.php";
  } elseif ($include == "tambah-user") {
   include "include/tambahuser.php";
  } elseif ($include == "edit-user") {
   include "include/edituser.php";
  } elseif ($include == "detail-user") {
   include "include/detailuser.php";
  } else {
   include "include/profil.php";
  }
  ?>
      </div>
      <!-- /.content-wrapper -->
      <?php include "includes/footer.php" ?>
    </div>
    <!-- ./wrapper -->
    <?php include "includes/script.php" ?>
  </body>
  <?php
} else {
  //pemanggilan halaman form login
  include "include/login.php";
 }
} else {
 if (isset($_SESSION['id_user'])) {
  //pemanggilan ke halaman-halaman profil jika ada session ?>

  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
      <?php include "includes/header.php" ?>
      <?php include "includes/sidebar.php" ?>
      <div class="content-wrapper">
        <?php
//pemanggilan profil
  include "include/profil.php";
  ?>
      </div>
      <!-- /.content-wrapper -->
      <?php include "includes/footer.php" ?>
    </div>
    <!-- ./wrapper -->
    <?php include "includes/script.php" ?>
  </body>
  <?php
} else {
  //pemanggilan halaman form login
  include "include/login.php";
 }
}
?>





</body>

</html>