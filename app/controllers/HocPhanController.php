<?php
require_once('app/config/database.php');
require_once('app/models/HocPhanModel.php');

class HocPhanController
{
    private $hocPhanModel;

    public function __construct()
    {
        $db = (new Database())->getConnection();
        $this->hocPhanModel = new HocPhanModel($db);
    }

    public function index()
    {
        $hocPhans = $this->hocPhanModel->getHocPhans();
        include 'app/views/hocphan/list.php';
    }

    public function add()
    {
        include 'app/views/hocphan/add.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaHP = filter_input(INPUT_POST, 'MaHP', FILTER_SANITIZE_STRING);
            $TenHP = filter_input(INPUT_POST, 'TenHP', FILTER_SANITIZE_STRING);
            $SoTinChi = filter_input(INPUT_POST, 'SoTinChi', FILTER_VALIDATE_INT);

            if ($MaHP && $TenHP && $SoTinChi) {
                $this->hocPhanModel->addHocPhan($MaHP, $TenHP, $SoTinChi);
                header('Location: index.php?controller=HocPhanController&action=index');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Vui lòng nhập đầy đủ thông tin học phần!</div>";
            }
        }
    }

    public function edit()
    {
        $MaHP = filter_input(INPUT_GET, 'MaHP', FILTER_SANITIZE_STRING);
        if ($MaHP) {
            $hocPhan = $this->hocPhanModel->getHocPhanByMaHP($MaHP);
            if ($hocPhan) {
                include 'app/views/hocphan/edit.php';
            } else {
                echo "<div class='alert alert-danger'>Lỗi: Không tìm thấy học phần!</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Lỗi: Mã học phần không hợp lệ!</div>";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaHP = filter_input(INPUT_POST, 'MaHP', FILTER_SANITIZE_STRING);
            $TenHP = filter_input(INPUT_POST, 'TenHP', FILTER_SANITIZE_STRING);
            $SoTinChi = filter_input(INPUT_POST, 'SoTinChi', FILTER_VALIDATE_INT);

            if ($MaHP && $TenHP && $SoTinChi) {
                $this->hocPhanModel->updateHocPhan($MaHP, $TenHP, $SoTinChi);
                header('Location: index.php?controller=HocPhanController&action=index');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Vui lòng nhập đầy đủ thông tin học phần!</div>";
            }
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaHP = filter_input(INPUT_POST, 'MaHP', FILTER_SANITIZE_STRING);
            if ($MaHP) {
                $this->hocPhanModel->deleteHocPhan($MaHP);
                header('Location: index.php?controller=HocPhanController&action=index');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Lỗi: Mã học phần không hợp lệ!</div>";
            }
        }
    }
}
?>