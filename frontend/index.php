<?php
// Kết nối
require_once '../ketnoi.php';

// Tập mới nhất
// Câu lệnh SQL để lấy dữ liệu từ bảng phims
$sql = "SELECT * FROM phims WHERE loai = 2 ORDER BY id DESC LIMIT 4";

// Thực thi câu lệnh SQL
$result = mysqli_query($conn, $sql);


// Dữ liêu liệu của movie
// Câu lệnh SQL để lấy dữ liệu từ bảng phims
$sqlMovie = "SELECT * FROM phims where loai = 4";

// Thực thi câu lệnh SQL
$resultMovie = mysqli_query($conn, $sqlMovie);

//Bộ siêu tập
// Câu lệnh SQL để lấy dữ liệu từ bảng phims
$sqlBST = "SELECT * FROM phims where loai = 3";
$resultBST = mysqli_query($conn, $sqlBST);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="responsive.css">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="https://vuighe3.com/favicon.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Vui Ghê Anime Vietsub Online</title>
</head>
<body>
    <style>
    </style>
    <div class="anhvuighe">
        <a class="vuigheanh" href="http://localhost:8888/frontend/index.php">
            <img class="h-full img-small" src="https://vuighe3.com/assets/img/logo_v8.png" alt="VuiGhe.Net">
        </a>
        <div id="toggle">
            <i class="fa-solid fa-bars"></i>
        </div>  
        <nav class="button-container">
          
                <a href="./anime/anime.html">
                <button>Anime</button>
                </a>
            <a href="./Web Movie/movie.html">
               <button>Movie</button>
            </a>
            <a href="./bxh/bxh.html">
               <button>BXH</button>
            </a>
            <a href="./bst/index.html">
               <button>Bộ Siêu Tập</button>
            </a>
            <div class="search-container">
                <input type="text" placeholder="Search..." class="search-input">
                <i class="fas fa-search search-icon"></i>
            </div>
            <div class="login">
                <a href="login.html" id="loginButtonLink">
                    <button class="button-54" role="button" id="loginButton">Đăng Nhập/Đăng Ký</button>
                </a>
                <button class="button-54" role="button" id="logoutButton" style="display: none;">Đăng Xuất và Thoát</button>
            </div>
        </nav>
    </div>

    <div class="vien"></div>
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="images/anhdau1.jpg" alt="anh1">
        </div>
        <div class="mySlides fade">
            <img src="images/anhdau2.jpg" alt="anh1">
        </div>
        <div class="mySlides fade">
            <img src="images/anhdau3.jpg" alt="anh1">
        </div>
        <div class="mySlides fade">
            <img src="images/anhdau4.jpg" alt="anh1">
        </div>
        
    </div>

    <!--Truyền dữ liệu xuống -->
    <p>TẬP MỚI NHẤT</p>
    <div class="anhnen">
    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            // Lấy giá trị từ các cột
            $tenphim = $row['tenphim'];
            $link = $row['link'];
            $hinhanh = $row['hinhanh'];
    ?>
    <div class="anh">
        <a href="<?php echo htmlspecialchars($link); ?>" class="protected-link">
            <img src="../image/<?php echo htmlspecialchars($hinhanh); ?>" alt="<?php echo htmlspecialchars($tenphim); ?>">
            <div class="text-overlay"><?php echo htmlspecialchars($tenphim); ?></div>
        </a>
    </div>
    <?php
        }
    } else {
        echo "Không có dữ liệu.";
    }
    ?>
</div>  
    <div class="anhnen2">
        <div class="anh">
            <a href="https://vuighe3.com/rinkai" class="protected-link">
               <img src="images/anh5.jpg" alt="Mô tả ảnh 1">
               <div class="text-overlay">Rinkai!</div>
            </a>
        </div>
        <div class="anh">
            <a href="https://vuighe3.com/hanma-baki-vs-kengan-ashura/full" class="protected-link">
               <img src="images/anh6.jpg" alt="Mô tả ảnh 2">
               <div class="text-overlay">Hanma Baki VS. Kengan Ashura </div>
            </a>
        </div>
        <div class="anh">
            <a href="https://vuighe3.com/kaijuu-8-gou/tap-11-bat-giu-quai-vat-so-8" class="protected-link">
               <img src="images/anh7.jpg" alt="Mô tả ảnh 3">
               <div class="text-overlay">Kaijuu 8-gou</div> 
            </a>   
        </div>
        <div class="anh">
            <a href="https://vuighe3.com/tensei-shitara-dainana-ouji-datta-node-kimama-ni-majutsu-wo-kiwamemasu/tap-12-cau-tra-loi-cua-lloyd" class="protected-link">  
               <img src="images/anh8.jpg" alt="Mô tả ảnh 3">
               <div class="text-overlay">Tensei shitara Slime Datta Kenn</div>
            </a>
        </div>
    </div>
        
        <p>BỘ SIÊU TẬP</p>
        <div class="anhnen3 ">
            <div class="image_bts">
                <a class="protected-link" href="https://vuighe3.com/bo-suu-tap/anime-mua-xuan-2024">
                    <img src="images/anh9.jpg" alt="ảnh t1">
                </a>
            </div>
            <div class="image-row">
            <?php
    if (mysqli_num_rows($resultBST) > 0) {
        while ($row = mysqli_fetch_assoc($resultBST)) {
            // Lấy giá trị từ các cột
            $tenphim = $row['tenphim']; 
            $link = $row['link'];
            $hinhanh = $row['hinhanh'];
    ?>
                <div class="anh3">
                    <a class="protected-link" href="<?php echo htmlspecialchars($link); ?>">
                        <img src="../image/<?php echo htmlspecialchars($hinhanh); ?>" alt="ảnh t2">
                    </a>
                </div>
                <?php
        }
    } else {
        echo "Không có dữ liệu.";
    }
    ?>    
            </div>
        </div>
        <p>ANIME MOVIE</p>
        <div class="movie">
        <?php
    if (mysqli_num_rows($resultMovie) > 0) {
        while ($row = mysqli_fetch_assoc($resultMovie)) {
            // Lấy giá trị từ các cột
            $tenphim = $row['tenphim'];
            $link = $row['link'];
            $hinhanh = $row['hinhanh'];
    ?>
            <div class="movie1">
                <a href="<?php echo htmlspecialchars($link); ?>" class="protected-link">
                    <img src="../image/<?php echo htmlspecialchars($hinhanh); ?>" alt="">
                    <div class="overlay"></div>
                    <!-- <div class="text"><?php echo htmlspecialchars($hinhanh); ?></div> -->
                </a>
            </div>
            <?php
        }
    } else {
        echo "Không có dữ liệu.";
    }
    ?>  
        </div>    

    <script src="script.js"></script>
    <script src="login.js"></script>
</body>
</html>
