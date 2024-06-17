<?php
include 'koneksi.php';

if (isset($_GET['id_nilai'])) {
    $id_nilai = $_GET['id_nilai'];
    $query = mysqli_query($conn, "DELETE FROM nilai WHERE id_nilai='$id_nilai'");

    if ($query) {
        header("Location: nilai.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID Nilai tidak ditemukan.";
}
?>

<button type="submit" class="btn btn-primary">Delete</button>
<a href="hapus nilai.php?id_nilai=<?php echo $data['id_nilai']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this nilai?')">Delete</a>