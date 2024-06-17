<?php
// Koneksi ke database
include 'koneksi.php';

if (isset($_POST['id_jurusan'])) {
    $id_jurusan = $_POST['id_jurusan'];
    $nama_jurusan = $_POST['nama_jurusan'];

    $query = "UPDATE jurusan SET nama_jurusan='$nama_jurusan' WHERE id_jurusan='$id_jurusan'";
    if (mysqli_query($conn, $query)) {
        header("Location: jurusan.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "ID Jurusan tidak ditemukan.";
}
?>
