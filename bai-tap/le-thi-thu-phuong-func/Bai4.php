<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
</head>
<body>
<?php
    function tao_mang($n){
        $arr=explode(",", $n);
        return $arr;
    }
    function xuat_mang($arr){
        $arr=implode(",", $arr);
        return $arr;
    }
    function timkiem ($arr, $x){
            for ($i=0; $i<count($arr);$i++){
                if ($x==$arr[$i]){
                    return $i;
                }
            }
            return -1;
        }
        if (isset($_POST["submit"])){
            $n=$_POST["n"];
            $arr=tao_mang($n);
            $kq=$_POST["ketqua"];
            $x=$_POST["x"];
            $i=timkiem($arr, $x);
            if (timkiem($arr, $x)!=-1)
                {
                    $kq= "tìm thấy tại vị trí " .$i;
                }
                else $kq= "không tìm thấy";
            $arr=xuat_mang($arr);
        }
    ?>
    <form action="" method="post">
        <table style="background-color: #D1DED4; margin: 0 auto; width: 400px">
            <tr style="background-color: #339A94; padding: 0px 5px">
                <td colspan="3" align="center">TÌM KIẾM</td>
            </tr>
            <tr>
                <td>
                    Nhập dãy số:
                </td>
                <td>
                    <input type="text" name="n" id="" value="<?php
                        if (isset($n)) echo $n; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Nhập số cần tìm:
                </td>
                <td>
                    <input type="text" name="x" id="" value="<?php
                        if (isset($x)) echo $x; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Tìm kiếm" name="submit" style="background-color: #99C9FC; border: none; padding: 5px 10px; box-shadow: 0 1px 5px 0px">
                </td>
            </tr>
            <tr>
                <td>
                    Mảng:
                </td>
                <td>
                    <input type="text" name="arr" id="" readonly disabled
                    value="<?php
                        if (isset($arr)) echo $arr;
                        else echo " ";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Kết quả tìm kiếm:
                </td>
                <td>
                    <input type="text" name="ketqua" id="" 
                    class="input" style="background-color: #CBFBFE" readonly
                    value="<?php
                        if (isset($kq)) echo $kq;
                        else echo " ";
                    ?>"
                    >
                </td>
            </tr>
            <tr style="background-color: #75D0D2">
                <td colspan="3">
                    (Các phần tử trong mảng sẽ cách nhau bằng ",")
                </td>
            </tr>
        </table>
    </form>
</body>
</html>  