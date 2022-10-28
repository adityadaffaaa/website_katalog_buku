<?php
class cariKategoriBuku{
 public $katakunci;
public $no;
public $id_kategori_buku;
public $kategori_buku;
public function CariaKategoriBuku($katakunci){
  include("../koneksi/koneksi.php");
  $sql = "SELECT `id_kategori_buku`,`kategori_buku` FROM `kategori_buku` WHERE `kategori_buku` LIKE '%$katakunci%'";
  $query_cari = mysqli_query($koneksi, $sql);
  $no = 1;
  while($data_k = mysqli_fetch_row($query_cari)){
      $id_kategori_buku = $data_k[0];
      $kategori_buku = $data_k[1];
    }
}
}

?>