<?php

//koneksi database
include 'koneksi.php';

//menangkap sebuah data yang dikirim dari form
$id_mapel = $_POST['id_mapel'];
$nama_mapel = $_POST['nama_mapel'];

//menginput data ke database
mysqli_query($conn, "insert into mapel value('$id_mapel', '$nama_mapel')");

//mengalihkan halaman kembali ke kelas.php
header("location:mapel.php");

?>