<?php
session_start(); // Pastikan session_start() ada di sini
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../public/assets/css/custom.css">

    <!-- Tambahkan CSS untuk background gradient fullscreen -->
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
    <!-- Main Container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <!-- Card dengan background transparan -->
                <div class="card shadow-sm login-container">
                    <div class="card-body">
                        <!-- Judul di atas Form Login -->
                        <div class="text-center login-title">
                            <h4>Login</h4>
                        </div>
                        
                        <!-- Tampilkan pesan jika ada (Login) -->
                        <?php if (isset($_SESSION['login_message'])): ?>
                            <div class="alert alert-danger alert-container" role="alert">
                                <?php echo $_SESSION['login_message']; ?>
                            </div>
                            <?php unset($_SESSION['login_message']); // Hapus pesan setelah ditampilkan ?>
                        <?php endif; ?>
                        
                        <form action="../controllers/auth.php" method="POST">
                            <input type="hidden" name="action" value="login">
                            
                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <p>Belum punya akun? <a href="register.php">Register</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
