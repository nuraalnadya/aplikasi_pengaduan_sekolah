<?php
require_once 'app/models/UserModel.php';

class LoginController {

    public function index() {
        include 'app/views/Login.php';
    }

    public function proses() {
        $model = new UserModel();

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = $model->login($username, $password);

        if ($user) {
            $_SESSION['user'] = $user;

            // ✅ redirect berdasarkan role
            if ($user['role'] == 'admin') {
                header("Location: Index.php?controller=AdminController&action=dashboard");
            } else if ($user['role'] == 'siswa') {
                header("Location: Index.php?controller=SiswaController&action=dashboard");
            } else {
                // fallback kalau role tidak dikenali
                header("Location: Index.php");
            }

            exit;
        }

        // ✅ TAMBAHAN (JANGAN DIHAPUS)
        // kalau login gagal
        $_SESSION['error'] = "Username atau Password salah!";
        header("Location: Index.php");
        exit;
    }

    public function logout() {
        session_unset();
        session_destroy();
        header("Location: Index.php");
        exit;
    }
}