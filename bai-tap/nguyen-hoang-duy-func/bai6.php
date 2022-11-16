<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 6</title>
</head>
<body>
    <?php
        function swap(&$i, &$j)
        {
            $tam = $i;
            $i = $j;
            $j = $tam;
        }
        function sortAZ($arr){
            for($i = 0; $i < count($arr); $i++)
            {
                for($j = $i+1; $j < count($arr); $j++)
                {
                    if ($arr[$j] < $arr[$i])
                    swap($arr[$i], $arr[$j]);
                }
            }
            $newArr = [];
            for($i = 0; $i < count($arr); $i++)
            {
                $newArr[$i] = $arr[$i];
            }
            return $newArr;
        }
        function sortZA($arr){
            for($i = 0; $i < count($arr); $i++)
            {
                for($j = $i+1; $j < count($arr); $j++)
                {
                    if ($arr[$j] > $arr[$i])
                    swap($arr[$i], $arr[$j]);
                }
            }
            $newArr = [];
            for($i = 0; $i < count($arr); $i++)
            {
                $newArr[$i] = $arr[$i];
            }
            return $newArr;
        }
        if(isset($_POST["submit"]))
        {
            $arr = $_POST["arr"];
            if(isset($arr)){
                $arr = trim($arr);
                $arrStr = explode(",", $arr);

                $arrAZ = sortAZ($arrStr);
                $arrZA = sortZA($arrStr);
            }
        }
    ?>
    <form action="" method="post">
        <table align="center">
            <tr>
                <td colspan="2">Sắp xếp mảng</td>
            </tr>
            <tr>
                <td>Nhập mảng:</td>
                <td><input type="text" name="arr" value="<?php if(isset($arr)) echo "$arr"; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="submit">Sắp xếp tăng dần / giảm dần</button></td>
            </tr>
            <tr>
                <td colspan="2">Sau khi sắp xếp</td>
            </tr>
            <tr>
                <td>Tăng dần:</td>
                <td><input type="text" disabled value="<?php if(isset($arrAZ)) for($i = 0; $i < count($arrAZ); $i++)
                echo "$arrAZ[$i] "; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td>Giảm dần:</td>
                <td><input type="text" disabled value="<?php if(isset($arrZA)) for($i = 0; $i < count($arrZA); $i++)
                echo "$arrZA[$i] "; else echo ""; ?>"></td>
            </tr>
        </table>
    </form>
</body>
</html>