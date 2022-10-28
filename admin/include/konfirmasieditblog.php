<?php
session_start();
include '../koneksi/koneksi.php';
if (isset($_SESSION['id_blog'])) {
 $id_blog          = $_SESSION['id_blog'];
 $id_kategori_blog = $_POST['kategori_blog'];
 $judul            = $_POST['judul'];
 $isi              = $_POST['isi'];
 if (empty($id_kategori_blog)) {
  header("Location:index.php?include=edit-blog&data=$id_blog&notif=editkosong&jenis=kategoriblog");
 } elseif (empty($judul)) {
  header("Location:index.php?include=edit-blog&data=$id_blog&notif=editkosong&jenis=judul");
 } elseif (empty($isi)) {
  header("Location:index.php?include=edit-blog&data=$id_blog&notif=editkosong&jenis=isi");
 } else {
  $sql_blog = "UPDATE `blog` SET `id_kategori_blog` = $id_kategori_blog,
  `judul` = '$judul',
  `isi` = '$isi'
  WHERE `id_blog` = $id_blog";
  mysqli_query($koneksi, $sql_blog);
  header("Location:index.php?include=blog&notif=editberhasil");
 }
}