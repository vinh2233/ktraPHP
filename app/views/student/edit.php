<?php include(__DIR__ . '/../shares/header.php'); ?>


<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">Chỉnh sửa thông tin sinh viên</h2>
    
    <form action="index.php?controller=StudentsController&action=update" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="old_Hinh" value="<?= htmlspecialchars($student['Hinh']) ?>">
        
        <div class="form-group">
            <label for="MaSV">Mã số sinh viên</label>
            <input type="text" class="form-control" id="MaSV" name="MaSV" value="<?= htmlspecialchars($student['MaSV']) ?>" required>
        </div>
        <div class="form-group">
            <label for="HoTen">Họ và Tên</label>
            <input type="text" class="form-control" id="HoTen" name="HoTen" value="<?= htmlspecialchars($student['HoTen']) ?>" required>
        </div>
        <div class="form-group">
            <label for="GioiTinh">Giới Tính</label>
            <select class="form-control" id="GioiTinh" name="GioiTinh" required>
                <option value="Nam" <?= $student['GioiTinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                <option value="Nữ" <?= $student['GioiTinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="NgaySinh">Ngày Sinh</label>
            <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" value="<?= htmlspecialchars($student['NgaySinh']) ?>" required>
        </div>
        <div class="form-group">
            <label for="Hinh">Hình ảnh</label>
            <input type="file" class="form-control-file" id="Hinh" name="Hinh">
            <?php if (!empty($student['Hinh']) && file_exists($student['Hinh'])): ?>
                <img src="<?= htmlspecialchars($student['Hinh']) ?>" alt="Hình ảnh sinh viên" class="img-thumbnail mt-2" style="width: 100px; height: 100px; object-fit: cover;">
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="MaNganh">Mã Ngành</label>
            <input type="text" class="form-control" id="MaNganh" name="MaNganh" value="<?= htmlspecialchars($student['MaNganh']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
    </form>
</div>

<?php include(__DIR__ . '/../shares/footer.php'); ?>
