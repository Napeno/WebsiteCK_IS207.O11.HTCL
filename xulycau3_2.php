<?php
    include "connect.php";
    $mahd = $_GET["mahd"];
    $maphong = $_GET["maphong"];
    $sql = "DELETE FROM thue WHERE MaHD = '$mahd' AND MaPhong = '$maphong'";

    if($connect->query($sql)) {
        echo "Thành công";
    } else {
        echo "Thất bại: " . $connect->error;
    }
?>
