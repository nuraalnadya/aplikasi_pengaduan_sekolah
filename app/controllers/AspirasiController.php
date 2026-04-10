<?php
require_once 'app/models/AspirasiModel.php';

class AspirasiController {

    public function tambah() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'siswa') {
            header("Location: Index.php");
            exit;
        }

        $model = new AspirasiModel();
        $kategori = $model->getKategori();

        include 'app/views/siswa/TambahAspirasi.php';
    }

    public function simpan() {
        $model = new AspirasiModel();
        $model->simpan(
            $_SESSION['user']['id_user'],
            $_POST['id_kategori'],
            $_POST['judul'],
            $_POST['isi']
        );

        header("Location: Index.php?controller=SiswaController&action=dashboard");
        exit;
    }

    public function getAll() {
    $data = [];
    $query = "SELECT a.*, u.nama, k.nama_kategori
              FROM aspirasi a
              JOIN users u ON a.id_user = u.id_user
              JOIN kategori k ON a.id_kategori = k.id_kategori
              ORDER BY a.tanggal DESC";
    $result = $this->conn->query($query);
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    return $data;
}

public function getById($id) {
    return $this->conn->query(
        "SELECT * FROM aspirasi WHERE id_aspirasi=$id"
    )->fetch_assoc();
}

public function updateStatus($id, $status) {
    return $this->conn->query(
        "UPDATE aspirasi SET status='$status' WHERE id_aspirasi=$id"
    );
}

public function tambahFeedback($id_aspirasi, $pesan) {
    $stmt = $this->conn->prepare(
        "INSERT INTO umpan_balik (id_aspirasi, pesan) VALUES (?,?)"
    );
    $stmt->bind_param("is", $id_aspirasi, $pesan);
    return $stmt->execute();
}

public function getFeedback($id_aspirasi) {
    return $this->conn->query(
        "SELECT * FROM umpan_balik WHERE id_aspirasi=$id_aspirasi"
    )->fetch_assoc();
}

}
