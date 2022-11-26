<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    function hoan_vi(&$i, &$j)
    {
        $tam = $i;
        $i = $j;
        $j = $tam;
    }
    function tang($arr){
        for ($i = 0; $i < count($arr); $i++)
            for ($j = $i + 1; $j < count($arr); $j++) {
                if ($arr[$j] < $arr[$i])
                    hoan_vi($arr[$i], $arr[$j]);
            }
        return $arr;
    }
    function giam($arr){
        for ($i = 0; $i < count($arr); $i++)
            for ($j = $i + 1; $j < count($arr); $j++) {
                if ($arr[$j] > $arr[$i])
                    hoan_vi($arr[$i], $arr[$j]);
            }
        return $arr;
    }
    if (isset($_POST["submit"])){
        $n=$_POST["n"];
        $arr_tang=tao_mang($n);
        $arr_tang=tang($arr_tang);
        $arr_tang=xuat_mang($arr_tang);
        $arr_giam=tao_mang($n);
        $arr_giam=giam($arr_giam);
        $arr_giam=xuat_mang($arr_giam);

    }

?>
<form action="" method="post">
        <table style="background-color: #D1DED5; margin: 0 auto; width: 400px">
            <tr style="background-color: #339A95; padding: 0px 5px">
                <td colspan="3" align="center">SẮP XẾP MẢNG</td>
            </tr>
            <tr>
                <td>
                    Nhập mảng:
                </td>
                <td>
                    <input type="text" name="n" id="" value="<?php
                        if (isset($n)) echo $n; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Sắp xếp tăng/giảm" name="submit" style=" border: none; padding: 5px 10px; box-shadow: 0 1px 5px 0px">
                </td>
            </tr>
            <tr>
                <td style="color: red">
                    Sau khi sắp xếp:
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    Tăng dần:
                </td>
                <td>
                    <input type="text" name="arr_tang" id="" readonly disabled
                    value="<?php
                        if (isset($arr_tang)) echo $arr_tang;
                        else echo " ";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Giảm dần:
                </td>
                <td>
                    <input type="text" name="arr_giam" id="" 
                    class="input" style="background-color: #CBFBFE" readonly
                    value="<?php
                        if (isset($arr_giam)) echo $arr_giam;
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