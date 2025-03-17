<?php include(__DIR__ . '/../shares/header.php'); ?>

<div class="container mt-4">
    <h2 class="text-center text-primary mb-4">Danh sách học phần</h2>
    
    <div class="table-responsive">
        <table class="table table-hover table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Mã HP</th>
                    <th>Tên HP</th>
                    <th>Số Tín Chỉ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($hocPhans)) : ?>
                    <?php foreach ($hocPhans as $hocPhan): ?>
                        <tr>
                            <td><?= htmlspecialchars($hocPhan['MaHP']) ?></td>
                            <td><?= htmlspecialchars($hocPhan['TenHP']) ?></td>
                            <td><?= htmlspecialchars($hocPhan['SoTinChi']) ?></td>
                            <td>
                                <a href="index.php?controller=HocPhanController&action=edit&MaHP=<?= $hocPhan['MaHP'] ?>" 
                                   class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="index.php?controller=HocPhanController&action=delete" method="POST" style="display:inline;">
                                    <input type="hidden" name="MaHP" value="<?= $hocPhan['MaHP'] ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa học phần này?');">
                                        <i class="fas fa-trash-alt"></i> Xóa
                                    </button>
                                </form>
                                <a href="index.php?controller=DangKyController&action=dangky&MaHP=<?= $hocPhan['MaHP'] ?>" 
                                   class="btn btn-success btn-sm">
                                    <i class="fas fa-check"></i> Đăng ký
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="4" class="text-center text-muted">Không có học phần nào.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include(__DIR__ . '/../shares/footer.php'); ?>