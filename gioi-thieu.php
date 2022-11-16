<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyên Liệu Trà Sữa</title>
    <link rel="stylesheet" href="./assets/css/main.css"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
</head>
<body>
    <?php
        include("./block/connection.php");
        include("./block/global.php");
        include("./block/header.php");
    ?>

    <div class="container">
        <div class="info">
            <h3 class="info-header">
                Thông tin cá nhân
            </h3>
            <div class="info-main">
                <a href="" class="info-item">
                    <img src="" alt="" class="info-img">
                    <h4 class="info-content">
                        Nguyễn Hoàng Duy
                    </h4>
                </a>
                <a href="" class="info-item">
                    <img src="" alt="" class="info-img">
                    <h4 class="info-content">
                        Lê Thị Thu Phương
                    </h4>
                </a>
                <a href="" class="info-item">
                    <img src="" alt="" class="info-img">
                    <h4 class="info-content">
                        Đặng Anh Phú
                    </h4>
                </a>
                <a href="./gioi-thieu/mai-thi.php" class="info-item">
                    <img src="" alt="" class="info-img">
                    <h4 class="info-content">
                        Nguyễn Mai Thi
                    </h4>
                </a>
                <a href="" class="info-item">
                    <img src="" alt="" class="info-img">
                    <h4 class="info-content">
                        Tôn Huỳnh Phương Lan
                    </h4>
                </a>
            </div>
        </div>
    </div>
    <?php
        include("./block/footer.php");
    ?>
</body>
<script src="./assets/js/main.js"></script>
</html>