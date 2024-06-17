<?php
include 'koneksi.php';

if (isset($_GET['id_kelas'])) {
    $id_kelas = $_GET['id_kelas'];
    $query = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas='$id_kelas'");

    if ($query) {
        header("Location: kelas.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID Kelas tidak ditemukan.";
}
?>

<button type="submit" class="btn btn-primary">Delete</button>
<a href="hapus kelas.php?id_kelas=<?php echo $data['id_kelas']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this kelas?')">Delete</a>