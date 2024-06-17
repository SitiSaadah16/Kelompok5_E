<?php

//koneksi database
include 'koneksi.php';

//menangkap sebuah data yang dikirim dari form
$id_siswa = $_POST['id_siswa'];
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$alamat = $_POST['alamat'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

//menginput data ke database
mysqli_query($conn, "insert into siswa value('$id_siswa', '$nis', '$nama', '$jenis_kelamin', '$tanggal_lahir', '$alamat', '$kelas', '$jurusan')");

//mengalihkan halaman kembali ke kelas.php
header("location:siswa.php");

?>