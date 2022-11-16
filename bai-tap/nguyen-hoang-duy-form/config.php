<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
    
</body>

</html>