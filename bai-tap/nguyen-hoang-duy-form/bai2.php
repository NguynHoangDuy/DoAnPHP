<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    define('PI', 3.14);
    if(isset($_POST['submit'])){
        $r = $_POST['banKinh'];
        if (isset($r) && is_numeric($r) && $r > 0)
        {
            $p = round($r * 2 * PI, 1);
            $s = round($r*PI*$r,1);
        }
        else $r = "Nhập sai rồi má";
    }
    if(isset($_POST['reset'])){
        $s = ""; 
        $p = "";
        $r = "";
    }
?>
<body>
    <form action="" method="post">
        <table align="center">
            <tr>
                <td colspan="2">CHU VI VÀ DIỆN TÍCH HÌNH TRÒN</td>
            </tr>
            <tr>
                <td>Bán kính:</td>
                <td><input type="test" required value="<?php if (isset($r)) echo $r; else echo "";?> " name="banKinh"></td>
            </tr>
            <tr>
                <td>Diện tích:</td>
                <td><input type="text" value="<?php if (isset($s)) echo $s; else echo "";?> " disabled></td>
            </tr>
            <tr>
                <td>Chu Vi:</td>
                <td><input type="text" value="<?php if (isset($p)) echo $p; else echo "";?>" disabled></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding-top: 10px;">
                    <button type="submit" style="display: inline; " name="submit">Tính</button>
                    <button type="submit" style="display: inline;" name="reset">Reset</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
        
        
    ?>
    
</body>

</html>