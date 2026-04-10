<link rel="stylesheet" href="public/css/style.css">

<div class="edit-wrapper">
    <div class="edit-card">

        <h2>Edit Aspirasi</h2>

        <form method="POST" action="index.php?controller=SiswaController&action=update">
            
            <input type="hidden" name="id" value="<?php echo $data['id_aspirasi']; ?>">

            <label>Judul</label>
            <input type="text" 
                   name="judul" 
                   value="<?php echo $data['judul']; ?>" 
                   required>

            <div class="edit-actions">
                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="Index.php?controller=SiswaController&action=histori" 
                   class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>
</div>
