<?php
if (isset($_GET['data'])) {
 $id_buku             = $_GET['data'];
 $_SESSION['id_buku'] = $id_buku;

 $sql_d = "SELECT `b`.`cover`, `k`.`kategori_buku`, `b`.`judul`, `b`.`pengarang`, `b`.`tahun_terbit`,`b`.`sinopsis`
  FROM `buku` `b`
  JOIN `kategori_buku` `k` ON `b`.`id_kategori_buku` = `k`.`id_kategori_buku`
  WHERE `b`.`id_buku` = $id_buku";
 $query_d = mysqli_query($koneksi, $sql_d);
 while ($data_d = mysqli_fetch_row($query_d)) {
  $cover         = $data_d[0];
  $kategori_buku = $data_d[1];
  $judul         = $data_d[2];
  $pengarang     = $data_d[3];
  $tahun_terbit  = $data_d[4];
  $isi           = $data_d[5];
 }
}
?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-user-tie"></i> Detail Data Buku</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item"><a href="index.php?include=buku">Data Buku</a></li>
          <li class="breadcrumb-item active">Detail Data Buku</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
  <div class="card">
    <div class="card-header">
      <div class="card-tools">
        <a href="index.php?include=buku" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td><strong>Cover Buku<strong></td>
            <td><img src="cover/<?php echo $cover ?>" class="img-fluid" width="200px;"></td>
          </tr>
          <tr>
            <td width="20%"><strong>Kategori Buku<strong></td>
            <td width="80%"><?php echo $kategori_buku ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Judul<strong></td>
            <td width="80%"><?php echo $judul ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Pengarang<strong></td>
            <td width="80%"><?php echo $pengarang ?></td>
          </tr>
          <tr>
            <td width="20%"><strong>Tahun Terbit<strong></td>
            <td width="80%"><?php echo $tahun_terbit ?></td>
          </tr>
          <tr>
            <td><strong>Tag<strong></td>
            <td>
              <ul><?php
$sql_d = "SELECT `t`.`tag`
                            FROM tag_buku `tb`
                            JOIN buku `b` ON `tb`.`id_buku` = `b`.`id_buku`
                            JOIN tag `t` ON `tb`.`id_tag` = `t`.`id_tag`
                            JOIN kategori_buku k ON `b`.`id_kategori_buku` = `k`.`id_kategori_buku`
                            WHERE `b`.`id_buku` = $id_buku ";
$query_d = mysqli_query($koneksi, $sql_d);
while ($data_d = mysqli_fetch_row($query_d)) {
 $tag = $data_d[0];
 ?>
                <li><?php echo $tag ?></li>
                <?php } ?>

              </ul>
            </td>
          </tr>
          <tr>
            <td width="20%"><strong>Sinopsis<strong></td>
            <td width="80%"><?php echo $isi ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">&nbsp;</div>
  </div>
  <!-- /.card -->

</section>