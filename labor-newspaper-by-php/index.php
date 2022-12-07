<?php
    header("Content-type: text/html; charset=utf-8");
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "lao_dong_newspaper";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    mysqli_set_charset($conn, 'UTF8');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức mới nhất 24h - Đọc Báo Lao Động online - Laodong.vn</title>
    <?php
        $sql_logotitle = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logotitle.png'";
        $result = $conn->query($sql_logotitle);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            $logotitle = $row["Name_image"];
            echo "<link rel='icon' href='./images/header_and_footer/$logotitle'/>";
        }}
    ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header class="header position-sticky sticky-top bg-white">
        <div class="header__logo border-bottom">
            <div class="header__logo-container container d-flex justify-content-between">
                <div class="header__logo-laodong w-25">
                    <a href="">
                        <?php
                        $sql_logolaodong = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.ID = 2";
                        $result = $conn->query($sql_logolaodong);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            $logolaodong = $row["Name_image"];
                            echo "<img src='./images/header_and_footer/$logolaodong'/>";
                        }}
                        ?>
                    </a>
                    <p>
                        CƠ QUAN CỦA TỔNG LIÊN ĐOÀN LAO ĐỘNG VIỆT NAM
                    </p>
                </div>
                <div class="header__logo-nav d-flex w-50 align-items-end">
                    <a href="">
                        <?php
                        $sql_logolaodongtv = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logolaodongtv.png'";
                        $result = $conn->query($sql_logolaodongtv);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            $logolaodongtv = $row["Name_image"];
                            echo "<img src='./images/header_and_footer/$logolaodongtv'/>";
                        }}
                        ?>
                    </a>
                    <a href="">
                        <?php
                        $sql_logodulich = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logodulich+.png'";
                        $result = $conn->query($sql_logodulich);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            $logodulich = $row["Name_image"];
                            echo "<img src='./images/header_and_footer/$logodulich'/>";
                        }}
                        ?>
                    </a>
                    <a href="">
                        <?php
                        $sql_logocongdoanvietnam = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logocongdoanvietnam.png'";
                        $result = $conn->query($sql_logocongdoanvietnam);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            $logocongdoanvietnam = $row["Name_image"];
                            echo "<img src='./images/header_and_footer/$logocongdoanvietnam'/>";
                        }}
                        ?>
                    </a>
                    <a href="">
                        <?php
                        $sql_logodantoctongiao = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logodantoctongiao.png'";
                        $result = $conn->query($sql_logodantoctongiao);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            $logodantoctongiao = $row["Name_image"];
                            echo "<img src='./images/header_and_footer/$logodantoctongiao'/>";
                        }}
                        ?>
                    </a>
                    <a href="">
                        <?php
                        $sql_logolaodongtre = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logolaodongtre.png'";
                        $result = $conn->query($sql_logolaodongtre);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            $logolaodongtre = $row["Name_image"];
                            echo "<img src='./images/header_and_footer/$logolaodongtre'/>";
                        }}
                        ?>
                    </a>
                </div>
            </div>
        </div>
        <div class="header__navbar border-bottom">
            <div class="header__navbar-container container d-flex justify-content-between">
                <div class="header__navbar-right navbar">
                    <a href="" class="text-dark fa-solid fa-house-chimney m-1"></a>
                    <a href="" class="text-dark m-1">Media</a>
                    <?php
                    $sql_category = "SELECT * FROM category LIMIT 8;";
                    $result = $conn->query($sql_category);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        ?>  
                            <a href="" class="text-dark m-1"><?= $row["Name"] ?></a>
                        <?php
                        }}
                    ?>
                </div>
                <div class="header__navbar-left navbar">
                    <a href="" class="text-dark m-1">Đọc nhiều<i class="fa-solid fa-arrow-up-right-dots"></i></a>
                    <a href="" class="text-dark m-1">Tìm kiếm<i class="fa-solid fa-magnifying-glass"></i></a>
                    <a href="" class="text-dark m-1">Đăng nhập<i class="fa-regular fa-user"></i></a>
                </div>
            </div>
        </div>  
    </header>
    <div class="main">
        <div class="advertisement container">
            <a href="">
            <?php
            $sql_advertisement1 = "SELECT * FROM images_advertisement WHERE images_advertisement.ID = 1";
            $result = $conn->query($sql_advertisement1);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $advertisement1 = $row["Name_image"];
                echo "<img src='./images/advertisement/$advertisement1'/>";
            }}
            ?>
            </a>
        </div>
        <div class="main__section1 container row">
            <div class="main__section1-left col-9 row border-bottom">
                <div class="main__section1-left-left col-4">
                    <div class="main__section1-left-left1 border-bottom">
                        <?php
                        $sql_post= "SELECT * FROM post 
                        JOIN (SELECT ID AS ID, Date_post FROM post ORDER BY Date_post DESC LIMIT 2) AS A
                        ON post.ID = A.ID
                        ORDER BY post.Date_post ASC
                        LIMIT 1";
                        $result = $conn->query($sql_post);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            ?>   
                                <div>
                                    <img src='./images/content/<?= $row["Avatar"] ?>'/>
                                </div>
                                <h3><?= $row["Title"] ?></h3>
                            <?php
                            }}
                        ?>
                    </div>
                    <div class="main__section1-left-left2">
                        <?php
                        $sql_post= "SELECT * FROM post 
                        JOIN (SELECT ID AS ID, Date_post FROM post ORDER BY Date_post DESC LIMIT 3) AS A
                        ON post.ID = A.ID
                        ORDER BY post.Date_post ASC
                        LIMIT 1";
                        $result = $conn->query($sql_post);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                            ?>   
                                <div>
                                    <img src='./images/content/<?= $row["Avatar"] ?>'/>
                                </div>
                                <h3><?= $row["Title"] ?></h3>
                            <?php
                            }}
                        ?>
                    </div>
                </div>
                <div class="main__section1-left-right col-8">
                    <?php
                    $sql_post= "SELECT * FROM post ORDER BY Date_post DESC LIMIT 1";
                    $result = $conn->query($sql_post);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>   
                        <img src='./images/content/<?= $row["Avatar"] ?>'/>
                        <h1><?= $row["Title"] ?></h1>
                        <p><?= $row["Content"] ?></p>
                    <?php
                    }}
                    ?>
                </div>
            </div>
            <div class="main__section1-right col-3">
                <?php
                    $sql_post= "SELECT * FROM post 
                    JOIN (SELECT ID AS ID, Date_post FROM post ORDER BY Date_post DESC LIMIT 8) AS A
                    ON post.ID = A.ID
                    ORDER BY post.Date_post ASC
                    LIMIT 5";
                    $result = $conn->query($sql_post);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>   
                        <div class="d-flex justify-content-between border-bottom row">
                            <div class="col">
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class="col"><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
        </div>
        <div class="main__section2 container row">
            <?php
            $sql_post= "SELECT * FROM post 
            JOIN (SELECT ID AS ID, Date_post FROM post ORDER BY Date_post DESC LIMIT 11) AS A
            ON post.ID = A.ID
            ORDER BY post.Date_post ASC
            LIMIT 3";
            $result = $conn->query($sql_post);
            if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            ?>   
                <div class="col-3">
                    <div>
                        <img src='./images/content/<?= $row["Avatar"] ?>'/>
                    </div>
                    <h4><?= $row["Title"] ?></h4>
                </div>
            <?php
            }}
            ?>
            <div class="col-3 bg-warning">
                <h3 class="text-dark">
                    SỰ KIỆN BÌNH LUẬN
                </h3>
                <?php
                $sql_post= "SELECT * FROM post 
                JOIN (SELECT ID AS ID, Date_post FROM post ORDER BY Date_post DESC LIMIT 12) AS A
                ON post.ID = A.ID
                ORDER BY post.Date_post ASC
                LIMIT 1";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                ?>   
                    <h3 class='text-dark border-bottom'><?= $row["Title"] ?></h3>
                <?php
                }}
                ?>
                <h3 class="text-dark">
                    NGƯỜI VIỆT TỬ TẾ
                </h3>
                <?php
                $sql_post= "SELECT * FROM post 
                JOIN (SELECT ID AS ID, Date_post FROM post ORDER BY Date_post DESC LIMIT 13) AS A
                ON post.ID = A.ID
                ORDER BY post.Date_post ASC
                LIMIT 1";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                ?>   
                    <h3 class='text-dark'><?= $row["Title"] ?></h3>
                <?php
                }}
                ?>
            </div>
        </div>
        <div class="main__section3 container bg-secondary rounded">
            <div class="main__section3-header d-flex justify-content-between">
                <h2 class="text-danger col-3">Media</h2>
                <div class="text-dark col-5 row">
                    <h3 class="col-3">Lao Động TV</h3>
                    <h3 class="col-3">Hyper Text</h3>
                    <h3 class="col-3">Photo</h3>
                    <h3 class="col-3">Podcast</h3>
                </div>
            </div>
            <div class="main__section3-content row">
                <?php
                $sql_post = "SELECT * FROM post 
                JOIN (SELECT post.ID, post.Date_post FROM post 
                JOIN (SELECT ID AS ID, Date_post FROM post ORDER BY Date_post DESC LIMIT 21) AS A
                ON post.ID = A.ID
                ORDER BY post.Date_post ASC
                LIMIT 8) AS B
                ON post.ID = B.ID
                ORDER BY post.Date_post DESC";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class="col-3 rounded card bg-white">
                            <div>
                                <img src='./images/content/<?= $row["Avatar"] ?>' alt="">
                            </div>
                            <h4><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
        </div>
        <div class="main__section4 container row">
            <div class="main__section4-left col-9 border-right">
                <?php
                $sql_post= "SELECT * FROM post 
                JOIN (SELECT post.ID, post.Date_post FROM post 
                JOIN (SELECT ID AS ID, Date_post FROM post ORDER BY Date_post DESC LIMIT 39) AS A
                ON post.ID = A.ID
                ORDER BY post.Date_post ASC
                LIMIT 18) AS B
                ON post.ID = B.ID
                ORDER BY post.Date_post DESC";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-bottom'>
                            <div class='col-3'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <div class="col-9">
                                <h4><?= $row["Title"] ?></h4>
                                <p><?= $row["Content"] ?></p>
                            </div>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="main__section4-right col-3">
                <div class="advertisement">
                    <a href="">
                    <?php
                    $sql_advertisement2 = "SELECT * FROM images_advertisement WHERE images_advertisement.ID = 4";
                    $result = $conn->query($sql_advertisement2);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        $advertisement2 = $row["Name_image"];
                        echo "<img src='./images/advertisement/$advertisement2'/>";
                    }}
                    ?>
                    </a>
                </div>
                <div class="bg-white border rounded">
                    <h2 class="text-warning">TIỆN ÍCH</h2>
                    <a class="bg-secondary rounded d-flex justify-content-between">
                        <p>Thời tiết</p><i class="fa-solid fa-chevron-right"></i>
                    </a>
                    <a class="bg-secondary rounded d-flex justify-content-between">
                        <p>Tỷ giá ngoại tệ</p><i class="fa-solid fa-chevron-right"></i>
                    </a>
                    <a class="bg-secondary rounded d-flex justify-content-between">
                        <p>Giá vàng</p><i class="fa-solid fa-chevron-right"></i>
                    </a>
                    <a class="bg-secondary rounded d-flex justify-content-between">
                        <p>ATM</p><i class="fa-solid fa-chevron-right"></i>
                    </a>
                    <a class="bg-secondary rounded d-flex justify-content-between">
                        <p>Kết quả xổ số</p><i class="fa-solid fa-chevron-right"></i>
                    </a>
                    <a class="bg-secondary rounded d-flex justify-content-between">
                        <p>Chứng khoán</p><i class="fa-solid fa-chevron-right"></i>
                    </a>
                    <a class="bg-secondary rounded d-flex justify-content-between">
                        <p>Truyền hình</p><i class="fa-solid fa-chevron-right"></i>
                    </a>
                    <a class="bg-secondary rounded d-flex justify-content-between">
                        <p>Giá xăng, dầu</p><i class="fa-solid fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="main__section5 container bg-secondary rounded">
            <div class="main__section5-header">
                <a class="text-danger">SỰ KIỆN</a>
            </div>
            <div class="main__section5-content row">
                <div class="col rounded card bg-white">
                    <a class="text-dark">Vinh quang Việt Nam 2022</a>
                </div>
                <div class="col rounded card bg-white">
                    <a class="text-dark">Vụ cháy quán karaoke ở Bình Dương</a>
                </div>
                <div class="col rounded card bg-white">
                    <a class="text-dark">Sửa đổi Luật Đất đai</a>
                </div>
                <div class="col rounded card bg-white">
                    <a class="text-dark">Vạch trần thủ đoạn tuyển dụng lao động trái phép</a>
                </div>
                <div class="col rounded card bg-white">
                    <a class="text-dark">Dịch COVID-19 gia tăng trở lại</a>
                </div>
            </div>
        </div>
        <div class="advertisement container">
            <a href="">
            <?php
            $sql_advertisement2 = "SELECT * FROM images_advertisement WHERE images_advertisement.ID = 2";
            $result = $conn->query($sql_advertisement2);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $advertisement2 = $row["Name_image"];
                echo "<img src='./images/advertisement/$advertisement2'/>";
            }}
            ?>
            </a>
        </div>
        <div class="main__section6-7-8-9-10 container row">
            <div class="col-3">
                <?php
                $sql_category = "SELECT * FROM category WHERE ID = 1";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>

                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 1 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
                <?php
                $sql_category = "SELECT * FROM category WHERE ID = 2";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 2 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
            <?php
                $sql_category = "SELECT * FROM category WHERE ID = 3";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 3 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
            <?php
                $sql_category = "SELECT * FROM category WHERE ID = 4";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 4 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
        </div>
        <div class="advertisement container">
            <a href="">
            <?php
            $sql_advertisement3 = "SELECT * FROM images_advertisement WHERE images_advertisement.ID = 3";
            $result = $conn->query($sql_advertisement3);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                $advertisement3 = $row["Name_image"];
                echo "<img src='./images/advertisement/$advertisement3'/>";
            }}
            ?>
            </a>
        </div>
        <div class="main__section6-7-8-9-10 container row">
            <div class="col-3">
                <?php
                $sql_category = "SELECT * FROM category WHERE ID = 5";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 5 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
                <?php
                $sql_category = "SELECT * FROM category WHERE ID = 6";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 6 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
            <?php
                $sql_category = "SELECT * FROM category WHERE ID = 7";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 7 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
            <?php
                $sql_category = "SELECT * FROM category WHERE ID = 8";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 8 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
        </div>
        <div class="main__section6-7-8-9-10 container row">
            <div class="col-3">
                <?php
                $sql_category = "SELECT * FROM category WHERE ID = 9";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 9 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
                <?php
                $sql_category = "SELECT * FROM category WHERE ID = 10";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 10 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
            <?php
                $sql_category = "SELECT * FROM category WHERE ID = 11";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 11 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
            <?php
                $sql_category = "SELECT * FROM category WHERE ID = 12";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 12 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
        </div>
        <div class="main__section6-7-8-9-10 container row">
            <div class="col-3">
                <?php
                $sql_category = "SELECT * FROM category WHERE ID = 13";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 13 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
                <?php
                $sql_category = "SELECT * FROM category WHERE ID = 14";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 14 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
            <?php
                $sql_category = "SELECT * FROM category WHERE ID = 15";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 15 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
            <?php
                $sql_category = "SELECT * FROM category WHERE ID = 16";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 16 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
        </div>
        <div class="main__section6-7-8-9-10 container row">
            <div class="col-3">
                <?php
                $sql_category = "SELECT * FROM category WHERE ID = 17";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 17 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
                <?php
                $sql_category = "SELECT * FROM category WHERE ID = 18";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 18 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
            <?php
                $sql_category = "SELECT * FROM category WHERE ID = 19";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 19 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
            <div class="col-3">
            <?php
                $sql_category = "SELECT * FROM category WHERE ID = 20";
                $result = $conn->query($sql_category);
                if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                    $category = $row["Name"];
                    echo "<div class='bg-dark d-flex justify-content-between'><h2 class='text-warning text-uppercase'>$category</h2><i class='bg-secondary fa-solid fa-angle-right'></i></div>";
                }}
                ?>
                
                <?php
                $sql_post = "SELECT * FROM post WHERE ID_category = 20 ORDER BY Date_post DESC LIMIT 5";
                $result = $conn->query($sql_post);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class='row border-top'>
                            <div class='col-5'>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4 class='col-7'><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
        </div>
        <div class="main__section11 container bg-secondary rounded">
            <?php
            $sql_category = "SELECT * FROM category WHERE ID = 21";
            $result = $conn->query($sql_category);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                ?>  
                    <div class="main__section11-header">
                        <a class="text-danger">
                            <?= $row["Name"] ?>
                        </a>
                    </div>
                <?php
                }}
            ?>
            <div class="main__section11-content row">
                <?php
                $sql_business_information = "SELECT * FROM business_information
                ORDER BY Date_post DESC 
                LIMIT 5";
                $result = $conn->query($sql_business_information);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                    ?>  
                        <div class="col rounded card bg-white">
                            <div>
                                <img src='./images/content/<?= $row["Avatar"] ?>'/>
                            </div>
                            <h4><?= $row["Title"] ?></h4>
                        </div>
                    <?php
                    }}
                ?>
            </div>
        </div>           
    </div>
    <footer class="footer">
        <div class="footer__social container d-flex justify-content-center">
            <a href="" class="text-dark">
                <?php
                $sql_logofacebook = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logofacebook.jpg'";
                $result = $conn->query($sql_logofacebook);
                if ($result->num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        $logofacebook = $row["Name_image"];
                        echo "<img src='./images/header_and_footer/$logofacebook'/>";
                    }
                }
                ?>
            </a>
            <a href="" class="text-dark">
                <?php
                $sql_logotwitter = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logotwitter.jpg'";
                $result = $conn->query($sql_logotwitter);
                if ($result->num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        $logotwitter = $row["Name_image"];
                        echo "<img src='./images/header_and_footer/$logotwitter'/>";
                    }
                }
                ?>
            </a>
            <a href="" class="text-dark">
                <?php
                $sql_logoyoutube = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logoyoutube.jpg'";
                $result = $conn->query($sql_logoyoutube);
                if ($result->num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        $logoyoutube = $row["Name_image"];
                        echo "<img src='./images/header_and_footer/$logoyoutube'/>";
                    }
                }
                ?>
            </a>
            <a href="" class="text-dark">
                <?php
                $sql_logomess = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logomess.jpg'";
                $result = $conn->query($sql_logomess);
                if ($result->num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        $logomess = $row["Name_image"];
                        echo "<img src='./images/header_and_footer/$logomess'/>";
                    }
                }
                ?>
            </a>
            <a href="" class="text-dark">
                <?php
                $sql_logorss = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logorss.jpg'";
                $result = $conn->query($sql_logorss);
                if ($result->num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        $logorss = $row["Name_image"];
                        echo "<img src='./images/header_and_footer/$logorss'/>";
                    }
                }
                ?>
            </a>
        </div>
        <div class="footer__review container d-flex justify-content-between">
            <div class="footer__review-logolaodong">
                <a href="">
                    <?php
                    $sql_logolaodong = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.ID = 2";
                    $result = $conn->query($sql_logolaodong);
                    if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $logolaodong = $row["Name_image"];
                        echo "<img src='./images/header_and_footer/$logolaodong'/>";
                    }}
                    ?>
                </a>
            </div>
            <div class="footer__review-1">
                <p>© 1999 - 2021 Báo Lao Động<br>
                    Cơ quan của Tổng Liên đoàn Lao động Việt Nam.<br>
                    All rights reserved.</p>
                <p>Giấy phép số 2013/GP-BTTT do Bộ TTTT cấp ngày 30.10.2012<br>
                    Tổng Biên tập: Nguyễn Ngọc Hiển</p>
                <p>Địa chỉ liên hệ:<br>
                    Số 06, Phạm Văn Bạch, phường Yên Hoà, quận Cầu Giấy, TP.Hà Nội</p>
            </div>
            <div class="footer__review-2">
                <span>Thông tin liên hệ:</span>
                <div>
                    <h4>Tòa soạn:</h4>
                    <p>(+84 24) 38252441 - 35330305</p>
                </div>
                <div>
                    <h4>Báo điện tử:</h4>
                    <p>
                        ĐT: (+84 24) 38303032 - 38303034<br>
                        Email: toasoan@laodong.com.vn
                    </p>
                </div>
                <div>
                    <h4>Quảng cáo:</h4>
                    <p>
                        (+84 24) 39232694 (Báo in)<br>
                        (+84 24) 35335237 (online)
                    </p>
                </div>
                <span>Đường dây nóng: 096 8383388 * Bạn đọc: (+84 24) 35335235</span>
            </div>
        </div>
        <div class="footer__download container d-flex justify-content-center">
            <a href="">
                <?php
                $sql_logogoogleplay = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logogoogleplay.png'";
                $result = $conn->query($sql_logogoogleplay);
                if ($result->num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        $logogoogleplay = $row["Name_image"];
                        echo "<img src='./images/header_and_footer/$logogoogleplay'/>";
                    }
                }
                ?>
            </a>
            <a href="">
                <?php
                $sql_logoappstore = "SELECT * FROM images_header_and_footer WHERE images_header_and_footer.Name_image = 'logoappstore.png'";
                $result = $conn->query($sql_logoappstore);
                if ($result->num_rows > 0) {
                    while ($row = $result -> fetch_assoc()) {
                        $logoappstore = $row["Name_image"];
                        echo "<img src='./images/header_and_footer/$logoappstore'/>";
                    }
                }
                ?>
            </a>
        </div>
        <div class="footer__license container">
            <p>Báo Lao Động giữ bản quyền nội dung trên website này. Báo điện tử Lao Động được phát triển bởi Lao Động Technologies © 2022 - Version: 1.0.2.55.61</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>