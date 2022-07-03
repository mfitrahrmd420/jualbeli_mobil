<?php
//error_reporting(0);
session_start();
include '../core/core.php';

if(!isset($_SESSION['username'])) {
  header("Location: ../admin/login.php?access_denied");
}
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kredit Mobil - Mudah dan Cepat</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="Unique - Responsive vCard Template" />
  <meta name="keywords" content="vcard, resposnive, retina, resume, jquery, css3, bootstrap, Unique, portfolio" />
  <meta name="author" content="lmtheme" />
  <link rel="shortcut icon" href="favicon.ico">

  <link rel="stylesheet" href="../css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="../css/normalize.css" type="text/css">
  <link rel="stylesheet" href="../css/animate.css" type="text/css">
  <link rel="stylesheet" href="css/transition-animations.css" type="text/css">
  <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.min.css" type="text/css">
  <link rel="stylesheet" href="../css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="../css/main-red.css" type="text/css">

  <!-- This styles needs for demo -->
  <link rel="stylesheet" href="../preview/lmpixels-demo-panel.css" type="text/css">
</head>

<body>
  <div id="page" class="page">

    <!-- Main Content -->
    <div id="main" class="site-main2">
      <!-- Page changer wrapper -->
      <div class="pt-wrapper" style="background-image: url(../images/bg.png);">
        <!-- Subpages -->
        <div class="subpages">

          <section class="pt-page pt-page-5" data-id="contact">
            <div class="border-block-top-110"></div>
            <div class="section-inner">
              <div class="section-title-block">
                <div class="section-title-wrapper">
                  <h2 class="section-title">Page Barang</h2>
                  <h5 class="section-description">Kredit Mobil</h5>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-12 col-md-12 subpage-block">

                  <?php
                 // include '../core/core.php';

                  if(!isset($_SESSION['username'])) {
                    header("Location:../admin/login.php?access_denied");
                  }

                  // kalau tidak ada id di query string
                  if( !isset($_GET['id']) ){
                    header('Location:../admin/page-index2.php#barang');
                  }

                  //ambil id dari query string
                  $id = $_GET['id'];

                  // buat query untuk ambil data dari database
                  $sql = "SELECT * FROM barang WHERE id = $id";
                  $query = mysqli_query($connect, $sql);
                  $data = mysqli_fetch_assoc($query);

                  // jika data yang di-edit tidak ditemukan
                  if( mysqli_num_rows($query) < 1 ){
                    die("data tidak ditemukan...");
                  }

                  ?>
                  <form id="contact-form" method="post" action="../admin/edit-brg.php">

                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                
                    <div class="col-md-6">
                        
                        
                      <div class="form-group m-b-0">
                        <h5><b>Nama Resmi Produk</b></h5>
                        <input type=text class="form-control" value="<?php echo $data['nama_produk'] ?>" name="nm" data-style="btn-primary btn-custom">
                      </div>

                      <div class="form-group m-b-0">
                        <h5><b>Harga Produk</b></h5>
                        <input type=text class="form-control" value="<?php echo $data['harga'] ?>" name="hrg" data-style="btn-primary btn-custom">
                                         </div>

                      <div class="form-group m-b-0">
                        <h5><b>Potongan Harga  </b></h5>
                        <input type=text class="form-control" value="<?php echo $data['potongan'] ?>" name="potongan" data-style="btn-primary btn-custom">
                          
                       
                      </div>


                      <input type="submit" class="button btn-send" name="edit_brg" value="Perbarui">
                      <input type='button' class='btn btn-primary' value='Kembali' onclick='history.back(-1)'>  </button>

                  </div>
                  
                  <div class="col-md-6">


                      <div class="form-group m-b-0">
                        <h5><b>Kategori Produk</b></h5>
                        <input type=text class="form-control" value="<?php echo $data['kategori'] ?>" name="ktg" data-style="btn-primary btn-custom">
                   
                      </div>

                      <div class="form-group m-b-0">
                        <h5><b>Stok Produk</b></h5>
                        <?php $stok = $data['stok']; ?>
                        <select class="form-control" name="stk" data-style="btn-primary btn-custom">
                          <option <?php echo ($stok == 'Stok') ?"selected":"" ?>> Stok</option>
                          <option <?php echo ($stok == '1') ?"selected":"" ?>> 1</option>
                          <option <?php echo ($stok == '2') ?"selected":"" ?>> 2</option>
                          <option <?php echo ($stok == '3') ?"selected":"" ?>> 3</option>
                          <option <?php echo ($stok == '4') ?"selected":"" ?>> 4</option>
                          <option <?php echo ($stok == '5') ?"selected":"" ?>> 5</option>
                          <option <?php echo ($stok == '6') ?"selected":"" ?>> 6</option>
                          <option <?php echo ($stok == '7') ?"selected":"" ?>> 7</option>
                          <option <?php echo ($stok == '8') ?"selected":"" ?>> 8</option>
                          <option <?php echo ($stok == '9') ?"selected":"" ?>> 9</option>
                          <option <?php echo ($stok == '10') ?"selected":"" ?>> 10</option>
                        </select>
                      </div>

                      <div class="form-group m-b-0">
                        <h5><b>Kode Barang</b></h5>
                        <input type=text class="form-control" value="<?php echo $data['kode_barang'] ?>" name="kb" data-style="btn-primary btn-custom">
                   
                      </div>
                      
                      
                      <div class="form-group m-b-0">
                        <h5><b>Deskripsi  </b></h5>
                        <textarea class="form-control" cols=6 rows=3 name="deskripsi" data-style="btn-primary btn-custom">
                             <?php echo $data['deskripsi'] ?> 
                        </textarea>
                          
                      </div>
                      
                      
                  </div>
                  
                  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
    </div>
    <!-- /Page changer wrapper -->
  </div>
  <!-- /Main Content -->
  <!-- Contact Subpage -->

  <!-- End Contact Subpage -->

  <!-- /Main Content -->
