<?php
if (isset($_GET['data'])) {
 $id_tag    = $_GET['data'];
 $sql_tag   = "SELECT `tag` FROM `tag` WHERE `id_tag` = $id_tag";
 $query_tag = mysqli_query($koneksi, $sql_tag);
 $data_tag  = mysqli_fetch_row($query_tag);
 $tag       = $data_tag[0];
}
?>
<section id="blog-header">
  <div class="container">
    <h1 class="text-white">DAFTAR BUKU</h1>
  </div>
</section><br><br>

<section id="katalog-item">
  <main role="main" class="container">
    <h2 class="text-primary">TAG: <?php echo $tag ?></h2><br><br>
    <div class="row">
      <div class="col-md-9 katalog-main">
        <div class="row">
          <?php
          $sql_buku_tag = "SELECT `b`.`id_buku`, `b`.`judul`,`b`.`cover`, `p`.`penerbit`
          FROM `tag_buku` `tb` 
          JOIN `buku` `b` ON `tb`.`id_buku` = `b`.`id_buku`
          JOIN `penerbit` `p` ON `b`.`id_penerbit` = `p`.`id_penerbit`
          WHERE `tb`.`id_tag` = $id_tag";
          $query_buku_tag = mysqli_query($koneksi, $sql_buku_tag);
          while($data_buku_tag = mysqli_fetch_row($query_buku_tag)){
            $id_buku = $data_buku_tag[0];
            $judul = $data_buku_tag[1];
            $cover = $data_buku_tag[2];
            $penerbit = $data_buku_tag[3];
          
          ?>
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <img src="admin/cover/<?php echo $cover ?>" class="img-fluid" alt="Books Collection" title="Books">
              <div class="card-body bg-warning">
                <p class="card-text"><?php echo $judul ?></p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="index.php?include=detail-buku&data=<?php echo $id_buku ?>"
                      class="btn btn-primary stretched-link">Detail</a>
                  </div>
                  <small class="text-muted"><?php echo $penerbit ?></small>
                </div>
              </div>
            </div>
          </div>
          <?php }?>
          <div class="col-sm-12">
            <nav aria-label="Page navigation">
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href=""><strong>first</strong></a></li>
                <li class="page-item"><a class="page-link" href="">1</a></li>
                <li class="page-item active"><a class="page-link" href="">2</a></li>
                <li class="page-item"><a class="page-link" href="">3</a></li>
                <li class="page-item"><a class="page-link" href=""><strong>last</strong></a></li>
              </ul>
            </nav>
          </div>

        </div><!-- .row-->
      </div><!-- /.katalog-main -->

      <aside class="col-md-3 katalog-sidebar">

        <div class="pl-4 pb-4">
          <h4 class="font-italic">Kategori</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">Umum</a></li>
            <li><a href="#">PHP</a></li>
            <li><a href="#">Java</a></li>
            <li><a href="#">Database</a></li>
            <li><a href="#">Techno</a></li>
        </div>

        <div class="p-4">
          <h4 class="font-italic">Tag</h4>
          <ol class="list-unstyled">
            <li><a href="#">PHP</a></li>
            <li><a href="#">MySQL</a></li>
            <li><a href="#">Javascript</a></li>
          </ol>
        </div>
      </aside> <!-- /.katalog-sidebar -->

    </div><!-- /.row -->
  </main><!-- /.container -->
</section><br><br>