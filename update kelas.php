<?php
// Koneksi ke database
include 'koneksi.php';

if (isset($_POST['id_kelas'])) {
    $id_kelas = $_POST['id_kelas'];
    $nama_kelas = $_POST['nama_kelas'];

    $query = "UPDATE kelas SET nama_kelas='$nama_kelas' WHERE id_kelas='$id_kelas'";
    if (mysqli_query($conn, $query)) {
        header("Location: kelas.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "ID Kelas tidak ditemukan.";
}
?>
