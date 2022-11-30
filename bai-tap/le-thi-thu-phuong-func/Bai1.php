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
    <form action="" method="post" >
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
                    $mang[$i]=rand(-30,30);
                }
                echo implode(", ", $mang);
                $dem_chan=0;
                for ($i=0; $i<$n;$i++){
                    if ($mang[$i] % 2 == 0){
                        $dem_chan=$dem_chan +1;
                    }
                }
                echo "<br/ >Số lượng phần tử chẵn trong mảng: ".$dem_chan;
                $dem=0;
                for ($i=0; $i<$n;$i++){
                    if ($mang[$i] < 100){
                        $dem=$dem +1;
                    }
                }
                echo "<br/ >Số lượng phần tử nhỏ hơn 100 trong mảng: ".$dem;
                $tong=0;
                for ($i=0; $i<$n;$i++){
                    if ($mang[$i] < 0){
                        $tong=$tong+$mang[$i];
                    }
                }
                echo "<br/ >Tổng các phần tử trong mảng là số âm: ".$tong;
               
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
     </div>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>