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
    <form action="" method="get" style="width: 300px; margin: 0 auto;">
        <table style="background-color:bisque;">
            <tr style="background-color: orange">
                <td colspan="2" align="center" >
                    TÍNH CHU VI VÀ DIỆN TÍCH HÌNH TRÒN
                </td>
            </tr>
            <tr>
                <td>Chiều dài:</td>
                <td><input type="test" required value="<?php if (isset($_GET['chieuDai'])) 
                        echo $_GET['chieuDai']; ?>" name="chieuDai"></td>
            </tr>
            <tr>
                <td>Chiều rộng:</td>
                <td><input type="test" value="<?php if (isset($_GET['chieuRong'])) 
                        echo $_GET['chieuRong']; ?>" name="chieuRong" required></td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td><input type="text" value="<?php if (isset($_GET['chieuDai']) && isset($_GET['chieuRong'])) 
                        echo  $_GET['chieuDai'] * $_GET['chieuRong']; ?>" disabled></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding-top: 10px;">
                    <button type="submit" style="display: inline; " name="value">Tính</button>
                    <button type="submit" style="display: inline;" name="reset">Reset</button>
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