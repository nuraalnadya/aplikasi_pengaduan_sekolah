<?php
class SiswaController {

    public function dashboard() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'siswa') {
            header("Location: index.php");
            exit;
        }

        include 'app/views/siswa/Dashboard.php';
    }

    public function histori() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'siswa') {
            header("Location: index.php");
            exit;
        }

        require_once 'app/models/AspirasiModel.php';
        $model = new AspirasiModel();
        $histori = $model->getHistoriSiswa($_SESSION['user']['id_user']);

        include 'app/views/siswa/HistoriAspirasi.php';
    }

    public function edit() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'siswa') {
            header("Location: index.php");
            exit;
        }

        require_once 'app/models/AspirasiModel.php';

        $id = $_GET['id'];
        $model = new AspirasiModel();
        $data = $model->getById($id);

        include 'app/views/siswa/Edit.php';
    }

    public function update() {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'siswa') {
            header("Location: index.php");
            exit;
        }

        require_once 'app/models/AspirasiModel.php';

        $id = $_POST['id'];
        $judul = $_POST['judul'];

        $model = new AspirasiModel();
        $model->update($id, $judul);

        header("Location: index.php?controller=SiswaController&action=histori");
        exit;
    }
}