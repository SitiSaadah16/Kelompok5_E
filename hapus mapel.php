<?php
include 'koneksi.php';

if (isset($_GET['id_mapel'])) {
    $id_mapel = $_GET['id_mapel'];
    $query = mysqli_query($conn, "DELETE FROM mapel WHERE id_mapel='$id_mapel'");

    if ($query) {
        header("Location: mapel.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID Mapel tidak ditemukan.";
}
?>

<button type="submit" class="btn btn-primary">Delete</button>
<a href="hapus_mapel.php?id_mapel=<?php echo $data['id_mapel']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this mapel?')">Delete</a>
                                
                                
