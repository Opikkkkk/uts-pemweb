<?php
include '../controllers/crud_jadwal.php';  // Termasuk controller untuk CRUD

// Ambil data kelas jika ada
$kelas = isset($_GET['kelas']) ? $_GET['kelas'] : '';
$jadwalResult = getJadwalData($conn, $kelas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Jadwal</title>
    <link rel="stylesheet" href="../public/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard_admin.php">Admin Dashboard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; while ($row = $jadwalResult->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo htmlspecialchars($row['mata_pelajaran']); ?></td>
                                <td><?php echo htmlspecialchars($row['hari']); ?></td>
                                <td><?php echo htmlspecialchars($row['jam_mulai']); ?></td>
                                <td><?php echo htmlspecialchars($row['jam_selesai']); ?></td>
                                <td><?php echo htmlspecialchars($row['kelas']); ?></td>
                                <td>
                                
                                   <!-- Modal Edit -->
                                    <div class="modal fade" id="editJadwalModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editJadwalModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editJadwalModalLabel">Edit Jadwal</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../controllers/crud_jadwal.php?action=edit&id=<?php echo $row['id']; ?>" method="POST">
                                                        <div class="mb-3">
                                                            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                                                            <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" value="<?php echo htmlspecialchars($row['mata_pelajaran']); ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="hari" class="form-label">Hari</label>
                                                            <input type="text" class="form-control" id="hari" name="hari" value="<?php echo htmlspecialchars($row['hari']); ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="<?php echo htmlspecialchars($row['jam_mulai']); ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="<?php echo htmlspecialchars($row['jam_selesai']); ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="kelas" class="form-label">Kelas</label>
                                                            <select class="form-control" id="kelas" name="kelas" required>
                                                                <option value="Kelas A" <?php echo ($row['kelas'] == 'Kelas A') ? 'selected' : ''; ?>>Kelas A</option>
                                                                <option value="Kelas B" <?php echo ($row['kelas'] == 'Kelas B') ? 'selected' : ''; ?>>Kelas B</option>
                                                                <option value="Kelas C" <?php echo ($row['kelas'] == 'Kelas C') ? 'selected' : ''; ?>>Kelas C</option>
                                                                <option value="Kelas D" <?php echo ($row['kelas'] == 'Kelas D') ? 'selected' : ''; ?>>Kelas D</option>
                                                                <option value="Kelas E" <?php echo ($row['kelas'] == 'Kelas E') ? 'selected' : ''; ?>>Kelas E</option>
                                                            </select>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tombol Edit -->
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editJadwalModal<?php echo $row['id']; ?>">Edit</button>



                                    <!-- Tombol Hapus -->
                                    <a href="../controllers/crud_jadwal.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                        
                        <!-- Add Jadwal Modal Trigger -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addJadwalModal">Tambah Jadwal</button>

                        <!-- Add Jadwal Modal -->
                        <div class="modal fade" id="addJadwalModal" tabindex="-1" aria-labelledby="addJadwalModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addJadwalModalLabel">Tambah Jadwal</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../controllers/crud_jadwal.php?action=add" method="POST">
                                            <div class="mb-3">
                                                <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                                                <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="hari" class="form-label">Hari</label>
                                                <input type="text" class="form-control" id="hari" name="hari" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="kelas" class="form-label">Kelas</label>
                                                <select class="form-control" id="kelas" name="kelas" required>
                                                    <option value="Kelas A">Kelas A</option>
                                                    <option value="Kelas B">Kelas B</option>
                                                    <option value="Kelas C">Kelas C</option>
                                                    <option value="Kelas D">Kelas D</option>
                                                    <option value="Kelas E">Kelas E</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
