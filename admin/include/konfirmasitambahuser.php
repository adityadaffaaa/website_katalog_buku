<?php
include "../koneksi/koneksi.php";
$nama        = $_POST['nama'];
$email       = $_POST['email'];
$user        = $_POST['username'];
$pass        = $_POST['password'];
$level       = $_POST['level'];
$username    = mysqli_real_escape_string($koneksi, $user);
$password    = mysqli_real_escape_string($koneksi, MD5($pass));
$lokasi_file = $_FILES['foto']['tmp_name'];
$nama_file   = $_FILES['foto']['name'];
$direktori   = 'foto/' . $nama_file;

if (empty($nama)) {
 header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=nama");
} elseif (empty($email)) {
 header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=email");
} elseif (empty($username)) {
 header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=username");
} elseif (empty($password)) {
 header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=password");
} elseif (empty($level)) {
 header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=level");
} elseif (!move_uploaded_file($lokasi_file, $direktori)) {
 header("Location:index.php?include=tambah-user&notif=tambahkosong&jenis=foto");
} else {
 $sql_user = "INSERT INTO `user`
(`nama`, `email`,`username`,`password`,`level`,`foto`)
VALUES ('$nama','$email','$username','$password','$level','$nama_file')";
 mysqli_query($koneksi, $sql_user);
 $id_user = mysqli_insert_id($koneksi);
 header("Location:index.php?include=user&notif=tambahberhasil");
}