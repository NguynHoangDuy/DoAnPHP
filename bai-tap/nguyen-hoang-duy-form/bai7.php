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
        if(isset($_POST["submit"]))
            {
                $num2 = $_POST['num2'];
                if(isset($_POST['choose'])){
                    if($_POST['choose'] == '/')
                    {
                        if(isset($num2) || $num2 != 0)
                            $action = "./kqpheptinh.php";
                    }
                    else {
                        if(isset($num2)&&isset($num1))
                        $action = "./kqpheptinh.php";
                    }
                }
            }
    ?>
    <form action="<?php if(isset($action)) echo $action; else echo "";?>" method="post">
        <table align="center" bgcolor="#faebd7">
            <tr>
                <td colspan="9" style="text-align:center; background-color: coral;">PHÉP TÍNH TRÊN HAI SỐ</td>
            </tr>
            <tr>
                <td>Chọn phép tính:</td>
                <td>
                    <input type="radio" name="choose" value="+">
                    Cộng
                    <input type="radio" name="choose" value="-">
                    Trừ
                    <input type="radio" name="choose" value="*">
                    Nhân
                    <input type="radio" name="choose" value="/">
                    Chia
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất</td>
                <td><input style="width: 90%" type="text" name="num1"></td>
            </tr>
            <tr>
                <td>Số thứ nhì:</td>
                <td><input type="text" style="width: 90%" name="num2"></td>
            </tr>
            <tr>
                <td></td>
                <td style="padding-top: 10px;">
                    <button type="submit" style="display: inline; " name="submit">Tính</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
        
        
    ?>
    
</body>

</html>