<?php include(__DIR__ . '/../shares/header.php'); ?>

<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">Chỉnh sửa thông tin học phần</h2>
    
    <form action="index.php?controller=HocPhanController&action=update" method="POST">
        <input type="hidden" name="MaHP" value="<?= htmlspecialchars($hocPhan['MaHP']) ?>">
        
        <div class="form-group">
            <label for="TenHP">Tên học phần</label>
            <input type="text" class="form-control" id="TenHP" name="TenHP" value="<?= htmlspecialchars($hocPhan['TenHP']) ?>" required>
        </div>
        <div class="form-group">
            <label for="SoTinChi">Số Tín Chỉ</label>
            <input type="number" class="form-control" id="SoTinChi" name="SoTinChi" value="<?= htmlspecialchars($hocPhan['SoTinChi']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
    </form>
</div>

<?php include(__DIR__ . '/../shares/footer.php'); ?>