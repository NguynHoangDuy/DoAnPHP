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
        include("../../block/header-2.php");
    ?>
<div class="container">
<form action="./config.php" method="post">
        <table align="center" bgcolor="#faebd7">
            <tr>
                <td colspan="9" style="text-align:center; background-color: coral;">Enter Your Information</td>
            </tr>
            <tr>
                <td>Full name:</td>
                <td><input style="width: 50%" type="text" name="name"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" style="width: 50%"  name="address"></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="text" style="width: 50%"  name="phone"></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio"  name="gender" value="Nam"> Nam
                    <input type="radio"  name="gender" value="Nữ"> Nữ</td>
            </tr>
            <tr>
                <td>Country:</td>
                <td>
                    <select id="cars" name="country" style="width: 30%">
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Hàn Quốc">Hàn Quốc</option>
                        <option value="Thái Lan">Thái Lan</option>
                        <option value="Nhật Bản">Nhật Bản</option>
                      </select>
            </tr>
            <tr>
                <td>Study:</td>
                <td>
                    <input type="checkbox"  name="PHP" value="PHP & MySQL"> PHP & MySQL
                    <input type="checkbox"  name="ASP" value="ASP.NET"> ASP.NET
                    <input type="checkbox"  name="CCNA" value="CCNA"> CCNA
                    <input type="checkbox"  name="Security" value="Security+"> Security+
                </td>
            </tr>
            <tr>
                <td>Note:</td>
                <td>
                    <textarea name="note" cols="50" rows="3"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="send">Gửi</button>
                    <button type="submit" name="cancel">Hủy</button>
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