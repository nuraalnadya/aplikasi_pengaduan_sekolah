<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Aspirasi Siswa</title>

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
            max-width: 600px;
            padding: 20px;
        }

        /* ===== CARD ===== */
        .card {
            background: #fff;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .card h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #5f0f40;
        }

        /* ===== FORM ===== */
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            font-size: 14px;
        }

        textarea {
            resize: none;
            height: 120px;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #5f0f40;
            box-shadow: 0 0 5px rgba(95, 15, 64, 0.3);
        }

        /* ===== BUTTON ===== */
        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #5f0f40;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background: #9a031e;
            transform: scale(1.03);
        }
    </style>

</head>
<body>

<div class="container">
    <div class="card">
        <h2>Form Aspirasi Siswa</h2>

        <form method="post" action="Index.php?controller=AspirasiController&action=simpan">

            <label>Kategori</label>
            <select name="id_kategori" required>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id_kategori']; ?>">
                        <?= $k['nama_kategori']; ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Judul</label>
            <input type="text" name="judul" required>

            <label>Isi Aspirasi</label>
            <textarea name="isi" required></textarea>

            <button type="submit" class="btn">Kirim</button>

        </form>
    </div>
</div>

</body>
</html>