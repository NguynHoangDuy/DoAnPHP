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
        function timX($arr, $num){
            for($i = 0; $i < count($arr); $i++)
                {
                    if($arr[$i] == $num)
                    return $i;
                }
            return -1;
        }
        if(isset($_POST["submit"]))
        {
            $arr = $_POST["arr"];
            $num = $_POST["numSearch"];
            if(isset($arr)){
                $arr = trim($arr);
                $arrStr = explode(",", $arr);
                if(isset($num))
                {
                    if(timX($arrStr, $num) != -1)
                    {
                        $vt = timX($arrStr, $num);
                        $kq = "Đã tìm thấy số $num ở vị trí $vt";
                    }
                    else $kq = "Không tìm thấy số $num trong mảng ";
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
    <form action="" method="post" style="max-width: 500px; margin: 0 auto;">
        <table align="center" style="background-color: DarkSalmon;">
            <tr style="background-color: pink;">
                <td colspan="2">Tìm kiếm</td>
            </tr>
            <tr>
                <td>Nhập mảng:</td>
                <td><input style="display = block; width: 206px; height: 30px;" type="text" name="arr" value="<?php if(isset($arr)) echo "$arr"; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td>Nhập số cần tìm:</td>
                <td><input type="text" name="numSearch" value="<?php if(isset($num)) echo "$num"; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Tìm kiếm</button></td>
            </tr>
            <tr>
                <td>Mảng: </td>
                <td><textarea cols="25" rows="2" disabled><?php if(isset($arrStr)) for($i = 0; $i < count($arrStr); $i++)
                echo "$arrStr[$i] "; else echo ""; ?>
                </textarea></td>
            </tr>
            <tr>
                <td>Kết quả tìm kiếm: </td>
                <td><textarea cols="25" rows="2" disabled><?php if(isset($kq)) echo $kq; else echo ""?> 
                </textarea></td>
            </tr>
            <tr>
                <td colspan="2">Các phần tử được ngăn cách nhau bởi dấu ","</td>
            </tr>
        </table>
    </form>
    </div>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>