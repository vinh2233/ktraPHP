<?php
class HocPhanModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getHocPhans() {
        $query = "SELECT * FROM hocphan";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHocPhanByMaHP($MaHP) {
        $query = "SELECT * FROM hocphan WHERE MaHP = :MaHP";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':MaHP', $MaHP);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addHocPhan($MaHP, $TenHP, $SoTinChi) {
        $query = "INSERT INTO hocphan (MaHP, TenHP, SoTinChi) VALUES (:MaHP, :TenHP, :SoTinChi)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':MaHP', $MaHP);
        $stmt->bindParam(':TenHP', $TenHP);
        $stmt->bindParam(':SoTinChi', $SoTinChi);
        return $stmt->execute();
    }

    public function updateHocPhan($MaHP, $TenHP, $SoTinChi) {
        $query = "UPDATE hocphan SET TenHP = :TenHP, SoTinChi = :SoTinChi WHERE MaHP = :MaHP";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':MaHP', $MaHP);
        $stmt->bindParam(':TenHP', $TenHP);
        $stmt->bindParam(':SoTinChi', $SoTinChi);
        return $stmt->execute();
    }

    public function deleteHocPhan($MaHP) {
        $query = "DELETE FROM hocphan WHERE MaHP = :MaHP";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':MaHP', $MaHP);
        return $stmt->execute();
    }
}
?>