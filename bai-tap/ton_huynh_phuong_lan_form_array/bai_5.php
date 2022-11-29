<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>
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
    include("../../block/header-2.php");
    echo "<div class='container'>";
     function tao_mang($n){
        $arr=explode(",", $n);
        return $arr;
    }
    function xuat_mang($arr){
        $arr=implode(",", $arr);
        return $arr;
    }
    function thay_the($arr, $x, $y){
        for ($i=0; $i < count($arr); $i++){
            if ($x==$arr[$i]){
                $arr[$i]=$y;
            }
        }
        return $arr;
    }
    if (isset($_POST["submit"])){
        $n=$_POST["n"];
        $arr=tao_mang($n);
        $arr=xuat_mang($arr);
        $arrnew=tao_mang($n);
        $ketqua=$_POST["ketqua"];
        $x=$_POST["x"];
        $y=$_POST["y"];
        $ketqua=thay_the($arrnew, $x, $y);
        $ketqua=xuat_mang($ketqua);
    }
    ?>
<form action="" method="post">
        <table style="margin: 0 auto; width: 400px">
            <tr style="background-color: #9F0A73; padding: 0px 5px">
                <td colspan="3" align="center"  style="color: white">THAY THẾ</td>
            </tr>
            <tr style="background-color: #FED6F1;">
                <td>
                    Nhập các phần tử:
                </td>
                <td>
                    <input type="text" name="n" id="" value="<?php
                        if (isset($n)) echo $n; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr style="background-color: #FED6F1;">
                <td>
                    Giá trị cần thay thế:
                </td>
                <td>
                    <input type="text" name="x" id="" value="<?php
                        if (isset($x)) echo $x; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr style="background-color: #FED6F1;">
                <td>
                    Giá trị thay thế:
                </td>
                <td>
                    <input type="text" name="y" id="" value="<?php
                        if (isset($y)) echo $y; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr  style="background-color: #FED6F1;">
                <td></td>
                <td>
                    <input type="submit" value="Thay thế" name="submit" style="background-color: #FBFF9B; border: none; padding: 5px 10px; box-shadow: 0 1px 5px 0px">
                </td>
            </tr>
            <tr style="background-color: #FFF5FF">
                <td>
                    Mảng cũ:
                </td>
                <td>
                    <input type="text" name="arr" id="" readonly disabled
                    value="<?php
                        if (isset($arr)) echo $arr;
                        else echo " ";
                    ?>" style="background-color: #FDA4A2">
                </td>
            </tr>
            <tr style="background-color: #FFF5FF">
                <td>
                    Mảng sau khi thay thế:
                </td>
                <td>
                    <input type="text" name="ketqua" id="" 
                    class="input" readonly
                    value="<?php
                        if (isset($ketqua)) echo $ketqua;
                        else echo " ";
                    ?>" style="background-color: #FDA4A2">
                </td>
            </tr>
            <tr style="background-color: #FFF5FF">
                <td colspan="3">
                    (Các phần tử trong mảng sẽ cách nhau bằng ",")
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