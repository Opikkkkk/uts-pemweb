<?php
session_start();
include '../config/database.php';

$action = $_POST['action'];
$message = ''; // Variabel untuk menyimpan pesan


//Login
if ($action === "login") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Cek apakah username ada di database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();

    if (!$result) {
        // Username tidak ditemukan
        $_SESSION['login_message'] = "Username tidak ditemukan.";
        header("Location: ../views/login.php");
        exit();
    } else {
        // Cek apakah password sesuai
        if (password_verify($password, $result['password'])) {
            // Login berhasil
            $_SESSION['id'] = $result['id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $result['role'];
            $_SESSION['kelas'] = $result['kelas']; // Tambahkan kelas ke session
            header("Location: ../public/index.php");
            exit();
        } else {
            // Password salah
            $_SESSION['login_message'] = "Password salah.";
            header("Location: ../views/login.php");
            exit();
        }
    }
}

//Register
if ($action === "register") {
    $username = $_POST['username'];
    $nama   = $_POST['nama'];
    $kelas  = $_POST['kelas'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Cek apakah username sudah ada di database
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika username sudah ada, simpan pesan di session dan arahkan kembali ke register
        $_SESSION['register_message'] = "Username sudah dipakai, silakan pilih username lain.";
        header("Location: ../views/register.php");
        exit();
    } else {
        // Jika username belum ada, lakukan insert
        $stmt = $conn->prepare("INSERT INTO users (username, password, nama, kelas, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $password, $nama, $kelas, $role);
        $stmt->execute();
        $_SESSION['register_message'] = "Register successful";
        header("Location: ../views/login.php");
        exit();
    }
}

// Cek apakah parameter 'action' sudah dikirim
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy(); // Hapus semua sesi
    header("Location: ../views/login.php"); // Arahkan kembali ke halaman login
    exit();
}
?>
