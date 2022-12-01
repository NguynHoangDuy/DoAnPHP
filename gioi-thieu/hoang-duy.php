<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nguyên Liệu Trà Sữa</title>
	<link rel="stylesheet" href="../assets/css/main.css"/>
    <link rel="icon" type="image/x-icon" href="../assets/images/blue_tea_logo.webp">
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include("../block/connection.php");
        // include("../block/global.php");
        include("../block/header.php");
    ?>
    <div class="infos">
        <div class="container">
            <div class="infos-header">
                <h3 class="info-header-title">A bit about me</h3>
                <h2 class="info-header-ques">Who Am I</h2>
            </div>
            <div class="infos-content">
                <div class="infos-desc">
                    <img src="../assets/images/avatar-hoang-duy.jpg" alt="" class="infos-img">
                    <p class="infos-name">Nguyễn Hoàng Duy</p>
                    <a href="tel:0369454037" class="infos-phone">
                        <i class="fa-solid fa-phone"></i> 0369454037</a>
                    <a href="mailto:nguyenhoangduy933@gmail.com" class="infos-email">
                        <i class="fa-solid fa-envelope"></i>nguyenhoangduy933@gmail.com</a>
                    <a href="https://github.com/NguynHoangDuy" target="_blank" class="infos-git"> <i class="fa-brands fa-git-alt"></i> NguynHoangDuy</a>
                </div>
                <div class="info-knowlege">
                    <div class="infos-item">
                        <img src="../assets/images/html-icon.png" alt="" class="infos-item-img">
                        <p class="infos-item-title">HTML</p>
                    </div>
                    <div class="infos-item">
                        <img src="../assets/images/css-icon.png" alt="" class="infos-item-img">
                        <p class="infos-item-title">CSS</p>
                    </div>
                    <div class="infos-item">
                        <img src="../assets/images/js-icon.webp" alt="" class="infos-item-img">
                        <p class="infos-item-title">JS</p>
                    </div>
                    <div class="infos-item">
                        <img src="../assets/images/php-icon.png" alt="" class="infos-item-img">
                        <p class="infos-item-title">PHP</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="exercise">
                <h2 class="info-header-ques">Exercise</h2>
                <div class="exercise-list">
                <div class="exercise-group">
                            <p class="exercise-title">PHP & FORM</p>
                            <ul class="exercise-item ">
                                <li> <a href="../bai-tap/nguyen-hoang-duy-form/bai1.php">Exercise 1</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-form/bai2.php">Exercise 2</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-form/bai3.php">Exercise 3</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-form/bai4.php">Exercise 4</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-form/bai5.php">Exercise 5</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-form/bai6.php">Exercise 6</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-form/bai7.php">Exercise 7</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-form/bai8.php">Exercise 8</a> </li>
                            </ul>
                        </div>
                        <div class="exercise-group">
                            <p class="exercise-title">MẢNG, CHUỖI & HÀM</p>
                            <ul class="exercise-item">
                                <li> <a href="../bai-tap/nguyen-hoang-duy-func/bai1.php">Exercise 1</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-func/bai2.php">Exercise 2</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-func/bai3.php">Exercise 3</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-func/bai4.php">Exercise 4</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-func/bai5.php">Exercise 5</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-func/bai6.php">Exercise 6</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-func/bai7.php">Exercise 7</a> </li>
                            </ul>
                        </div>
                        <div class="exercise-group">
                            <p class="exercise-title">KẾT HỢP PHP & MYSQL</p>
                            <ul class="exercise-item">
                                <li> <a href="../bai-tap/nguyen-hoang-duy-mysql/Bai2-1.php">Exercise 1</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-mysql/Bai2-2.php">Exercise 2</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-mysql/Bai2-3.php">Exercise 3</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-mysql/Bai2-4.php">Exercise 4</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-mysql/Bai2-5.php">Exercise 5</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-mysql/Bai2-6.php">Exercise 6</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-mysql/Bai2-7.php">Exercise 7</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-mysql/Bai2-8.php">Exercise 8</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-mysql/Bai2-9.php">Exercise 9</a> </li>
                                <li> <a href="../bai-tap/nguyen-hoang-duy-mysql/Bai2-10.php">Exercise 10</a> </li>
                            </ul>
                            </ul>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <?php
        include("../block/footer.php");
    ?>
</body>
<script src="../assets/js/main.js"></script>

</html>