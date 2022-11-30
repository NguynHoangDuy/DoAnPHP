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
        $arrCan = array( "Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
        $arrChi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
        $arrImg = array("https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-12.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-1.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-2.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-3.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-4.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-5.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-6.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-7.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-8.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-9.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-10.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-11.jpg");

        if(isset($_POST["submit"]))
        {
            $nam = $_POST["yearD"];
            $year = $_POST["yearD"];
            if(isset($nam) && is_numeric($nam))
            {
                $nam = $nam-3;
                $can = $nam%10;
                $chi = $nam%12;
                $namAL = $arrCan[$can];
                $namAL = $namAL ." ".$arrChi[$chi];
                $src= $arrImg[$chi];
            }
        }
    ?>
    <div class="container">
    <form action="" method="post">
        <table align="center">
            <tr>
                <td colspan="3">Tính năm âm lịch</td>
            </tr>
            <tr>
                <td>Năm dương lịch</td>
            <td></td>
            <td>Năm âm lịch</td>
            </tr>
            <tr>
                <td><input type="text" name="yearD" value="<?php if(isset($year)) echo $year; else echo ""; ?>"></td>
                <td><button type="submit" name="submit">=></button></td>
                <td><input type="text" disabled value="<?php if(isset($namAL)) echo $namAL; else echo ""; ?>" ></td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center; padding-top:20px">
                    <img src="<?php if(isset($src)) echo $src; else echo "";?>" width=300px height=200px alt="">
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