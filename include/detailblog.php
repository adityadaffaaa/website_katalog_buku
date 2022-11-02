<?php
if (isset($_GET['data'])) {
 $id_blog  = $_GET['data'];
 $_SESSION = ['id_blog'];
}

$sql_dblog = "SELECT `k`.`kategori_blog`, `u`.`nama`, DATE_FORMAT(`b`.`tanggal`,'%M %d, %Y'), `b`.`judul`, `b`.`isi`
FROM `blog` `b`
JOIN `kategori_blog` `k` ON `b`.`id_kategori_blog` = `k`.`id_kategori_blog`
JOIN `user` `u` ON `b`.`id_user` = `u`.`id_user`
WHERE `b`.`id_blog` = $id_blog";
$query_dblog = mysqli_query($koneksi, $sql_dblog);
while ($data_dblog = mysqli_fetch_row($query_dblog)) {
 $kategori_blog = $data_dblog[0];
 $nama          = $data_dblog[1];
 $tanggal       = $data_dblog[2];
 $judul         = $data_dblog[3];
 $isi           = $data_dblog[4];
}
?>

<section id="blog-header">
  <div class="container">
    <h1 class="text-white">BLOG</h1>
  </div>
</section><br><br>
<section id="blog-list">
  <main role="main" class="container">
    <div class="row">
      <div class="col-md-9 blog-main">
        <div class="blog-post">
          <h2 class="blog-post-title"><?php echo $judul ?></h2>
          <p class="blog-post-meta"><?php echo $tanggal ?> <a href="#"><?php echo $nama ?></a></p>

          <p>This blog post shows a few different types of content that’s supported and styled with Bootstrap. Basic
            typography, images, and code are all supported.</p>
          <hr>
          <p>Cum sociis natoque penatibus et magnis <a href="#">dis parturient montes</a>, nascetur ridiculus mus.
            Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est
            at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>
          <blockquote>
            <p>Curabitur blandit tempus porttitor. <strong>Nullam quis risus eget urna mollis</strong> ornare vel eu
              leo. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
          </blockquote>
          <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum.
            Aenean lacinia bibendum nulla sed consectetur.</p>
          <h2>Heading</h2>
          <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus,
            nisi erat porttitor ligula, eget lacinia odio sem nec elit. Morbi leo risus, porta ac consectetur ac,
            vestibulum at eros.</p>
          <h3>Sub-heading</h3>
          <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
          <pre><code>Example code block</code></pre>
          <p>Aenean lacinia bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce
            dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
          <h3>Sub-heading</h3>
          <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aenean lacinia
            bibendum nulla sed consectetur. Etiam porta sem malesuada magna mollis euismod. Fusce dapibus, tellus ac
            cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <ul>
            <li>Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</li>
            <li>Donec id elit non mi porta gravida at eget metus.</li>
            <li>Nulla vitae elit libero, a pharetra augue.</li>
          </ul>
          <p>Donec ullamcorper nulla non metus auctor fringilla. Nulla vitae elit libero, a pharetra augue.</p>
          <ol>
            <li>Vestibulum id ligula porta felis euismod semper.</li>
            <li>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</li>
            <li>Maecenas sed diam eget risus varius blandit sit amet non magna.</li>
          </ol>
          <p>Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>
        </div><br><br><!-- /.blog-post -->

      </div><!-- /.blog-main -->

      <aside class="col-md-3 blog-sidebar">
        <div class="p-4">
          <h4 class="font-italic">Categories</h4>
          <ol class="list-unstyled mb-0">
            <?php
$sql_dkat   = "SELECT `id_kategori_blog`, `kategori_blog` FROM `kategori_blog` ORDER BY `kategori_blog`";
$query_dkat = mysqli_query($koneksi, $sql_dkat);
while ($data_kat = mysqli_fetch_row($query_dkat)) {
 $id_kat_blog = $data_kat[0];
 $kat         = $data_kat[1];
 ?>
            <li><a href="index.php?include=detail-blog-kategori&data=<?php echo $id_kat_blog ?>"><?php echo $kat ?></a>
            </li>
            <?php } ?>
        </div>

        <div class="p-4">
          <h4 class="font-italic">Archives</h4>
          <ol class="list-unstyled mb-0">
            <li><a href="#">March 2014</a></li>
            <li><a href="#">February 2014</a></li>
            <li><a href="#">January 2014</a></li>
            <li><a href="#">December 2013</a></li>
            <li><a href="#">November 2013</a></li>
            <li><a href="#">October 2013</a></li>
            <li><a href="#">September 2013</a></li>
            <li><a href="#">August 2013</a></li>
            <li><a href="#">July 2013</a></li>
            <li><a href="#">June 2013</a></li>
            <li><a href="#">May 2013</a></li>
            <li><a href="#">April 2013</a></li>
          </ol>
        </div>


      </aside><!-- /.blog-sidebar -->

    </div><!-- /.row -->

  </main><!-- /.container -->
</section><br><br>