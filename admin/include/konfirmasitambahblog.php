<?php
$id_user          = $_SESSION['id_user'];
$id_kategori_blog = $_POST['kategori_blog'];
$judul            = $_POST['judul'];
$isi              = $_POST['isi'];
if (empty($id_kategori_blog)) {
 header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=kategoriblog");
} elseif (empty($judul)) {
 header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=judul");
} elseif (empty($isi)) {
 header("Location:index.php?include=tambah-blog&notif=tambahkosong&jenis=isi");
} else {

 $sql_blog = "insert into `blog` (`id_kategori_blog`,`id_user`,`judul`,`isi`)
	values ('$id_kategori_blog','$id_user','$judul','$isi')";
 mysqli_query($koneksi, $sql_blog);
 header("Location:index.php?include=blog&notif=tambahberhasil");
}