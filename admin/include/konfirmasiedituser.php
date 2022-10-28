<?php
if (isset($_SESSION['id_user'])) {
 $id_user  = $_SESSION['id_user'];
 $nama     = $_POST['nama'];
 $email    = $_POST['email'];
 $user     = $_POST['username'];
 $username = $username = mysqli_real_escape_string($koneksi, $user);
 $pass     = $_POST['password'];
 $password = mysqli_real_escape_string($koneksi, MD5($pass));
 $level    = $_POST['level'];
 //get foto
 $sql_f   = "SELECT `foto` FROM `user` WHERE `id_user`='$id_user'";
 $query_f = mysqli_query($koneksi, $sql_f);
 while ($data_f = mysqli_fetch_row($query_f)) {
  $foto = $data_f[0];
 }

 if (empty($nama)) {
  header("Location:index.php?include=edit-user&notif=tambahkosong&jenis=nama");
 } elseif (empty($email)) {
  header("Location:index.php?include=edit-user&notif=tambahkosong&jenis=email");
 } elseif (empty($username)) {
  header("Location:index.php?include=edit-user&notif=tambahkosong&jenis=username");
 } elseif (empty($password)) {
  header("Location:index.php?include=edit-user&notif=tambahkosong&jenis=password");
 } elseif (empty($level)) {
  header("Location:index.php?include=edit-user&notif=tambahkosong&jenis=level");
 } else {
  $lokasi_file = $_FILES['foto']['tmp_name'];
  $nama_file   = $_FILES['foto']['name'];
  $direktori   = 'foto/' . $nama_file;
  if (move_uploaded_file($lokasi_file, $direktori)) {
   if (!empty($foto)) {
    unlink("foto/$foto");
   }
   $sql = "UPDATE `user` set `id_user`='$id_user',`nama`='$nama',
                    `email`='$email',`username`='$username',
                    `password`='$password',`level`='$level',
                    `foto`='$nama_file' WHERE `id_user`='$id_user'";
   mysqli_query($koneksi, $sql);
  } else {
   $sql = "update `user` set `nama`='$nama', `email`='$email', `username`='$username', `password`='$password'
                    where `id_user`='$id_user'";
   //echo $sql;
   mysqli_query($koneksi, $sql);
  }
  header("Location:index.php?include=user&notif=editberhasil");
 }
}