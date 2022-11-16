<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>
</head>
<body>
    <?php
        function replaceArr($arr, $numBeReplace, $numReplace)
        {
            $newArr = [];
            for($i = 0; $i < count($arr); $i++)
            {
                if($arr[$i] == $numBeReplace)
                $newArr[$i] = $numReplace;
                else $newArr[$i] = $arr[$i];
            }
            return $newArr;
        }
        if(isset($_POST["submit"]))
        {
            $arr = $_POST["arr"];
            $numBeReplace = $_POST["numBeReplace"];
            $numReplace = $_POST["numReplace"];
            if(isset($arr)){
                $arr = trim($arr);
                $arrStr = explode(",", $arr);
                if(isset($numBeReplace) && isset($numReplace))
                {
                    $newArr = replaceArr($arrStr, $numBeReplace, $numReplace);
                }
            }
        }
    ?>
    <form action="" method="post">
        <table align="center">
            <tr>
                <td colspan="2">Thay thế</td>
            </tr>
            <tr>
                <td>Nhập các phần tử:</td>
                <td><input type="text" name="arr" value="<?php if(isset($arr)) echo "$arr"; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td>Giá trị cần thay thế:</td>
                <td><input type="text" name="numBeReplace" value="<?php if(isset($numBeReplace)) echo "$numBeReplace"; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td>Giá trị thay thế:</td>
                <td><input type="text" name="numReplace" value="<?php if(isset($numReplace)) echo "$numReplace"; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit">Thay thế</button></td>
            </tr>
            <tr>
                <td>Mảng cũ:</td>
                <td><input type="text" disabled value="<?php if(isset($arrStr)) for($i = 0; $i < count($arrStr); $i++)
                echo "$arrStr[$i] "; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td>Mảng mới:</td>
                <td><input type="text" disabled value="<?php if(isset($newArr)) for($i = 0; $i < count($newArr); $i++)
                echo "$newArr[$i] "; else echo "hihi"; ?>"></td>
            </tr>
        </table>
    </form>
</body>
</html>