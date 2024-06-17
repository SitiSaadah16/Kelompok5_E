<?php
// Koneksi ke database
include 'koneksi.php';

if (isset($_POST['id_nilai'])) {
    $id_nilai = $_POST['id_nilai'];
    $id_mapel = $_POST['id_mapel'];
    $nilai = $_POST['nilai'];

    $query = "UPDATE nilai SET id_nilai='$id_nilai', id_mapel='$id_mapel', nilai='$nilai' WHERE id_nilai='$id_nilai'";
    if (mysqli_query($conn, $query)) {
        header("Location: nilai.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else {
    echo "ID Nilai tidak ditemukan.";
}
?>
