<?php
require_once 'ketnoi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tenphim = $_POST['tenphim'];
    $link = $_POST['link'];
    $loai = $_POST['loai'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $target_dir = "image/";
    $target_file = $target_dir . basename($hinhanh);
    
    // Kiểm tra nếu tệp là ảnh hợp lệ
    $check = getimagesize($_FILES['hinhanh']['tmp_name']);
    if($check !== false) {
        if (move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO phims (tenphim, link, hinhanh,loai) VALUES ('$tenphim', '$link', '$hinhanh','$loai')";
            if (mysqli_query($conn, $sql)) {
                header("Location: lietke.php");
            } else {
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Xin lỗi, đã xảy ra lỗi khi tải lên tệp của bạn.";
        }
    } else {
        echo "Tệp không phải là ảnh.";
    }
}

mysqli_close($conn);
?>
