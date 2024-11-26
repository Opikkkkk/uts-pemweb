<?php
include '../controllers/crud_guru.php'; // Menyertakan file crud_guru.php untuk koneksi dan CRUD

// Mendapatkan data guru
$guruResult = getAllGuru();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="../public/assets/bootstrap.min.css">
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

            <!-- Main Content -->
            <div class="col-md-9">
                <h2>Data Guru</h2>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1; // Variabel untuk nomor urut
                                while ($row = $guruResult->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor urut -->
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['mata_pelajaran']; ?></td>
                                        <td>
                                            <!-- Tombol Edit untuk menampilkan modal -->
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editGuruModal<?php echo $row['id']; ?>">Edit</button>
                                            <a href="../controllers/crud_guru.php?action=delete&id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                                        </td>
                                    </tr>

                                    <!-- Modal Edit Guru -->
                                    <div class="modal fade" id="editGuruModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editGuruModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editGuruModalLabel">Edit Guru</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="../controllers/crud_guru.php?action=edit" method="POST">
                                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row['nama']; ?>" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                                                            <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" value="<?php echo $row['mata_pelajaran']; ?>" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update Guru</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </tbody>
                        </table>
                        
                        <!-- Add Guru Modal Trigger -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGuruModal">Tambah Guru</button>

                        <!-- Add Guru Modal -->
                        <div class="modal fade" id="addGuruModal" tabindex="-1" aria-labelledby="addGuruModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addGuruModalLabel">Tambah Guru</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../controllers/crud_guru.php?action=add" method="POST">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama" name="nama" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="mata_pelajaran" class="form-label">Mata Pelajaran</label>
                                                <input type="text" class="form-control" id="mata_pelajaran" name="mata_pelajaran" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tambah Guru</button>
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
