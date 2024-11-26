<?php
session_start();
include '../config/database.php';

// Cek apakah pengguna adalah siswa
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'siswa') {
    header("Location: ../views/login.php");
    exit();
}


// Mendapatkan data guru
$guruQuery = "SELECT * FROM guru";
$guruResult = $conn->query($guruQuery);  // Ganti variabel $result menjadi $guruResult untuk menghindari tumpang tindih

// Periksa apakah user sudah login dan memiliki session kelas
if (!isset($_SESSION['kelas'])) {
    header("Location: login.php");
    exit();
}

// Mendapatkan kelas dari session
$kelas = $_SESSION['kelas'];  // Pastikan kelas diset dalam session

// Query untuk mendapatkan data jadwal sesuai kelas user
$stmt = $conn->prepare("SELECT * FROM jadwal WHERE kelas = ?");
$stmt->bind_param("s", $kelas);  // Mengikat parameter kelas dengan nilai dari session
$stmt->execute();
$jadwalResult = $stmt->get_result();  // Menyimpan hasil query

// Cek apakah data jadwal ditemukan
if ($jadwalResult->num_rows === 0) {
    echo "Tidak ada jadwal untuk kelas ini.";
}
?>

