<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện tích hình chữ nhật</title>
</head>
<body>
<?php
define('PI',3.14);
if (isset($_POST['submit'])){
    $r=$_POST['radius'];;
    if (isset($r) and is_numeric($r) and $r>0){
        $s=round(PI*$r*$r,1);
        $p=round(2*PI*$r,1);
    }else{
        $r="ban kinh phai la so hoac khong duoc de trong";
    }
}
if (isset($_POST['reset'])){
    $s="";
    $p="";
    $r="";
}
?>
<form action="" method="get" style="width: 500px; margin: 0 auto; back">
            <h3 style="text-align: center;">DIỆN TÍCH HÌNH CHỮ NHẬT</h3>
            <table>
                <tr>
                    <td>Chiều dài:</td>
                    <td><input type="test" required value="<?php if (isset($_GET['chieuDai']))
                    if(isset($_GET['reset']))
                    echo "";
                    else echo $_GET['chieuDai']; ?>" name="chieuDai"></td>
                </tr>
                <tr>
                    <td>Chiều rộng:</td>
                    <td><input type="test" value="<?php if (isset($_GET['chieuRong'])) 
                    if(isset($_GET['reset']))
                    echo "";
                    else echo $_GET['chieuRong']; ?>" name="chieuRong" required></td>
                </tr>
                <tr>
                    <td>Diện tích:</td>
                    <td><input type="text" value="<?php if(isset($_GET['reset']))
                    echo ""; else if (isset($_GET['chieuDai']) && isset($_GET['chieuRong'])) echo  $_GET['chieuDai'] * $_GET['chieuRong']; else echo ""?>" disabled></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center; padding-top: 10px;">
                        <button type="submit" style="display: inline; " name="value">Tính</button>
                        <button type="submit" style="display: inline;" name="reset">Reset</button>
                    </td>
                </tr>
            </table>
        </form>
</body>
</html>