<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3</title>
</head>
<body>
<?php
        $n="";
        $arr=[];
        $ketqua="";
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
        function max($arr, $n){
            $max=$arr[0];
            for ($i=0; $i< $n;$i++){
                if ($max < $arr[$i]){
                    $max=$arr[$i];
                }
            }
            return $max;
        }
        function min($arr, $n){
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
            $max=max($arr, $n);
            $min=min($arr, $n);
            $ketqua=tong_mang($arr, $n);
        }
    ?>
    <form action="" method="post">
        <table style="background-color: #FDFCFB; margin: 0 auto">
            <tr style="background-color: #A90D74; padding: 0px 5px">
                <td colspan="3" align="center" style="color:white; font-weight: bold">PHÁT SINH MẢNG VÀ TÍNH TOÁN</td>
            </tr>
            <tr style="background-color: #FEDAF6">
                <td>
                    Nhập số phần tử:
                </td>
                <td>
                    <input type="text" name="n" id="" value="<?php
                        if (isset($n)) echo $n; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr style="background-color: #FEDAF6">
                <td></td>
                <td>
                    <input type="submit" value="Phát sinh và tính toán" name="submit" style="background-color: rgb(252,245,141); border: none; padding: 5px 10px; box-shadow: 0 1px 5px 0px">
                </td>
            </tr>
            <tr>
                <td>Mảng</td>
                <td>
                    <textarea name="arr" id="" cols="30" rows="10"><?php
                        if (isset($arr)) echo xuat_mang($arr, $n); else echo "";
                    ?></textarea>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    GTLN (MAX) trong mảng:
                </td>
                <td>
                    <input type="text" name="max" id="" disabled readonly value="<?php
                        if (isset($max)) echo $max; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>
                    GTLN (MIN) trong mảng:
                </td>
                <td>
                    <input type="text" name="min" id="" disabled readonly value="<?php
                        if (isset($min)) echo $min; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Tổng mảng:
                </td>
                <td>
                    <input type="text" name="ketqua" id="" readonly disable value="<?php
                        if (isset($ketqua)) echo $ketqua; else echo " ";
                    ?>">
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3" align="center">
                    (<span style="color: red">Ghi chú: </span> Các phần tử trong mảng có giá trị từ 0 đến 20)
                </td>
            </tr>
        </table>
    </form>   
</body>
</html>