<?php include(__DIR__ . '/../shares/header.php'); ?>

<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">Thông tin chi tiết sinh viên</h2>
    
    <div class="card">
        <div class="card-header">
            <h3><?= htmlspecialchars($student['HoTen']) ?></h3>
        </div>
        <div class="card-body">
            <p><strong>Mã số sinh viên:</strong> <?= htmlspecialchars($student['MaSV']) ?></p>
            <p><strong>Giới Tính:</strong> <?= htmlspecialchars($student['GioiTinh']) ?></p>
            <p><strong>Ngày Sinh:</strong> <?= htmlspecialchars($student['NgaySinh']) ?></p>
            <p><strong>Mã Ngành:</strong> <?= htmlspecialchars($student['MaNganh']) ?></p>
            <?php if (!empty($student['Hinh']) && file_exists($student['Hinh'])): ?>
                <img src="<?= htmlspecialchars($student['Hinh']) ?>" alt="Hình ảnh sinh viên" class="img-thumbnail mt-2" style="width: 200px; height: 200px; object-fit: cover;">
            <?php endif; ?>
        </div>
        <div class="card-footer">
            <a href="index.php?controller=StudentsController&action=index" class="btn btn-secondary">Quay lại</a>
        </div>
    </div>
</div>

<?php include(__DIR__ . '/../shares/footer.php'); ?>