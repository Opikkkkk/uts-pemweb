<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Background gradient fullscreen */
        body {
            background: linear-gradient(to bottom right, #0d1b2a, #1b263b, #415a77, #778da9);
            color: #ffffff;
            min-height: 100vh; /* Mengatur tinggi minimum body 100% viewport */
            display: flex;
            align-items: center; /* Untuk memastikan konten terpusat secara vertikal */
            justify-content: center; /* Untuk memastikan konten terpusat secara horizontal */
            margin: 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Header -->
        <h2 class="text-center mb-4">Register</h2>
        
        <!-- Register Form -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">

                        <!-- Menampilkan pesan error jika ada -->
                        <?php
                        session_start();
                        if (isset($_SESSION['register_message'])):
                        ?>
                            <div class="alert alert-danger">
                                <?php 
                                echo $_SESSION['register_message']; 
                                unset($_SESSION['register_message']); // Menghapus pesan setelah ditampilkan
                                ?>
                            </div>
                        <?php endif; ?>
                        
                        <form action="../controllers/auth.php" method="POST">
                            <input type="hidden" name="action" value="register">
                            
                            <!-- Username Field -->
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            
                            <!-- Password Field -->
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            
                            <!-- Name Field -->
                            <div class="form-group mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" required>
                            </div>
                            
                            <!-- Kelas Selection -->
                            <div class="form-group mb-3">
                                <label for="kelas">Pilih Kelas</label>
                                <select class="form-control" name="kelas" id="kelas">
                                    <option value="Kelas A">Kelas A</option>
                                    <option value="Kelas B">Kelas B</option>
                                    <option value="Kelas C">Kelas C</option>
                                    <option value="Kelas D">Kelas D</option>
                                    <option value="Kelas E">Kelas E</option>
                                </select>
                            </div>
                            
                            <!-- Hidden Role Field -->
                            <input type="hidden" name="role" value="siswa">
                            
                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100">Register</button>
                        </form>
                    </div>
                </div>

                <!-- Back Link -->
                <div class="text-center mt-3">
                    <a href="login.php" class="btn btn-secondary w-100">Kembali ke Login</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
