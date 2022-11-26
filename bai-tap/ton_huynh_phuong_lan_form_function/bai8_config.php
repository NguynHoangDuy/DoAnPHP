<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./bai8_form.php" method="post">
    <p>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn đã nhập: </p>
    <?php
        session_start();
        $fullname=$_SESSION["fullname"];
        $address=$_SESSION["address"];
        $phone=$_SESSION["phone"];
        $gender=$_SESSION["gender"];
        $country=$_SESSION["country"];
        $php=$_SESSION["php"];
        $aspnet=$_SESSION["aspnet"];
        $ccna=$_SESSION["ccna"];
        $security=$_SESSION["security"];
        $mess=$_SESSION["mess"];
        echo "Họ và Tên: $fullname";
        echo "<br>";
        echo "Địa chỉ:  $address";
        echo "<br>";
        echo "Số điện thoại: $phone";
        echo "<br>";
        echo "Giới tính: $gender";
        echo "<br>";
        echo "Quốc tịch: $country";
        echo "<br>";
        echo "Kiến thức:$php $aspnet $ccna $security";
        echo "<br>";
        echo "Ghi chú: $mess";
        session_write_close();
    ?></p>
    </form>
</body>
</html>