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
        include("../../block/header-2.php");
    ?>
<?php
        if(isset($_POST["sub"]))
        {
            $n = $_POST["n"];
        }
           
    ?>
    <div class="container">
    <form action="" method="post">
        <table align="center">
           <tr>
                <td>Nhập n:</td>
                <td><input type="text" name="n" value="<?php if(isset($_POST["n"])) if(isset($_POST["reset"])) echo ""; else echo $n;?>" required></td>
           </tr>
           <tr>
                <td></td>
                <td><button type="submit" name="sub">Thực hiện</button>
                <button type="submit" name="reset">Reset</button></td>
           </tr> 
        </table>
    </form>
    </div>
    

    <?php
        if(isset($_POST["sub"]))
        {
            if(isset($n))
            {
                if($n > 0 )
                {
                    $arr = [];
                    for($i = 0; $i < $n; $i++){
                        $arr[$i] = rand(-5, 10);
                    }
                    for($i = 0; $i < $n; $i++){
                        echo "$arr[$i] ";
                    }
                    echo "<br>Số Chẵn: ";
                    echo countChan($arr, $n);
                    echo "<br>Số lẻ: ";
                    echo countLess100($arr, $n);
                    echo "<br>Tổng số âm: ";
                    echo sumAm($arr, $n);
                    echo "<br>Vị trí số âm: ";
                    vtZero($arr, $n);
                    sortAZ($arr, $n);
                    echo " <br> sắp xếp:";
                    for($i = 0; $i < $n; $i++){
                        echo "$arr[$i] ";
                    }
                }
            }
        }

        function countChan($arr, $n){
            $dem= 0;
            for($i = 0; $i < $n; $i++)
            {
                if($arr[$i] % 2 == 0 && $arr[$i] != 0)
                {
                    $dem++;
                }
            }
            return $dem;
        }
        function countLess100($arr, $n){
            $dem= 0;
            for($i = 0; $i < $n; $i++)
            {
                if($arr[$i] < 100)
                {
                    $dem++;
                }
            }
            return $dem;
        }

        function sumAm($arr, $n){
            $sum= 0;
            for($i = 0; $i < $n; $i++)
            {
                if($arr[$i] < 0)
                {
                    $sum = $sum + $arr[$i];
                }
            }
            return $sum;
        }

        function vtZero($arr, $n){
            $dem = 0;
            for($i = 0; $i < $n; $i++)
            {
                if($arr[$i] == 0)
                {
                    $dem++;
                    echo "$i ";
                }
            }
            if($dem == 0)
            {
                echo "Không có số 0";
            }
        }
        function swap(&$i, &$j)
        {
            $tam = $i;
            $i = $j;
            $j = $tam;
        }
        function sortAZ(&$arr, $n){
            for($i = 0; $i < $n; $i++)
            {
                for($j = $i+1; $j < $n; $j++)
                {
                    if ($arr[$j] < $arr[$i])
                    swap($arr[$i], $arr[$j]);
                }
            }
        }
    ?>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>