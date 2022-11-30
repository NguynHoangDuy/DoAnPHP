<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
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
include("../../block/header.php");
echo "<div class='container'>";
?>
    <form action="" method="post" style=" display: block; margin: 0 auto;width: 50%">
        <table >
            <tr>
                <td colspan="2" style="text-align: center; background-color: pink;"><h1><STROng>TÍNH DIỆN TÍCH HÌNH CHỮ NHẬT</STROng></h1></td>
            </tr>
            <tr>
                <td>Chiều dài</td>
                <td>
                    <input type="text" name="chieudai" id="" value="<?php
                        if (isset($_POST["chieudai"])) echo $_POST["chieudai"];
                    ?>">
                </td>
</tr>
                <tr>
                <td>Chiều rộng</td>
                <td>
                    <input type="text" name="chieurong" id="" value="<?php if (isset($_POST["chieurong"])) echo $_POST["chieurong"];
                    ?>">
                </td>
                </tr>
                <tr>
                <td>Kết quả</td>  
                <td>
                    <input type="text" name="ketQua" id="" style="background-color:red ;" readonly
                    value="<?php
                        if ((isset($_POST["chieudai"])) && (isset($_POST["chieurong"]))) echo $_POST["chieurong"] * $_POST["chieudai"];
                    ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Tính" >
                    <input type="submit" value="Reset" >
                    </td>
                </tr>
            </table>
    </form>
    <?php
echo "</div>";
include("../../block/footer.php")
?>
</body>
</html>