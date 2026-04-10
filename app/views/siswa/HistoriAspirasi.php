<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Histori Aspirasi</title>

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

        /* HEADER */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #333;
        }

        /* CARD */
        .card {
            background: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        thead {
            background: #5f0f40;
            color: #fff;
        }

        th {
            padding: 12px;
            text-align: left;
        }

        td {
            padding: 12px;
            border-bottom: 1px solid #eee;
        }

        tbody tr:hover {
            background: #f9f9f9;
        }

        /* STATUS */
        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
            display: inline-block;
        }

        .status.menunggu {
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
        .btn {
            padding: 8px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-secondary {
            background: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover {
            background: #5a6268;
        }

        /* FEEDBACK */
        .feedback {
            max-width: 200px;
            word-wrap: break-word;
            color: #555;
            font-size: 13px;
        }

    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <h2>Histori Aspirasi</h2>
        <a href="Index.php?controller=SiswaController&action=dashboard" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    <div class="card">

        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Umpan Balik</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($histori as $h): ?>
                <tr>
                    <td><?= $h['tanggal']; ?></td>
                    <td><?= $h['nama_kategori']; ?></td>
                    <td><?= $h['judul']; ?></td>
                    <td>
                        <span class="status <?= strtolower($h['status']); ?>">
                            <?= $h['status']; ?>
                        </span>
                    </td>
                    <td class="feedback">
                        <?php
                        $fb = (new AspirasiModel())->getFeedback($h['id_aspirasi']);
                        echo $fb ? $fb['pesan'] : '-';
                        ?>
                    </td>
                    <td>
                        <a href="Index.php?controller=SiswaController&action=edit&id=<?= $h['id_aspirasi']; ?>" 
                           class="btn btn-secondary">
                            Ubah
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>

</body>
</html>