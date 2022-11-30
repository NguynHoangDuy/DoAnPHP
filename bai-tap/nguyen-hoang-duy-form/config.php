<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nguyên Liệu Trà Sữa</title>
	<link rel="stylesheet" href="../../assets/css/main.css"/>
    <link rel="icon" type="image/x-icon" href="../../assets/images/blue_tea_logo.webp">
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include("../../block/connection.php");
        // include("../block/global.php");
        include("../../block/header.php");
    ?>

    <?php
        echo "Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập: <br>";
        echo "Họ và tên: ", $_POST["name"];
        echo "<br>";
        echo "Địa chỉ: ", $_POST["address"];
        echo "<br>";
        echo "Số điện thoại: ", $_POST["phone"];
        echo "<br>";
        echo "Giới tính: ", $_POST["gender"];
        echo "<br>";
        echo "Quốc tịch: ", $_POST["country"];
        echo "<br>";
        echo "Kiến thức:";
        if(isset($_POST["Security"]))
        echo " ",$_POST["Security"];
        if(isset($_POST["CCNA"]))
        echo " ",$_POST["CCNA"];
        if(isset($_POST["ASP"]))
        echo " ",$_POST["ASP"];
        if(isset($_POST["PHP"]))
        echo " ",$_POST["PHP"];
        echo "<br>";
        echo "Ghi chú: ", $_POST["note"];
    ?>
    <?php
        include("../../block/footer.php");
    ?>
</body>

</html>