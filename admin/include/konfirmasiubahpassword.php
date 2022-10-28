<?php
if(isset($_SESSION['id_user'])){
$id_user = $_SESSION['id_user'];
$pwlama = $_POST['pwlama'];
$passlama = mysqli_escape_string($koneksi, MD5($pwlama));
$pwbaru = $_POST['pwbaru'];
$passbaru = mysqli_escape_string($koneksi, MD5($pwbaru));
$konfirmasipwbaru = $_POST['konfirmasipwbaru'];
$konfirmasipassbaru = mysqli_escape_string($koneksi, MD5($konfirmasipassbaru));


if(empty($pwlama)){
  header("Location:index.php?include=ubah-password&notif=editkosong&jenis=Password lama harus diisi");
} else if(empty($pwbaru)){
  header("Location:index.php?include=ubah-password&notif=editkosong&jenis=Password baru harus diisi");
} else if(empty($konfirmasipwbaru)){
  header("Location:index.php?include=ubah-password&notif=editkosong&jenis=Konfirmasi password baru harus diisi");
}else {
  $sql_pwlama = "SELECT * FROM `user` WHERE `password` = '$passlama'  AND `id_user` = $id_user ";
  $query_pwlama = mysqli_query($koneksi, $sql_pwlama);
  if(mysqli_num_rows($query_pwlama)===1){
    if($pwbaru == $konfirmasipwbaru){
      $sql_pwbaru = "UPDATE `user` SET `password` = '$passbaru' WHERE `id_user`= $id_user ";
      mysqli_query($koneksi, $sql_pwbaru);
    header("Location:index.php?include=ubah-password&notif=editberhasil");
    }else{
    header("Location:index.php?include=ubah-password&notif=editkosong&jenis=Konfirmasi password salah");
    }
  }else{
    header("Location:index.php?include=ubah-password&notif=editkosong&jenis=Password lama salah");
  }

}
}


?>