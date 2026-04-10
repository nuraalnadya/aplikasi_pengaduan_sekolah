<?php
require_once __DIR__ . '/Koneksi.php';

class AspirasiModel extends Koneksi {

    public function getKategori() {
        $data = [];
        $result = $this->conn->query("SELECT * FROM kategori");
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function simpan($id_user, $id_kategori, $judul, $isi) {
        $stmt = $this->conn->prepare(
            "INSERT INTO aspirasi (id_user, id_kategori, judul, isi) VALUES (?,?,?,?)"
        );
        $stmt->bind_param("iiss", $id_user, $id_kategori, $judul, $isi);
        return $stmt->execute();
    }

    public function getByUser($id_user) {
        $data = [];
        $query = "SELECT a.*, k.nama_kategori 
                  FROM aspirasi a 
                  JOIN kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.id_user = $id_user
                  ORDER BY a.tanggal DESC";
        $result = $this->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
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

    // ✅ HANYA SATU getById
    public function getById($id) {
        $query = "SELECT * FROM aspirasi WHERE id_aspirasi = '$id'";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    public function update($id, $judul) {
        $query = "UPDATE aspirasi 
                  SET judul = '$judul' 
                  WHERE id_aspirasi = '$id'";
        return $this->conn->query($query);
    }

    public function updateStatus($id, $status) {
        return $this->conn->query(
            "UPDATE aspirasi SET status='$status' WHERE id_aspirasi='$id'"
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
        $result = $this->conn->query(
            "SELECT * FROM umpan_balik WHERE id_aspirasi = '$id_aspirasi'"
        );
        return $result->fetch_assoc();
    }

    public function getHistoriSiswa($id_user) {
        $data = [];
        $query = "SELECT a.*, k.nama_kategori
                  FROM aspirasi a
                  JOIN kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.id_user = '$id_user'
                  ORDER BY a.tanggal DESC";
        $result = $this->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function filter($tanggal, $kategori, $siswa) {
        $where = [];

        if ($tanggal != '') {
            $where[] = "DATE(a.tanggal) = '$tanggal'";
        }
        if ($kategori != '') {
            $where[] = "a.id_kategori = '$kategori'";
        }
        if ($siswa != '') {
            $where[] = "a.id_user = '$siswa'";
        }

        $whereSql = count($where) ? 'WHERE ' . implode(' AND ', $where) : '';

        $query = "SELECT a.*, u.nama, k.nama_kategori
                  FROM aspirasi a
                  JOIN users u ON a.id_user = u.id_user
                  JOIN kategori k ON a.id_kategori = k.id_kategori
                  $whereSql
                  ORDER BY a.tanggal DESC";

        $data = [];
        $result = $this->conn->query($query);
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function getSiswa() {
        $data = [];
        $result = $this->conn->query(
            "SELECT * FROM users WHERE role='siswa'"
        );
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}