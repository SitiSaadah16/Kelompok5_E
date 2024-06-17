<?php

//koneksi database
include 'koneksi.php';

//menangkap sebuah data yang dikirim dari form
$id_nilai = $_POST['id_nilai'];
$id_siswa = $_POST['id_siswa'];
$id_mapel = $_POST['id_mapel'];
$nilai = $_POST['nilai'];
//menginput data ke database
mysqli_query($conn, "insert into nilai value('$id_nilai', '$id_siswa', '$id_mapel', '$nilai')");

//mengalihkan halaman kembali ke kelas.php
header("location:nilai.php");

?>