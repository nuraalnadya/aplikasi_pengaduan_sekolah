<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
        }

        .container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 20px;
        }

        .title {
            margin-bottom: 20px;
            color: #333;
        }

        /* CARD */
        .card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        /* FILTER */
        .filter-form {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: end;
        }

        .form-group {
            flex: 1;
            min-width: 200px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        input:focus, select:focus {
            outline: none;
            border-color: #5f0f40;
        }

        .btn-filter {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            background: #5f0f40;
            color: #fff;
            cursor: pointer;
        }

        .btn-filter:hover {
            background: #9a031e;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #5f0f40;
            color: #fff;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        tbody tr {
            border-bottom: 1px solid #eee;
        }

        tbody tr:hover {
            background: #f9f9f9;
        }

        /* STATUS */
        .status {
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }

        .status.baru {
            background: #ffe5b4;
            color: #a15c00;
        }

        .status.diproses {
            background: #d0ebff;
            color: #084298;
        }

        .status.selesai {
            background: #d1e7dd;
            color: #0f5132;
        }

        /* BUTTON */
        .btn-detail {
            padding: 6px 10px;
            background: #6c757d;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-detail:hover {
            background: #5a6268;
        }

        .logout {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
            background: #d00000;
            padding: 10px 15px;
            border-radius: 6px;
        }

        .logout:hover {
            background: #9d0208;
        }

    </style>
</head>
<body>

<div class="container">

    <h2 class="title">Dashboard Admin</h2>

    <!-- FILTER -->
    <div class="card">
        <h3>Filter Aspirasi</h3>

        <form action="Index.php" method="get" class="filter-form">
            <input type="hidden" name="controller" value="AdminController">
            <input type="hidden" name="action" value="dashboard">

            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal">
            </div>

            <div class="form-group">
                <label>Kategori</label>
                <select name="kategori">
                    <option value="">-- Semua --</option>
                    <?php foreach ($kategoriList as $k): ?>
                        <option value="<?= $k['id_kategori']; ?>">
                            <?= $k['nama_kategori']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label>Siswa</label>
                <select name="siswa">
                    <option value="">-- Semua --</option>
                    <?php foreach ($siswaList as $s): ?>
                        <option value="<?= $s['id_user']; ?>">
                            <?= $s['nama']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <button type="submit" class="btn-filter">Filter</button>
            </div>
        </form>
    </div>

    <!-- TABLE -->
    <div class="card">
        <h3>Histori Aspirasi</h3>

        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Siswa</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($aspirasi as $a): ?>
                <tr>
                    <td><?= $a['tanggal']; ?></td>
                    <td><?= $a['nama']; ?></td>
                    <td><?= $a['nama_kategori']; ?></td>
                    <td><?= $a['judul']; ?></td>
                    <td>
                        <span class="status <?= strtolower($a['status']); ?>">
                            <?= $a['status']; ?>
                        </span>
                    </td>
                    <td>
                        <a class="btn-detail" href="Index.php?controller=AdminController&action=detail&id=<?= $a['id_aspirasi']; ?>">
                            Detail
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a class="logout" href="Index.php?controller=LoginController&action=logout">
        Logout
    </a>

</div>

</body>
</html>