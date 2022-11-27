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
    <?php
        if(isset($_POST["submit"]))
        {
            $tong = 0;
            $stringNum = $_POST["stringNum"];
            $stringTrim = trim($stringNum);

            $arrStr = explode(",", $stringTrim);
            foreach($arrStr as $value)
            {
                $tong = $tong + $value;
            }
        }
    ?>
    <div class="container">
    <form action="" method="post">
        <table align="center">
            <tr>
                <td colspan="2" style="text-align:center;">Nhập và tính trên dãy số</td>
            </tr>
            <tr>
                <td>Dãy số:</td>
                <td><input type="text" name="stringNum" value="<?php if(isset($stringNum)) echo "$stringNum"; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit" >Tính</button></td> 
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td><input type="text" value="<?php if(isset($tong)) echo $tong; else echo "";?>" disabled></td>
            </tr>
        </table>
    </form>
    </div>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>