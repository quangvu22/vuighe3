<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liệt kê danh sách phim</title>
</head>
<body>
    <div class="container">
        <h1>Danh sách phim</h1>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Thêm mới phim</button>
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Tên phim</th>
                <th>Link</th>
                <th>Hình ảnh</th>
                <th>Loại</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php
            //kết nối
            require_once 'ketnoi.php';
            //câu lệnh
            $lietke_sql = "SELECT * FROM phims ORDER BY tenphim, link";
            //thực thi câu lệnh
            $result = mysqli_query($conn, $lietke_sql);
            //duyệt qua result và in ra
            while ($r = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td><?php echo $r['tenphim']; ?></td>
                    <td><?php echo $r['link']; ?></td>
                    <td><img src="image/<?php echo $r['hinhanh']; ?>" alt="Hình ảnh phim" style="width:100px;height:auto;"></td>
                    <td>
                        <?php
                        if($r['loai'] == 1){
                            echo 'Sliler';
                        }else if($r['loai'] == 2){
                            echo 'Tập mới nhất';
                        }else if($r['loai'] == 3){
                            echo 'BỘ SIÊU TẬP';
                        }else if($r['loai'] == 4){
                            echo 'ANIME MOVIE';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="edit.php?sid=<?php echo $r['id']; ?>" class="btn btn-info">Sửa</a> 
                        <a onclick="return confirm('Bạn có muốn xóa phim này không?');" href="xoa.php?sid=<?php echo $r['id']; ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            <?php    
            }
        ?>
        </tbody>
        </table>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Form thêm mới phim</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="them.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="tenphim">Tên Phim</label>
                            <input type="text" id="tenphim" class="form-control" name="tenphim" required>
                        </div>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" id="link" class="form-control" name="link" required>  
                        </div>
                        <div class="form-group">
                            <label for="hinhanh">Hình ảnh</label>
                            <input type="file" id="hinhanh" class="form-control" name="hinhanh" accept="image/*" required>
                        </div>
                        <div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="loai" id="option1" value="1" checked>
                    <label class="form-check-label" for="option1">
                        Slider
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="loai" id="option2" value="2">
                    <label class="form-check-label" for="option2">
                        Tập mới nhất
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="loai" id="option3" value="3">
                    <label class="form-check-label" for="option3">
                        Bộ sưu tập
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="loai" id="option4" value="4">
                    <label class="form-check-label" for="option4">
                    ANIME MOVIE
                    </label>
                </div>
            </div>
                        <button type="submit" class="btn btn-primary">Thêm Phim</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
</body>
</html>
