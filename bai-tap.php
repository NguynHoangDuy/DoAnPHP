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
    <link rel="icon" type="image/x-icon" href="./assets/images/blue_tea_logo.webp">
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
                <div class="info-item">
                    <img src="./assets/images/avatar-hoang-duy.jpg" alt="" class="info-img">
                    <h4 class="info-content">
                        Nguyễn Hoàng Duy
                    </h4>
                    <div class="exercise-list">
                        <div class="exercise-group w100">
                            <p class="exercise-title">PHP & FORM</p>
                            <ul class="exercise-item ">
                                <li> <a href="./bai-tap/nguyen-hoang-duy-form/bai1.php">Exercise 1</a> </li>
                                <li> <a href="./bai-tap/nguyen-hoang-duy-form/bai2.php">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                                <li> <a href="">Exercise 8</a> </li>
                            </ul>
                        </div>
                        <div class="exercise-group w100">
                            <p class="exercise-title">MẢNG, CHUỖI & HÀM</p>
                            <ul class="exercise-item">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                            </ul>
                        </div>
                        <div class="exercise-group w100">
                            <p class="exercise-title">KẾT HỢP PHP & MYSQL</p>
                            <ul class="exercise-item">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                                <li> <a href="">Exercise 8</a> </li>
                                <li> <a href="">Exercise 9</a> </li>
                                <li> <a href="">Exercise 10</a> </li>
                            </ul>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="info-item">
                    <img src="./assets/images/avatar-phuong.jpg" alt="" class="info-img">
                    <h4 class="info-content">
                        Lê Thị Thu Phương
                    </h4>
                    <div class="exercise-list">
                        <div class="exercise-group w100">
                            <p class="exercise-title">PHP & FORM</p>
                            <ul class="exercise-item ">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                                <li> <a href="">Exercise 8</a> </li>
                            </ul>
                        </div>
                        <div class="exercise-group w100">
                            <p class="exercise-title">MẢNG, CHUỖI & HÀM</p>
                            <ul class="exercise-item">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                            </ul>
                        </div>
                        <div class="exercise-group w100">
                            <p class="exercise-title">KẾT HỢP PHP & MYSQL</p>
                            <ul class="exercise-item">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                                <li> <a href="">Exercise 8</a> </li>
                                <li> <a href="">Exercise 9</a> </li>
                                <li> <a href="">Exercise 10</a> </li>
                            </ul>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="info-item">
                    <img src="./assets/images/avatar-anh-phu.jpg" alt="" class="info-img">
                    <h4 class="info-content">
                        Đặng Anh Phú
                    </h4>
                    <div class="exercise-list">
                        <div class="exercise-group w100">
                            <p class="exercise-title">PHP & FORM</p>
                            <ul class="exercise-item ">
                                <?php
                                    $path = './bai-tap/DangAnhPhu_Lab/form/';
                                
                                echo '
                                    <li> <a href="'.$path.'bai1/lab1.php">Exercise 1</a> </li>
                                    <li> <a href="'.$path.'bai2/lab2.php">Exercise 2</a> </li>
                                    <li> <a href="'.$path.'bai3/lab3.php">Exercise 3</a> </li>
                                    <li> <a href="'.$path.'bai4/lab4.php">Exercise 4</a> </li>
                                    <li> <a href="'.$path.'bai5/lab5.php">Exercise 5</a> </li>
                                    <li> <a href="'.$path.'bai6/input_page.php">Exercise 6</a> </li>
                                    <li> <a href="'.$path.'bai7/input_page.php">Exercise 7</a> </li>
                                    <li> <a href="'.$path.'bai8/form.html">Exercise 8</a> </li>
                                ';
                                ?>
                            </ul>
                        </div>
                        <div class="exercise-group w100">
                            <p class="exercise-title">MẢNG, CHUỖI & HÀM</p>
                            <ul class="exercise-item">
                            <?php
                                    $path = './bai-tap/DangAnhPhu_Lab/array_string_func/';
                                
                                echo '
                                    <li> <a href="'.$path.'less1/less1.php">Exercise 1</a> </li>
                                    <li> <a href="'.$path.'less2/less2.php">Exercise 2</a> </li>
                                    <li> <a href="'.$path.'less3/less3.php">Exercise 3</a> </li>
                                    <li> <a href="'.$path.'less4/less4.php">Exercise 4</a> </li>
                                    <li> <a href="'.$path.'less5/less5.php">Exercise 5</a> </li>
                                    <li> <a href="'.$path.'less6/less6.php">Exercise 6</a> </li>
                                    <li> <a href="'.$path.'less7/less7.php">Exercise 7</a> </li>
                                ';
                                ?>
                            </ul>
                        </div>
                        <div class="exercise-group w100">
                            <p class="exercise-title">KẾT HỢP PHP & MYSQL</p>
                            <ul class="exercise-item">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                                <li> <a href="">Exercise 8</a> </li>
                                <li> <a href="">Exercise 9</a> </li>
                                <li> <a href="">Exercise 10</a> </li>
                            </ul>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="info-item">
                    <img src="./assets/images/profile.jpg" alt="" class="info-img">
                    <h4 class="info-content">
                        Nguyễn Mai Thi
                    </h4>
                    <div class="exercise-list">
                        <div class="exercise-group w100">
                            <p class="exercise-title">PHP & FORM</p>
                            <ul class="exercise-item ">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                                <li> <a href="">Exercise 8</a> </li>
                            </ul>
                        </div>
                        <div class="exercise-group w100">
                            <p class="exercise-title">MẢNG, CHUỖI & HÀM</p>
                            <ul class="exercise-item">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                            </ul>
                        </div>
                        <div class="exercise-group w100">
                            <p class="exercise-title">KẾT HỢP PHP & MYSQL</p>
                            <ul class="exercise-item">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                                <li> <a href="">Exercise 8</a> </li>
                                <li> <a href="">Exercise 9</a> </li>
                                <li> <a href="">Exercise 10</a> </li>
                            </ul>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="info-item">
                    <img src="" alt="" class="info-img">
                    <h4 class="info-content">
                        Tôn Huỳnh Phương Lan
                    </h4>
                    <div class="exercise-list">
                        <div class="exercise-group w100">
                            <p class="exercise-title">PHP & FORM</p>
                            <ul class="exercise-item ">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                                <li> <a href="">Exercise 8</a> </li>
                            </ul>
                        </div>
                        <div class="exercise-group w100">
                            <p class="exercise-title">MẢNG, CHUỖI & HÀM</p>
                            <ul class="exercise-item">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                            </ul>
                        </div>
                        <div class="exercise-group w100">
                            <p class="exercise-title">KẾT HỢP PHP & MYSQL</p>
                            <ul class="exercise-item">
                                <li> <a href="">Exercise 1</a> </li>
                                <li> <a href="">Exercise 2</a> </li>
                                <li> <a href="">Exercise 3</a> </li>
                                <li> <a href="">Exercise 4</a> </li>
                                <li> <a href="">Exercise 5</a> </li>
                                <li> <a href="">Exercise 6</a> </li>
                                <li> <a href="">Exercise 7</a> </li>
                                <li> <a href="">Exercise 8</a> </li>
                                <li> <a href="">Exercise 9</a> </li>
                                <li> <a href="">Exercise 10</a> </li>
                            </ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include("./block/footer.php");
    ?>
</body>
<script src="./assets/js/main.js"></script>
</html>