<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">Thêm sinh viên mới</h2>
    
    <form action="index.php?controller=StudentsController&action=save" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="MaSV">Mã số sinh viên</label>
            <input type="text" class="form-control" id="MaSV" name="MaSV" required>
        </div>
        <div class="form-group">
            <label for="HoTen">Họ và Tên</label>
            <input type="text" class="form-control" id="HoTen" name="HoTen" required>
        </div>
        <div class="form-group">
            <label for="GioiTinh">Giới Tính</label>
            <select class="form-control" id="GioiTinh" name="GioiTinh" required>
                <option value="Nam">Nam</option>
                <option value="Nữ">Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="NgaySinh">Ngày Sinh</label>
            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
        </div>
        <div class="form-group">
            <label for="Hinh">Hình ảnh</label>
            <input type="file" class="form-control-file" id="Hinh" name="Hinh">
        </div>
        <div class="form-group">
            <label for="MaNganh">Mã Ngành</label>
            <input type="text" class="form-control" id="MaNganh" name="MaNganh" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm sinh viên</button>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>