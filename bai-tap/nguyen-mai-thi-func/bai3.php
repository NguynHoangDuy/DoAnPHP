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

        function taoMang($n)
        {
            $arr = [];
            for($i = 0; $i < $n; $i++)
            {
                $arr[$i] = rand(0,20);
            }
            return $arr;
        }
        function xuatMang($arr, $n)
        {
            for($i = 0; $i < $n; $i++){
                echo "$arr[$i] ";
               }
        }
        function timMin($arr, $n)
        {
            $min = $arr[0];
            for($i = 0; $i < $n; $i++){
                if($arr[$i] <= $min)
                {
                    $min = $arr[$i];
                }
               }
            return $min;
        }
        function timMax($arr, $n)
        {
            $max = $arr[0];
            for($i = 0; $i < $n; $i++){
                if($arr[$i] >= $max)
                {
                    $max = $arr[$i];
                }
               }
            return $max;
        }
        function sumArr($arr, $n)
        {
            $sum = 0;
            for($i = 0; $i < $n; $i++){
                    $sum = $sum + $arr[$i];
               }
            return $sum;
        }
        if(isset($_POST["sub"]))
        {
            $n = $_POST["n"];

            if(isset($n))
            {
                $arr = taoMang($n);
                $minArr = timMin($arr, $n);
                $maxArr = timMax($arr, $n);
                $sumArr = sumArr($arr, $n);
            }
        }
    ?>
    <div class="container">
    <form action="" method="post">
<table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="yellow"><h1>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h1></td>
        </tr>
    <tr>
        <td>Nhập số phần tử:</td>
        <td><input type="text" name="n" value="<?php if(isset($n)) echo $n; else echo ""?>"></td>
    </tr>
    <tr>
        <td></td>
        <td><button type="submit" name="sub">Phát sinh và tính toán</button></td>
    </tr>
    <tr>
        <td>Mảng:</td>
        <td><textarea name="arr" cols="30" rows="5" disabled ><?php if(isset($arr)) {
           xuatMang($arr,$n);
        } else echo ""?></textarea></td>
    </tr>
    <tr>
        <td>GTLN (Max) trong mảng:</td>
        <td><input type="text" disabled value="<?php if(isset($maxArr)) echo $maxArr; else echo ""?>"> </td>
    </tr>
    <tr>
        <td>GTNN (Min) trong mảng:</td>
        <td><input type="text" disabled value="<?php if(isset($minArr)) echo $minArr; else echo ""?>"></td>
    </tr>
    <tr>
        <td>Tổng mảng:</td>
        <td><input type="text" name="sumArr" disabled value="<?php if(isset($sumArr)) echo $sumArr; else echo ""?>"></td>
    </tr>
    <tr>
        <td colspan = "2">(Ghi chú: các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td>
    </tr>
</table>
</form>
    </div>

    
<?php
        include("../../block/footer.php");
    ?>
</body>
</html>