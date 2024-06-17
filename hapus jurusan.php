<?php
include 'koneksi.php';

if (isset($_GET['id_jurusan'])) {
    $id_jurusan = $_GET['id_jurusan'];
    $query = mysqli_query($conn, "DELETE FROM jurusan WHERE id_jurusan='$id_jurusan'");

    if ($query) {
        header("Location: jurusan.php");
        exit;
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "ID Jurusan tidak ditemukan.";
}
?>

<button type="submit" class="btn btn-primary">Delete</button>
<a href="hapus jurusan.php?id_jurusan=<?php echo $data['id_jurusan']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this jurusan?')">Delete</a>
                                
