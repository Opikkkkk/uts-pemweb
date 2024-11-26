<?php
include '../config/database.php'; // Koneksi ke database

// Fungsi untuk mendapatkan semua data guru
function getAllGuru() {
    global $conn;
    $query = "SELECT * FROM guru";
    return $conn->query($query);
}

// Fungsi untuk menambah data guru
function addGuru($nama, $mata_pelajaran) {
    global $conn;
    $query = "INSERT INTO guru (nama, mata_pelajaran) VALUES ('$nama', '$mata_pelajaran')";
    return $conn->query($query);
}

// Fungsi untuk mendapatkan data guru berdasarkan ID
function getGuruById($id) {
    global $conn;
    $query = "SELECT * FROM guru WHERE id = $id";
    return $conn->query($query)->fetch_assoc();
}

// Fungsi untuk mengupdate data guru
function updateGuru($id, $nama, $mata_pelajaran) {
    global $conn;
    $query = "UPDATE guru SET nama = '$nama', mata_pelajaran = '$mata_pelajaran' WHERE id = $id";
    return $conn->query($query);
}


// Fungsi untuk menghapus data guru
function deleteGuru($id) {
    global $conn;
    $query = "DELETE FROM guru WHERE id = $id";
    return $conn->query($query);
}

// Menangani aksi yang dikirimkan dari frontend
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'add':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nama = $_POST['nama'];
                $mata_pelajaran = $_POST['mata_pelajaran'];
                addGuru($nama, $mata_pelajaran);
                header("Location: ../views/data_guru_admin.php");
            }
            break;

            case 'edit':
                if (isset($_GET['action']) && $_GET['action'] == 'edit') {
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $id = $_POST['id'];
                        $nama = $_POST['nama'];
                        $mata_pelajaran = $_POST['mata_pelajaran'];
                        updateGuru($id, $nama, $mata_pelajaran);
                        header("Location: ../views/data_guru_admin.php"); // Setelah update, redirect ke halaman data guru
                        exit();
                    }
                }
            

        case 'delete':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                deleteGuru($id);
                header("Location: ../views/data_guru_admin.php");
            }
            break;
    }
}
?>
