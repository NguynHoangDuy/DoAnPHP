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
    define('PI', 3.14);
    if(isset($_POST['submit'])){
        $r = $_POST['banKinh'];
        if (isset($r) && is_numeric($r) && $r > 0)
        {
            $p = round($r * 2 * PI, 1);
            $s = round($r*PI*$r,1);
        }
        else $r = "Nhập sai rồi má";
    }
    if(isset($_POST['reset'])){
        $s = ""; 
        $p = "";
        $r = "";
    }
?>
    <style>
        td{
            padding: 10px;
        }
    </style>
<div class="container" >
<form action="" method="post" style="max-width: 400px; margin: 0 auto;">
        <table align="center" style="background-color: DarkSalmon;">
            <tr style="background-color: pink;">
                <td colspan="2">CHU VI VÀ DIỆN TÍCH HÌNH TRÒN</td>
            </tr>
            <tr>
                <td>Bán kính:</td>
                <td><input type="test" required value="<?php if (isset($r)) echo $r; else echo "";?> " name="banKinh"></td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td><input type="text" value="<?php if (isset($s)) echo $s; else echo "";?> " disabled></td>
            </tr>
            <tr>
                <td>Chu Vi:</td>
                <td><input type="text" value="<?php if (isset($p)) echo $p; else echo "";?>" disabled></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding-top: 10px;">
                    <button type="submit" style="display: inline; " name="submit">Tính</button>
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