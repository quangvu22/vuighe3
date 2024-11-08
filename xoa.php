<?php
//lấy dữ liệu id cần xóa
$svid = $_GET['sid'];
// echo $id;
//kết nối
require_once 'ketnoi.php';
//câu lệnh sql
$xoa_sql = "DELETE FROM phims WHERE id=$svid";

mysqli_query($conn, $xoa_sql);
// echo "<h1>Xóa thành công</h1>";

//Trở về trang liệt kê
header("Location: lietke.php");
?>