</div>
</div>

<script src="../js/bootstrap.min.js"></script>
<script src="../js/pages-switcher.js"></script>
<script src="../js/imagesloaded.pkgd.min.js"></script>
<script src="../js/validator.js"></script>
<script src="../js/jquery.shuffle.min.js"></script>
<script src="../js/masonry.pkgd.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../js/tilt.jquery.min.js"></script>
<script src="../js/jquery.hoverdir.js"></script>
<script src="../js/main.js"></script>

<!-- Demo Color changer Script -->
<script src="../preview/lmpixels-demo-panel.js"></script>
<!-- /Demo Color changer Script -->
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + 4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mVa2K%2bNZnlpTXt9YnUCwpMMLx%2b%2bQHkmE4Wy7RkeBZJGKiJdue9wKB96Kc9iVjivRBFiEw44gPLCtvAbDqY8nlaWKojwq%2bGxts8680ZPIfGcjWoyu1MUIXmG%2b%2fgsc13iDQgNwbvkNzcl%2bgd5G365lc%2fZW9uzrhiAfXhLg0uTMRKGTIzWdvXQ%2b2shx1gs2blnB4W4WGsbJHO22nvyZ74GuIWsH%2bO2iD4UoLHdXpJvcTociFcQK9Dknfvs75H62QFe%2beG0uJJQHQwmanVfeImrn9vjTJrTMhkA6wmV23gTia4rlkd3WVk8bxtQmNtzP7ShU8RCESFWt%2fukSnHOF4HDXptKLmwTZA9k3nw9r0f7sEgrU0Xm8tcUqpgT%2bA3GpgWz0UZBVqoJQUQTafmPPjQfmo%2bujydoTzM%2b4kN2bVShERlJYGTwQiruBjPg4Jcq2vXsOMrY%2ftUBTyzxtnHSs6iYj1qOwVzMd4cpc%2fzRYJcQyAnBMqdxTgyoUr5ibFUVuN0qJG%2bXplJfh1lkgP45Ezt%2b7MOHgoActEOLtw + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>
</html>
