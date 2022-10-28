<?php 
  if(isset($_GET['data'])){
    $id_konten = $_GET['data'];
    $_SESSION['id_konten'] = $id_konten;
  }
  $sql_kon = "SELECT `judul`, `isi`, `tanggal` FROM `konten` WHERE `id_konten` = '$id_konten'";
  $query_kon = mysqli_query($koneksi, $sql_kon);
  while($data_kon = mysqli_fetch_array($query_kon)){
    $judul = $data_kon[0];
    $isi = $data_kon[1];
    $tanggal = $data_kon[2];
  }
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Konten</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=konten">Data Konten</a></li>
              <li class="breadcrumb-item active">Detail Data Konten</li>
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
                  <a href="index.php?include=konten" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>                
                      <tr>
                        <td width="20%"><strong>Tanggal<strong></td>
                        <td width="80%"><?php echo $tanggal; ?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Judul<strong></td>
                        <td width="80%"><?php echo $judul; ?></td>
                      </tr> 
                      <tr>
                        <td width="20%"><strong>Sinopsis<strong></td>
                        <td width="80%"><?php echo $isi; ?></td>
                      </tr> 
                    </tbody>
                  </table>  
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
