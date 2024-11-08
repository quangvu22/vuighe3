<?php
require_once 'ketnoi.php';

if (isset($_GET['sid'])) {
    $id = $_GET['sid'];
    $sql = "SELECT * FROM phims WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tenphim = $_POST['tenphim'];
    $link = $_POST['link'];
    $loai = $_POST['loai'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $target_dir = "image/";
    $target_file = $target_dir . basename($hinhanh);

    if ($hinhanh) {
        $check = getimagesize($_FILES['hinhanh']['tmp_name']);
        if ($check !== false) {
            if (move_uploaded_file($_FILES['hinhanh']['tmp_name'], $target_file)) {
                // Xóa tệp hình ảnh cũ
                if (file_exists("image/" . $row['hinhanh'])) {
                    unlink("image/" . $row['hinhanh']);
                }
                $sql = "UPDATE phims SET tenphim = '$tenphim', link = '$link', hinhanh = '$hinhanh' , loai = '$loai' WHERE id = $id";
            } else {
                echo "Xin lỗi, đã xảy ra lỗi khi tải lên tệp của bạn.";
            }
        } else {
            echo "Tệp không phải là ảnh.";
        }
    } else {
        $sql = "UPDATE phims SET tenphim = '$tenphim', link = '$link', loai = '$loai' WHERE id = $id";
    }

    if (mysqli_query($conn, $sql)) {
        header("Location: lietke.php");
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa phim</title>
</head>
<body>
    <div class="container">
        <h1>Chỉnh sửa phim</h1>
        <form action="edit.php?sid=<?php echo $id; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tenphim">Tên Phim</label>
                <input type="text" id="tenphim" class="form-control" name="tenphim" value="<?php echo $row['tenphim']; ?>" required>
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" id="link" class="form-control" name="link" value="<?php echo $row['link']; ?>" required>  
            </div>
            <div class="form-group">
                <label for="hinhanh">Hình ảnh</label>
                <input type="file" id="hinhanh" class="form-control" name="hinhanh" accept="image/*">
            </div>
            <div>
            <?php
$selected_option =$row['loai'];
?>
            <div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="loai" id="option1" value="1" <?php echo ($selected_option == 1) ? 'checked' : ''; ?>>
        <label class="form-check-label" for="option1">
            Slider
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="loai" id="option2" value="2" <?php echo ($selected_option == 2) ? 'checked' : ''; ?>>
        <label class="form-check-label" for="option2">
            Tập mới nhất
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="loai" id="option3" value="3" <?php echo ($selected_option == 3) ? 'checked' : ''; ?>>
        <label class="form-check-label" for="option3">
            Bộ sưu tập
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="loai" id="option4" value="4" <?php echo ($selected_option == 4) ? 'checked' : ''; ?>>
        <label class="form-check-label" for="option4">
            ANIME MOVIE
        </label>
    </div>
</div>
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
    </div>
</body>
</html>
