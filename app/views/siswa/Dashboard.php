<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Siswa</title>

    <style>
        /* ===== BODY ===== */
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #5f0f40, #9a031e);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* ===== CONTAINER ===== */
        .container {
            width: 100%;
            max-width: 800px;
            padding: 20px;
        }

        /* ===== HEADER ===== */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
        }

        .user-info {
            background: rgba(255,255,255,0.2);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
        }

        /* ===== CARD ===== */
        .card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            text-align: center;
        }

        .welcome-card h3 {
            margin-bottom: 10px;
            color: #5f0f40;
        }

        /* ===== BUTTON ===== */
        .btn {
            display: inline-block;
            padding: 12px 20px;
            margin: 10px;
            border-radius: 10px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-primary {
            background: #5f0f40;
        }

        .btn-primary:hover {
            background: #9a031e;
            transform: scale(1.05);
        }

        .btn-secondary {
            background: #0f4c5c;
        }

        .btn-secondary:hover {
            background: #1a759f;
            transform: scale(1.05);
        }

        .btn-danger {
            background: #d00000;
        }

        .btn-danger:hover {
            background: #9d0208;
            transform: scale(1.05);
        }

        /* ===== ACTION CARD ===== */
        .action-card {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* ===== FOOTER ===== */
        .footer {
            text-align: center;
        }
    </style>

</head>
<body>

<div class="container">

    <div class="header">
        <h2>Dashboard Siswa</h2>
        <div class="user-info">
            <?= $_SESSION['user']['nama']; ?>
        </div>
    </div>

    <div class="card welcome-card">
        <h3>Halo, <?= $_SESSION['user']['nama']; ?></h3>
        <p>Silakan sampaikan aspirasi atau cek histori laporanmu.</p>
    </div>

    <div class="card action-card">
        <a class="btn btn-primary" href="Index.php?controller=AspirasiController&action=tambah">
            Tambah Aspirasi
        </a>

        <a class="btn btn-secondary" href="Index.php?controller=SiswaController&action=histori">
            Histori Aspirasi
        </a>
    </div>

    <div class="footer">
        <a class="btn btn-danger" href="Index.php?controller=LoginController&action=logout">
            Logout
        </a>
    </div>

</div>

</body>
</html>