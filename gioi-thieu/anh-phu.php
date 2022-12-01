<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đặng Anh Phú - Giới Thiệu</title>
	<link rel="stylesheet" href="../assets/css/main.css"/>
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include("../block/header.php");
    ?>

    <div class="content-profile">

        <div class="card-profile">
            <div class="img-profile">
                <img src="../assets/images/avatar-anh-phu.jpg" alt="" width="100%">
            </div>

            <div class="profile">
                <div class="profile-name">Đặng Anh Phú</div>
                <div class="profile-text">FullStack Developer</div>
                <i class="fas fa-thumbtack"></i>
                <strong class="profile-address">Quy Nhơn, Bình Định</strong>

                <div class="load">
                    <hr/><hr/><hr/><hr/>
                </div>

                <div class="profile-social">
                    <a href="https://www.facebook.com/phudcod/" class="fb-anhphu">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/anhphu.01/" class="ig-anhphu">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://github.com/danganhphu" class="github-anhphu">
                        <i class="fab fa-github"></i>
                    </a>
                </div>

                <div class="profile-button">
                    <button class="btn-info btn-blue"><a href="https://m.me/phudcod">Message</a></button>
                    <button class="btn-info btn-orange"><a href="#">Follow</a></button>
                </div>

            </div>
        </div>

    </div>

    <?php
        include("../block/footer.php");
    ?>
</body>
</html>