<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            display: block;
            margin: 0 auto;
            width: 20%;
            border: 1px solid pink;
        }
    </style>
</head>
<body>
    <form action="" method="post" >
        <table>
            <tr>
                <td colspan="2" style="text-align: center; background-color: pink;"><STROng>TÍNH DIỆN TÍCH HÌNH CHỮ NHẬT</STROng></td>
            </tr>
            <tr>
                <td>Chiều dài</td>
                <td>
                    <input type="text" name="chieudai" id="" value="<?php
                        if (isset($_POST["chieudai"])) echo $_POST["chieudai"];
                    ?>">
                </td>
</tr>
                <tr>
                <td>Chiều rộng</td>
                <td>
                    <input type="text" name="chieurong" id="" value="<?php if (isset($_POST["chieurong"])) echo $_POST["chieurong"];
                    ?>">
                </td>
                </tr>
                <tr>
                <td>Kết quả</td>  
                <td>
                    <input type="text" name="ketQua" id="" style="background-color:red ;" readonly
                    value="<?php
                        if ((isset($_POST["chieudai"])) && (isset($_POST["chieurong"]))) echo $_POST["chieurong"] * $_POST["chieudai"];
                    ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Tính" >
                    <input type="submit" value="Reset" >
                    </td>
                </tr>
            </table>
    </form>
</body>
</html>