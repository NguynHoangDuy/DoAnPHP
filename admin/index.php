<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyên liệu trà sữa</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="icon" type="image/x-icon" href="./assets/images/blue_tea_logo.webp">
</head>
<body>
    <?php
        if(isset($_POST["submit"]))
        {
            $tk = $_POST["name"];
            $mk = $_POST["pass"];

            if($tk === "admin" || $tk === "admin@gmail.com"  && $mk == "123")
            {
                header("location: ./quan-ly");
                session_start();
                    $_SESSION["hasAcc"] = true;
                session_write_close();
            }
        }
    ?>
    <div class="login-body">
        <div class="login">
            <h3 class="login-title">Đăng nhập</h3>
            <div class="login-content">
                <form action="" method="post">
                    <div class="login-group">
                        <label class="login-label" aria-autocomplete="none">Tên người dùng hoặc địa chỉ email</label>
                        <input type="text" name="name" class="login-input">
                    </div>
                    <div class="login-group">
                        <label class="login-label">Mật khẩu</label>
                        <input type="password" name="pass" class="login-input">
                    </div>
                    <button type="submit" name="submit" class="login-btn">Đăng nhập</button>
                </form>
                <div class="login-back">
                    <a href="../">Quay lại với Nguyên Liệu Trà Sữa</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>