<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Aspirasi</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #f4f6f9;
        }

        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 20px;
        }

        /* CARD */
        .card {
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        h3 {
            margin-top: 0;
            color: #333;
        }

        /* DETAIL TEXT */
        .detail p {
            margin: 8px 0;
            line-height: 1.5;
        }

        .label {
            font-weight: bold;
            color: #555;
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

        /* FORM */
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        select, textarea {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        textarea {
            height: 100px;
            resize: none;
        }

        select:focus, textarea:focus {
            outline: none;
            border-color: #5f0f40;
            box-shadow: 0 0 4px rgba(95, 15, 64, 0.2);
        }

        /* BUTTON */
        .btn {
            margin-top: 15px;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #5f0f40;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: 0.3s;
        }

        .btn:hover {
            background: #9a031e;
        }

        /* FEEDBACK BOX */
        .feedback-box {
            background: #f8f9fa;
            padding: 10px;
            border-left: 4px solid #5f0f40;
            margin-top: 10px;
            border-radius: 5px;
        }

    </style>
</head>
<body>

<div class="container">

    <!-- DETAIL -->
    <div class="card">
        <h3>Detail Aspirasi</h3>

        <div class="detail">
            <p><span class="label">Judul:</span> <?= $data['judul']; ?></p>
            <p><span class="label">Isi:</span> <?= $data['isi']; ?></p>
            <p>
                <span class="label">Status:</span> 
                <span class="status <?= strtolower($data['status']); ?>">
                    <?= $data['status']; ?>
                </span>
            </p>

            <?php if ($feedback): ?>
                <p class="label">Umpan Balik:</p>
                <div class="feedback-box">
                    <?= $feedback['pesan']; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- FORM -->
    <div class="card">
        <h3>Update Status & Umpan Balik</h3>

        <form method="post" action="Index.php?controller=AdminController&action=proses">

            <input type="hidden" name="id_aspirasi" value="<?= $data['id_aspirasi']; ?>">

            <label>Status</label>
            <select name="status">
                <option value="baru">Baru</option>
                <option value="diproses">Diproses</option>
                <option value="selesai">Selesai</option>
            </select>

            <label>Umpan Balik</label>
            <textarea name="pesan" required></textarea>

            <button type="submit" class="btn">Simpan</button>

        </form>
    </div>

</div>

</body>
</html>