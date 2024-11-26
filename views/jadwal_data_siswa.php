<?php include '../controllers/siswa.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Jadwal</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard_siswa.php">Dashboard Siswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../controllers/auth.php?action=logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4 class="text-center">Dashboard Siswa</h4>
        <a href="dashboard_siswa.php">Dashboard</a>
        <a href="jadwal_data_siswa.php" class="active">Lihat Jadwal</a>
        <a href="data_guru_siswa.php">Data Guru</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h2>Data Jadwal Kelas <?php echo htmlspecialchars($kelas); ?></h2>

        <!-- Table Jadwal -->
        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Mata Pelajaran</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        while ($row = $jadwalResult->fetch_assoc()) {
                            echo "<tr>
                                <td>{$no}</td>
                                <td>" . htmlspecialchars($row['mata_pelajaran']) . "</td>
                                <td>" . htmlspecialchars($row['hari']) . "</td>
                                <td>" . htmlspecialchars($row['jam_mulai']) . "</td>
                                <td>" . htmlspecialchars($row['jam_selesai']) . "</td>
                                <td>" . htmlspecialchars($row['kelas']) . "</td>
                            </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
