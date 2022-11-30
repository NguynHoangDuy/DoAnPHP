<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/main.css"/>
    <link rel="icon" type="image/x-icon" href="../../assets/images/blue_tea_logo.webp">
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <form action="./bai8_form.php" method="post">
    <p>Bạn đã đăng nhập thành công, dưới đây là những thông tin bạn đã nhập: </p>
    <?php
    include("../../block/header.php");
    echo "<div class='container'>";
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
    <?php
echo "</div>";
include("../../block/footer.php")
?>
</body>
</html>