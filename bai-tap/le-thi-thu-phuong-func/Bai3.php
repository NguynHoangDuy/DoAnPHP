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
<?php
        $n="";
        $arr=[];
        $kq="";
        $s=0;
        function tao_mang($n){
            for ($i=0;$i<$n;$i++){
                $arr[$i]=rand(0, 20);
            }
            return $arr;
        }
        function xuat_mang($arr,$n){
            for ($i=0; $i< $n;$i++){
                echo $arr[$i] ." ";
            }
        }
        function tim_max($arr, $n){
            $max=$arr[0];
            for ($i=0; $i< $n;$i++){
                if ($max < $arr[$i]){
                    $max=$arr[$i];
                }
            }
            return $max;
        }
        function tim_min($arr, $n){
            $min=$arr[0];
            for ($i=0; $i< $n;$i++){
                if ($min > $arr[$i]){
                    $min=$arr[$i];
                }
            }
            return $min;
        }
        function tong_mang($arr, $n){
            $s=0;
            for ($i=0;$i<$n;$i++){
                $s=$s+$arr[$i];
            }
            return $s;
        }
        if (isset($_POST["submit"])){
            $n=$_POST["n"];
            $arr=tao_mang($n);
            $max=tim_max($arr, $n);
            $min=tim_min($arr, $n);
            $kq=tong_mang($arr, $n);
        }
    ?>
    <form action="" method="post">
        <table style="background-color: #FDFCFB; margin: 0 auto">
            <tr style="background-color: #bf03f3; padding: 0px 5px">
                <td colspan="3" align="center" style="color:white; font-weight: bold">PHÁT SINH MẢNG VÀ TÍNH TOÁN</td>
    </tr>
            <tr style="background-color: #f3a2da">
                <td>
                    Nhập số phần tử:
                </td>
                <td>
                    <input type="text" name="n" id="" value="<?php
                        if (isset($n)) echo $n; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr style="background-color: #f3a2da">
                <td></td>
                <td>
                    <input type="submit" value="Phát sinh và tính toán" name="submit" style="background-color: rgb(252,245,141); border: none; padding: 5px 10px; box-shadow: 0 1px 5px 0px">
                </td>
            </tr>
            <tr style="background-color: #f3a2da">
                <td>Mảng</td>
                <td>
                    <textarea name="array" id="" cols="30" rows="3"><?php
                        if (isset($arr)) echo xuat_mang($arr, $n); else echo "";
                    ?></textarea>
                </td>
                <td></td>
            </tr>
            <tr  style=" background-color: #f3a2da">
                <td>
                    GTLN (MAX) trong mảng:  
                </td>
                <td>
                    <input type="text" style="background-color: white;" name="max" id="" disabled readonly value="<?php
                        if (isset($max)) echo $max; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr style="background-color: #f3a2da">
                <td>
                    TTNN (MIN) trong mảng:
                </td>
                <td>
                    <input type="text" style="background-color: white;" name="min" id="" disabled readonly value="<?php
                        if (isset($min)) echo $min; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr style="background-color: #f3a2da">
                <td>
                    Tổng mảng:
                </td>
                <td>
                    <input type="text" name="ketqua" id="" readonly disable value="<?php
                        if (isset($kq)) echo $kq; else echo " ";
                    ?>">
                </td>
                <td></td>
            </tr>
            <tr style="background-color: #f3a2da">
                <td colspan="3" align="center">
                    (<span style="color: red">Ghi chú: </span> Các phần tử trong mảng có giá trị từ 0 đến 20)
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