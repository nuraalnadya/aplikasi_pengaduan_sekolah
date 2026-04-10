<?php
require_once 'app/models/AspirasiModel.php';

class AdminController {

    public function dashboard() {
    if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
        header("Location: Index.php");
        exit;
    }

    require_once 'app/models/AspirasiModel.php';
    $model = new AspirasiModel();

    $tanggal  = $_GET['tanggal']  ?? '';
    $kategori = $_GET['kategori'] ?? '';
    $siswa    = $_GET['siswa']    ?? '';

    if ($tanggal || $kategori || $siswa) {
        $aspirasi = $model->filter($tanggal, $kategori, $siswa);
    } else {
        $aspirasi = $model->getAll();
    }

    $kategoriList = $model->getKategori();
    $siswaList    = $model->getSiswa();

    include 'app/views/admin/Dashboard.php';
}


    public function detail() {
        $model = new AspirasiModel();
        $data = $model->getById($_GET['id']);
        $feedback = $model->getFeedback($_GET['id']);

        include 'app/views/admin/DetailAspirasi.php';
    }

    public function proses() {
        $model = new AspirasiModel();
        $model->updateStatus($_POST['id_aspirasi'], $_POST['status']);
        $model->tambahFeedback($_POST['id_aspirasi'], $_POST['pesan']);

        header("Location: Index.php?controller=AdminController&action=dashboard");
        exit;
    }
}
