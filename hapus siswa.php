<?php
include 'koneksi.php';

if (isset($_GET['id_siswa'])) {
    $id_siswa = $_GET['id_siswa'];
    $query = mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa='$id_siswa'");

    if ($query) {
        header("Location: siswa.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID Siswa tidak ditemukan.";
}
?>

<button type="submit" class="btn btn-primary">Delete</button>
<a href="hapus siswa.php?id_siswa=<?php echo $data['id_siswa']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this nilai?')">Delete</a>