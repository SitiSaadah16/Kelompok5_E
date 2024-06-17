<?php
// Koneksi ke database
include 'koneksi.php';

if (isset($_POST['id_mapel'])) {
    $id_mapel = $_POST['id_mapel'];
    $nama_mapel = $_POST['nama_mapel'];

    $query = "UPDATE mapel SET nama_mapel='$nama_mapel' WHERE id_mapel='$id_mapel'";
    if (mysqli_query($conn, $query)) {
        header("Location: mapel.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "ID Mata Pelajaran tidak ditemukan.";
}
?>
