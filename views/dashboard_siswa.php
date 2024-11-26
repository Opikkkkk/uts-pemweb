<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Dashboard Siswa</h4>
        <a href="dashboard_siswa.php" class="active">Dashboard</a>
        <a href="jadwal_data_siswa.php">Lihat Jadwal</a>
        <a href="data_guru_siswa.php">Data Guru</a>
        <a href="../controllers/auth.php?action=logout" class="logout-btn">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Selamat Datang di Dashboard Siswa</h2>
        <p>Di sini Anda bisa melihat jadwal pelajaran, nilai, serta mengumpulkan tugas untuk diapprove oleh admin.</p>
        
        <div class="card mt-4">
            <div class="card-body">
                <h4 class="card-title">Informasi Jadwal & Nilai</h4>
                <p class="card-text">Pastikan Anda selalu memeriksa jadwal pelajaran dan nilai yang telah diperoleh selama proses belajar.</p>
            </div>
        </div>
    </div>
</body>
</html>
