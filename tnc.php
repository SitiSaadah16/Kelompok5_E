<?php
// Koneksi ke database
$conn = new mysqli("localhost:3307", "root", "", "sekolah");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data siswa
$siswa_result = $conn->query("SELECT id_siswa, nama FROM siswa");
// Mengambil data mata pelajaran
$mapel_result = $conn->query("SELECT id_mapel, nama_mapel FROM mapel");

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_siswa = $_POST['id_siswa'];
    $id_mapel = $_POST['id_mapel'];
    $nilai = $_POST['nilai'];

    // Menambahkan nilai ke tabel nilai
    $stmt = $conn->prepare("INSERT INTO nilai (id_siswa, id_mapel, nilai) VALUES (?, ?, ?)");
    $stmt->bind_param("iii", $id_siswa, $id_mapel, $nilai);
    if ($stmt->execute()) {
        echo "<script>alert('Nilai berhasil ditambahkan!');</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan: " . $stmt->error . "');</script>";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nilai</title>
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'sidebar.php'; // Sidebar include ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include 'topbar.php'; // Topbar include ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Tambah Nilai</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Nilai</h6>
                        </div>
                        <div class="card-body">
                            <form method="post" action="tambah nilai.php">
                                <div class="form-group">
                                    <label for="id_siswa">Nama Siswa:</label>
                                    <select name="id_siswa" id="id_siswa" class="form-control" required>
                                        <?php
                                        if ($siswa_result->num_rows > 0) {
                                            while($row = $siswa_result->fetch_assoc()) {
                                                echo "<option value='" . $row['id_siswa'] . "'>" . $row['nama'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>Tidak ada data siswa</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_mapel">Nama Mata Pelajaran:</label>
                                    <select name="id_mapel" id="id_mapel" class="form-control" required>
                                        <?php
                                        if ($mapel_result->num_rows > 0) {
                                            while($row = $mapel_result->fetch_assoc()) {
                                                echo "<option value='" . $row['id_mapel'] . "'>" . $row['nama_mapel'] . "</option>";
                                            }
                                        } else {
                                            echo "<option value=''>Tidak ada data mata pelajaran</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nilai">Nilai:</label>
                                    <input type="number" name="nilai" id="nilai" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary">Tambah Nilai</button>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'footer.php'; // Footer include ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
