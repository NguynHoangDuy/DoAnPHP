<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bài 1</title>
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
    <form action="" method="get" style="width: 270px; margin: 20px auto;">
        <table style="background-color: #F5D5AE;">
            <thead>
                <tr><th colspan="2" style="background-color: #FFE15D">DIỆN TÍCH HÌNH CHỮ NHẬT</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chiều dài:</td>
                    <td><input type="test" required value="<?php if (isset($_GET['chieuDai']))
                    if(isset($_GET['reset']))
                    echo "";
                    else echo $_GET['chieuDai']; ?>" name="chieuDai"></td>
                </tr>
                <tr>
                    <td>Chiều rộng:</td>
                    <td><input type="test" value="<?php if (isset($_GET['chieuRong'])) 
                    if(isset($_GET['reset']))
                    echo "";
                    else echo $_GET['chieuRong']; ?>" name="chieuRong" required></td>
                </tr>
                <tr>
                    <td>Diện tích:</td>
                    <td><input type="text" value="<?php if(isset($_GET['reset']))
                    echo ""; else if (isset($_GET['chieuDai']) && isset($_GET['chieuRong'])) echo  $_GET['chieuDai'] * $_GET['chieuRong']; else echo ""?>" disabled></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" name="value">Tính</button>
                        <button type="submit" name="reset">Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form> 

    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>