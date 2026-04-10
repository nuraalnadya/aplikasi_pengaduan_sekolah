<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Pengaduan Sekolah</title>
    <link rel="stylesheet" href="public/css/style.css?v=1">
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">

        <div class="login-logo">
            <img src="/pengaduan_sekolah/public/assets/img/logo.png" alt="Logo">
        </div>

        <div class="login-form">
            <h2>Selamat Datang</h2>
            <p>Silakan login untuk melanjutkan</p>

            <!-- ✅ ERROR MESSAGE -->
            <?php if (isset($_SESSION['error'])): ?>
                <div style="color:red; margin-bottom:10px;">
                    <?= $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <form method="post" action="Index.php?controller=LoginController&action=proses">
                
                <label>Username</label>
                <!-- ✅ TANPA VALUE (SELALU KOSONG) -->
                <input type="text" name="username" placeholder="Masukkan username" required>

                <label>Password</label>

                <!-- ✅ PASSWORD + ICON MATA -->
                <div style="position: relative;">
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>

                    <span onclick="togglePassword()" 
                        style="position:absolute; right:10px; top:50%; transform:translateY(-50%); cursor:pointer;">
                        👁️
                    </span>
                </div>
                <br><br>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>

        </div>

    </div>
</div>

<!-- ✅ SCRIPT SHOW PASSWORD -->
<script>
function togglePassword() {
    var pw = document.getElementById("password");

    if (pw.type === "password") {
        pw.type = "text";
    } else {
        pw.type = "password";
    }
}
</script>

</body>
</html>