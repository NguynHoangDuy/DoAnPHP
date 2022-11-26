<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    Nhập n:
                </td>
                <td>
                    <input type="text" name="n" id="" value="<?php
                        if (isset($_POST["n"])) echo $_POST["n"]; else echo " ";
                    ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Thực hiện" name="submit">
                    <input type="submit" value="Hủy" name="reset">
                </td>
            </tr>
        </table>
    </form>
    <?php
    $n="";
        if (isset($_POST["submit"])){
            $n=$_POST["n"];
            if (($n > 0 )and (!is_float($n))){
                $mang=[];
                for ($i=0; $i<$n;$i++){
                    $mang[$i]=rand(-20,20);
                }
                echo implode(", ", $mang);
                // ------------
                $dem_chan=0;
                for ($i=0; $i<$n;$i++){
                    if ($mang[$i] % 2 == 0){
                        $dem_chan=$dem_chan +1;
                    }
                }
                echo "<br/ >Số lượng phần tử chẵn trong mảng: ".$dem_chan;
                //-------------
                $dem=0;
                for ($i=0; $i<$n;$i++){
                    if ($mang[$i] < 100){
                        $dem=$dem +1;
                    }
                }
                echo "<br/ >Số lượng phần tử nhỏ hơn 100 trong mảng: ".$dem;
                //-------------
                $tong=0;
                for ($i=0; $i<$n;$i++){
                    if ($mang[$i] < 0){
                        $tong=$tong+$mang[$i];
                    }
                }
                echo "<br/ >Tổng các phần tử trong mảng là số âm: ".$tong;
                //--------------
                echo "<br/> Các vị trí của phần tử có giá trị bằng 0: ";
                $vitri=0;
                for ($i=0; $i<$n;$i++){
                    if ($mang[$i]==0){
                        $vitri=$i;
                    }
                }
                if ($vitri!=0) echo $vitri;
                else echo "không có phần tử nào bằng 0";
                echo "<br/>Mảng đã sắp xếp: ";
                function swap(&$i, &$j)
                {
                    $tam = $i;
                    $i = $j;
                    $j = $tam;
                }
                function sortFunc(&$mang,&$n)
                {
                    for ($i = 0; $i < $n; $i++)
                    for ($j = $i + 1; $j < $n; $j++) {
                        if ($mang[$j] < $mang[$i])
                            swap($mang[$i], $mang[$j]);
                            }
                }
                sortFunc($mang, $n);
                for ($i = 0; $i < $n; $i++) {
                        echo $mang[$i] ." ";
                    }
            }
            else {
                echo $n ." không thỏa điều kiện";
            }
        }
        else{
            $n="";
        }
    ?>
</body>
</html>