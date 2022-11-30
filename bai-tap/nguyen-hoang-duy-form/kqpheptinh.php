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
        if(isset($_POST['choose'])&&isset($_POST['num1'])&&isset($_POST['num2']))
        {
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            switch($_POST['choose']){
                case "+":
                    $kq = $num1 + $num2;
                    $phep = "Cộng";
                    break;
                case "-":
                    $kq = $num1 - $num2;
                    $phep = "Trừ";
                    break;
                case "*":
                    $kq = $num1 * $num2;
                    $phep = "Nhân";
                    break;
                case "/":
                    $kq = $num1 / $num2;
                    $phep = "Chia";
                    break;
                default:
                    echo "Nhập sai rồi";
            }
        }
    ?>
    <div class="container">
    <form action="" method="post">
        <table align="center" bgcolor="#faebd7">
            <tr>
                <td colspan="9" style="text-align:center; background-color: coral;">PHÉP TÍNH TRÊN HAI SỐ</td>
            </tr>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    <?php
                        if(isset($phep)) echo "$phep"; else echo "";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất</td>
                <td><input style="width: 90%" type="text" value="<?php if (isset($num1)) echo $num1; else echo"";?>" name="end"></td>
            </tr>
            <tr>
                <td>Số thứ nhì:</td>
                <td><input type="text" style="width: 90%" value="<?php if (isset($num2)) echo $num2; else echo"";?>" name="end"></td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td><input type="text"  value="<?php if (isset($kq)) echo $kq; else echo "";?> " name="result" disabled style="background-color: lightpink; width: 90%"></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>
            </tr>
        </table>
    </form>
    </div>
    
    <?php
        include("../../block/footer.php");
    ?>
    
</body>

</html>