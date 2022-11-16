<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="./kqpheptinh.php" method="post">
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