<?php
session_start();

// Periksa apakah pengguna sudah login
if (isset($_SESSION['role'])) {
    // Jika role adalah admin, arahkan ke dashboard admin
    if ($_SESSION['role'] === 'admin') {
        header("Location: ../views/dashboard_admin.php");
        exit();
    }
    // Jika role adalah siswa, arahkan ke dashboard siswa
    else if ($_SESSION['role'] === 'siswa') {
        header("Location: ../views/dashboard_siswa.php");
        exit();
    }
} else {
    // Jika belum login, arahkan ke halaman login
    header("Location: ../views/login.php");
    exit();
}
?>
