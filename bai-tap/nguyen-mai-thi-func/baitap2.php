<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>baitap2</title>
</head>
<body>
    <?php
        if(isset($_POST["submit"]))
        {
            $tong = 0;
            $stringNum = $_POST["stringNum"];
            $stringTrim = trim($stringNum);

            $arrStr = explode(",", $stringTrim);
            foreach($arrStr as $value)
            {
                $tong = $tong + $value;
            }
        }
    ?>
    <form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="yellow"><h1>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h1></td>
        </tr>
            <tr>
                <td>Dãy số:</td>
                <td><input type="text" name="stringNum" value="<?php if(isset($stringNum)) echo "$stringNum"; else echo ""; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="submit" >Tính</button></td> 
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td><input type="text" value="<?php if(isset($tong)) echo $tong; else echo "";?>" disabled></td>
            </tr>
        </table>
    </form>
</body>
</html>