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
    <div class="container">
    <form action="./kqpheptinh.php" method="post">
        <table align="center" bgcolor="#faebd7">
            <tr>
                <td colspan="9" style="text-align:center; background-color: coral;">PHÉP TÍNH TRÊN HAI SỐ</td>
            </tr>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    <input type="radio" name="choose" value="+">
                    Cộng
                    <input type="radio" name="choose" value="-">
                    Trừ
                    <input type="radio" name="choose" value="*">
                    Nhân
                    <input type="radio" name="choose" value="/">
                    Chia
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất</td>
                <td><input style="width: 90%" type="text" name="num1"></td>
            </tr>
            <tr>
                <td>Số thứ nhì:</td>
                <td><input type="text" style="width: 90%" name="num2"></td>
            </tr>
            <tr>
                <td></td>
                <td style="padding-top: 10px;">
                    <button type="submit" style="display: inline; " name="submit">Tính</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
    
    <?php
        include("../../block/footer.php");
    ?>
    
</body>

</html>