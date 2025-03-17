<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">Danh sách sinh viên</h2>
    
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>MaSV</th>
                    <th>Hình ảnh</th>
                    <th>Họ và Tên</th>
                    <th>Ngày Sinh</th>
                    <th>Giới Tính</th>
                    <th>Mã Ngành</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($students)) : ?>
                    <?php foreach ($students as $student): ?>
                        <tr>
                            <td><?= htmlspecialchars($student['MaSV']) ?></td>
                            <td>
                                <?php 
                                    if (!empty($student['Hinh']) && file_exists($student['Hinh'])) {
                                        $imagePath = htmlspecialchars($student['Hinh']);
                                    } else {
                                        $imagePath = 'uploads/default.jpg'; 
                                    }
                                ?>
                                <img src="<?= $imagePath ?>" 
                                     alt="Hình ảnh sinh viên" 
                                     class="img-thumbnail" 
                                     style="width: 100px; height: 100px; object-fit: cover;">
                            </td>
                            <td><?= htmlspecialchars($student['HoTen']) ?></td>
                            <td><?= htmlspecialchars($student['NgaySinh']) ?></td>
                            <td><?= htmlspecialchars($student['GioiTinh']) ?></td>
                            <td><?= htmlspecialchars($student['MaNganh']) ?></td>
                            <td>
                                <a href="index.php?controller=StudentsController&action=show&MaSV=<?= $student['MaSV'] ?>" 
                                   class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> Xem
                                </a>
                                <a href="index.php?controller=StudentsController&action=edit&MaSV=<?= $student['MaSV'] ?>" 
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="index.php?controller=StudentsController&action=delete" method="POST" style="display:inline;">
                                    <input type="hidden" name="MaSV" value="<?= $student['MaSV'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này?');">
                                        <i class="fas fa-trash-alt"></i> Xóa
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center text-muted">Không có sinh viên nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>