<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7 - Trang kết quả</title>
    <link rel="stylesheet" href="../../assets/css/main.css"/>
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include("../../block/header.php");
    ?>
    <?php
        if(isset($_POST['choose'])&&isset($_POST['num1'])&&isset($_POST['num2']))
        {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            switch($_POST['choose']){
                case "+":
                    $result = $num1 + $num2;
                    $phepTinh = "Cộng";
                    break;
                case "-":
                    $result = $num1 - $num2;
                    $phepTinh = "Trừ";
                    break;
                case "*":
                    $result = $num1 * $num2;
                    $phepTinh = "Nhân";
                    break;
                case "/":
                    $result = $num1 / $num2;
                    $phepTinh = "Chia";
                    break;
                default:
                    echo "Giá trị không hợp lệ";
            }
        }
    ?>
    <form action="" method="post">
        <table align="center" style="background-color: #F5D5AE; margin: 20px auto;">
            <thead>
                <tr>
                    <th colspan="9" style="background-color: #FFE15D">PHÉP TÍNH TRÊN HAI SỐ</th>
                </tr>
            </thead>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    <?php
                        if(isset($phepTinh)) echo "$phepTinh"; else echo "";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Số 1:</td>
                <td><input type="text" value="<?php if (isset($num1)) echo $num1; else echo"";?>"></td>
            </tr>
            <tr>
                <td>Số 2:</td>
                <td><input type="text" value="<?php if (isset($num2)) echo $num2; else echo"";?>"></td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td><input type="text" value="<?php if (isset($result)) echo $result; else echo "";?> " name="result" disabled></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="./input_page_bai7.php">Quay lại trang trước</a></td>
            </tr>
        </table>
    </form>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>