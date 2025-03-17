<?php
require_once('app/config/database.php');
require_once('app/models/StudentsModel.php');

class StudentsController
{
    private $studentsModel;

    public function __construct()
    {
        $db = (new Database())->getConnection();
        $this->studentsModel = new StudentsModel($db);
    }

    public function index()
    {
        $students = $this->studentsModel->getStudents();
        include 'app/views/student/list.php';
    }

    public function add()
    {
        include 'app/views/student/add.php';
    }

    public function save()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaSV = filter_input(INPUT_POST, 'MaSV', FILTER_SANITIZE_STRING);
            $HoTen = filter_input(INPUT_POST, 'HoTen', FILTER_SANITIZE_STRING);
            $GioiTinh = filter_input(INPUT_POST, 'GioiTinh', FILTER_SANITIZE_STRING);
            $NgaySinh = filter_input(INPUT_POST, 'NgaySinh', FILTER_SANITIZE_STRING);
            $MaNganh = filter_input(INPUT_POST, 'MaNganh', FILTER_SANITIZE_STRING);

            // Xử lý ảnh
            $Hinh = null;
            if (!empty($_FILES['Hinh']['name'])) {
                $target_dir = "uploads/";
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                $Hinh = $target_dir . basename($_FILES['Hinh']['name']);
                move_uploaded_file($_FILES['Hinh']['tmp_name'], $Hinh);
            }

            if ($MaSV && $HoTen && $GioiTinh && $NgaySinh && $MaNganh) {
                $this->studentsModel->addStudent($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh);
                header('Location: index.php?controller=StudentsController&action=index');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Vui lòng nhập đầy đủ thông tin sinh viên!</div>";
            }
        }
    }

    public function edit()
    {
        $MaSV = filter_input(INPUT_GET, 'MaSV', FILTER_SANITIZE_STRING);
        if ($MaSV) {
            $student = $this->studentsModel->getStudentByMaSV($MaSV);
            if ($student) {
                include 'app/views/student/edit.php';
            } else {
                echo "<div class='alert alert-danger'>Lỗi: Không tìm thấy sinh viên!</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Lỗi: Mã số sinh viên không hợp lệ!</div>";
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaSV = filter_input(INPUT_POST, 'MaSV', FILTER_SANITIZE_STRING);
            $HoTen = filter_input(INPUT_POST, 'HoTen', FILTER_SANITIZE_STRING);
            $GioiTinh = filter_input(INPUT_POST, 'GioiTinh', FILTER_SANITIZE_STRING);
            $NgaySinh = filter_input(INPUT_POST, 'NgaySinh', FILTER_SANITIZE_STRING);
            $MaNganh = filter_input(INPUT_POST, 'MaNganh', FILTER_SANITIZE_STRING);
            $old_Hinh = filter_input(INPUT_POST, 'old_Hinh', FILTER_SANITIZE_STRING);

            $Hinh = $old_Hinh; // Mặc định giữ ảnh cũ

            // Xử lý upload ảnh mới
            if (!empty($_FILES['Hinh']['name'])) {
                $target_dir = "uploads/";

                // Đảm bảo thư mục tồn tại
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                // Tạo tên file mới để tránh trùng lặp
                $Hinh_name = time() . "_" . basename($_FILES['Hinh']['name']);
                $Hinh_path = $target_dir . $Hinh_name;

                if (move_uploaded_file($_FILES['Hinh']['tmp_name'], $Hinh_path)) {
                    $Hinh = $Hinh_path; // Lưu ảnh mới vào database

                    // Xóa ảnh cũ nếu có
                    if (!empty($old_Hinh) && file_exists($old_Hinh)) {
                        unlink($old_Hinh);
                    }
                }
            }

            if ($MaSV && $HoTen && $GioiTinh && $NgaySinh && $MaNganh) {
                $this->studentsModel->updateStudent($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh);
                header('Location: index.php?controller=StudentsController&action=index');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Vui lòng nhập đầy đủ thông tin sinh viên!</div>";
            }
        }
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaSV = filter_input(INPUT_POST, 'MaSV', FILTER_SANITIZE_STRING);
            if ($MaSV) {
                $this->studentsModel->deleteStudent($MaSV);
                header('Location: index.php?controller=StudentsController&action=index');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Lỗi: Mã số sinh viên không hợp lệ!</div>";
            }
        }
    }
    public function show()
    {
        $MaSV = filter_input(INPUT_GET, 'MaSV', FILTER_SANITIZE_STRING);
        if ($MaSV) {
            $student = $this->studentsModel->getStudentByMaSV($MaSV);
            if ($student) {
                include 'app/views/student/show.php';
            } else {
                echo "<div class='alert alert-danger'>Lỗi: Không tìm thấy sinh viên!</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Lỗi: Mã số sinh viên không hợp lệ!</div>";
        }
    }
}
?>