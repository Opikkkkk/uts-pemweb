<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../public/assets/bootstrap.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS Bundle (termasuk Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard_admin.php">Admin Dashboard</a>
        <div class="collapse navbar-collapse">
            <ulx class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../controllers/auth.php?action=logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="dashboard_admin.php" class="list-group-item list-group-item-action active">Dashboard</a>
                    <a href="jadwal_data_admin.php" class="list-group-item list-group-item-action">Kelola Jadwal</a>
                    <a href="data_guru_admin.php" class="list-group-item list-group-item-action">Kelola Guru</a>
                </div>
            </div>
            <div class="col-md-9">
                <h2>Selamat Datang di Dashboard Admin</h2>
                <p>Ini adalah halaman pengenalan untuk admin sekolah. Anda bisa mengelola data jadwal, data siswa, nilai, dan tugas di sini.</p>
                
                <div class="card mt-4">
                    <div class="card-body">
                        <h4 class="card-title">Pengenalan Sekolah</h4>
                        <p class="card-text">Sekolah kami memiliki visi dan misi yang berfokus pada pendidikan berkualitas, pembentukan karakter, serta pengembangan keterampilan siswa.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
