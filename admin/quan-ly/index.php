<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyên Liệu Trà Sữa</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
</head>
<body>
    <?php
        session_start();
            $hasAcc = $_SESSION["hasAcc"];
            if($hasAcc != true)
            {
                header("location: ../");
            }
        session_write_close();

        if(isset($_POST["logout"]))
        {
            session_start();
                $_SESSION["hasAcc"] = false;
                header("location: ../");
            session_write_close();
        }
    ?>
    <div class="admin">
        <div class="admin-sidebar">
            <a href="" class="admin-sidebar-logo">
                <img src="../../assets/images/laugh-wink-solid.png" alt="" class="admin-sidebar-img">
                <span>NLTS ADMIN</span>
            </a>
            <ul class="admin-sidebar-list">
                <li class="admin-sidebar-item">
                    <a href="">
                        <img src="../../assets/images/tachometer-alt-solid.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Trang chủ</span>
                    </a>
                </li>
                <li class="admin-sidebar-item">
                    <a href="">
                        <img src="../../assets/images/user-solid.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Nhân Viên</span>
                    </a>
                </li>
                <li class="admin-sidebar-item">
                    <a href="">
                        <img src="../../assets/images/list-solid.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Danh Mục</span>
                    </a>
                </li>
                <li class="admin-sidebar-item">
                    <a href="">
                        <img src="../../assets/images/coffee-solid.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Sản phẩm</span>
                    </a>
                </li>
                <li class="admin-sidebar-item">
                    <a href="">
                        <img src="../../assets/images/newspaper-regular.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Tin tức</span>
                    </a>
                </li>
                <li class="admin-sidebar-item">
                    <a href="">
                        <img src="../../assets/images/file-contract-solid.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Liên Hệ</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="admin-main">
            <div class="admin-header">
                <div class="admin-search">
                    <form action="" method="post">
                        <input type="text" placeholder="Tìm kiếm ..." class="admin-search-input">
                        <button type="submit" class="admin-search-icon">
                            <img src="../../assets/images/search-solid.png" alt="">
                        </button>
                    </form>
                </div>
                <div class="admin-avatar">
                    <p class="admin-avatar-name">Admin</p>
                    <img src="../../assets/images/avatar-admin.jpg" alt="" class="admin-avatar-img">
                    <form action="" method="post">
                        <button name="logout" type ="submit" class="admin-logout-btn">
                            <img src="../../assets/images/log-out-icon.png" alt="">
                        </button>
                    </form>
                </div>
            </div>
            <div class="admin-content">
            </div>
        </div>
    </div>
</body>
</html>