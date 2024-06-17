<?php
// Koneksi ke database
include 'koneksi.php';

if (isset($_POST['id_siswa'])) {
    $id_siswa = $_POST['id_siswa'];
    $nis = $_POST['nis'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    $query = "UPDATE siswa SET nis='$nis', nama='$nama', jenis_kelamin='$jenis_kelamin', tanggal_lahir='$tanggal_lahir', alamat='$alamat',kelas='$kelas', jurusan='$jurusan' WHERE id_siswa='$id_siswa'";
    if (mysqli_query($conn, $query)) {
        header("Location: siswa.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "ID Siswa tidak ditemukan.";
}
?>