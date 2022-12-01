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
        function replaceArr($arr, $numBeReplace, $numReplace)
        {
            $newArr = [];
            for($i = 0; $i < count($arr); $i++)
            {
                if($arr[$i] == $numBeReplace)
                $newArr[$i] = $numReplace;
                else $newArr[$i] = $arr[$i];
            }
            return $newArr;
        }
        if(isset($_POST["submit"]))
        {
            $arr = $_POST["arr"];
            $numBeReplace = $_POST["numBeReplace"];
            $numReplace = $_POST["numReplace"];
            if(isset($arr)){
                $arr = trim($arr);
                $arrStr = explode(",", $arr);
                if(isset($numBeReplace) && isset($numReplace))
                {
                    $newArr = replaceArr($arrStr, $numBeReplace, $numReplace);
                }
            }
        }
    ?>
    <style>
        td{
            padding: 10px;
        }
    </style>
    <div class="container">
    <form action="" method="post" style="max-width: 400px; margin: 0 auto;">
        <table align="center" style="background-color: DarkSalmon;">
            <tr style="background-color: pink;">
                <td colspan="2">Thay thế</td>
            </tr>
            <tr>
                <td>Nhập các phần tử:</td>
                <td><input type="text" name="arr" value="<?php if(isset($arr)) echo "$arr"; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế:</td>
                <td><input type="text" name="numBeReplace" value="<?php if(isset($numBeReplace)) echo "$numBeReplace"; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td>Giá trị thay thế:</td>
                <td><input type="text" name="numReplace" value="<?php if(isset($numReplace)) echo "$numReplace"; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Thay thế</button></td>
            </tr>
            <tr>
                <td>Mảng cũ:</td>
                <td><input type="text" disabled value="<?php if(isset($arrStr)) for($i = 0; $i < count($arrStr); $i++)
                echo "$arrStr[$i] "; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td>Mảng mới:</td>
                <td><input type="text" disabled value="<?php if(isset($newArr)) for($i = 0; $i < count($newArr); $i++)
                echo "$newArr[$i] "; else echo ""; ?>"></td>
            </tr>
        </table>
    </form>
    </div>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>