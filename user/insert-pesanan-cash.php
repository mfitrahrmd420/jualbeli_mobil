<?php
include("../core/core.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['cash'])){

  // ambil data dari formulir
  $nm = $_POST['nm'];
  $name = $_POST['name'];
  $st = $_POST['st'];
  $metode = $_POST['metode'];
  $harga = $_POST['harga'];
  $waktu = $_POST['waktu'];
  $qty = $_POST['qty'];
  $kode_barang = $_POST['kode_barang'];

  // buat query

  
  $sql="insert into verifikasi set 
                nama='$nm',
                nama_produk='$name',
                status='$st',
                metode='$metode',
                harga='$harga',
                waktu='$waktu',
                qty ='$_POST[qty]',
                kode_barang='$kode_barang'
                
                
        ";
  
  $query = mysqli_query($connect, $sql)or die(mysqli_error($connect));

  // apakah query simpan berhasil?
  if( $query ) {
    header('location: ../user/page-index.php#info');
    // echo "Sukses";
  } else {
    alert("Hello! Maaf! Pesanan kamu tidak dapat diproses!");
    // echo "Gagal";
  }

} else {
  die("Akses dilarang...");
}