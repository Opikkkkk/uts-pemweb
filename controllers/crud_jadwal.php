<?php
include '../config/database.php';  // Menghubungkan dengan database

// Fungsi untuk mengambil data jadwal
function getJadwalData($conn, $kelas = '') {
    $sql = "SELECT * FROM jadwal";
    
    if ($kelas != '') {
        $sql .= " WHERE kelas = ?";
    }
    
    $sql .= " ORDER BY kelas ASC";
    
    $stmt = $conn->prepare($sql);
    
    if ($kelas != '') {
        $stmt->bind_param("s", $kelas);
    }
    
    $stmt->execute();
    return $stmt->get_result();
}

// Fungsi untuk menambah jadwal
if (isset($_GET['action']) && $_GET['action'] == 'add') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mata_pelajaran = $_POST['mata_pelajaran'];
        $hari = $_POST['hari'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $kelas = $_POST['kelas'];

        $sql = "INSERT INTO jadwal (mata_pelajaran, hari, jam_mulai, jam_selesai, kelas) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $mata_pelajaran, $hari, $jam_mulai, $jam_selesai, $kelas);
        
        if ($stmt->execute()) {
            header("Location: ../views/jadwal_data_admin.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

// Fungsi untuk mengedit jadwal
if (isset($_GET['action']) && $_GET['action'] == 'edit') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_GET['id'];
        $mata_pelajaran = $_POST['mata_pelajaran'];
        $hari = $_POST['hari'];
        $jam_mulai = $_POST['jam_mulai'];
        $jam_selesai = $_POST['jam_selesai'];
        $kelas = $_POST['kelas'];

        $sql = "UPDATE jadwal SET mata_pelajaran = ?, hari = ?, jam_mulai = ?, jam_selesai = ?, kelas = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssi", $mata_pelajaran, $hari, $jam_mulai, $jam_selesai, $kelas, $id);
        
        if ($stmt->execute()) {
            header("Location: ../views/jadwal_data_admin.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

// Fungsi untuk menghapus jadwal
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM jadwal WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            header("Location: ../views/jadwal_data_admin.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>
