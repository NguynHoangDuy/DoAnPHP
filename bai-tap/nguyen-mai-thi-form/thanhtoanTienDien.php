<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Tiền Điện</title>
</head>
<body>
    <?php
    if (isset($_POST["submit"]))
    {
        $chuHo=$_POST['tenChuHo'];
        $chiSoCu=$_POST['chiSoCu'];
        $chiSoMoi=$_POST['chiSoMoi'];
        $donGia=$_POST['donGia'];

           if (isset($chiSoCu)&& isset($chiSoMoi)&& $chiSoCu>0 && $chiSoMoi>0 && $chiSoMoi> $chiSoCu) 
           {
            $sotienThanhToan=($chiSoMoi-$chiSoCu)*$donGia;
           }
           else
           {
            $chiSoCu="nhập sai ";
            $chiSoMoi=" nhập sai";
           }

    }
    
    ?>
    <form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="3" bgcolor="yellow"><h1>THANH TOÁN TIỀN ĐIỆN </h1></td>
        </tr>
        <tr>
            <td>Tên chủ hộ:</td>
            <td> <input type="text" name="tenChuHo" value="<?php if (isset($chuHo)) echo $chuHo;?>"></td>
        </tr>
        <tr>
            <td>Chỉ số cũ:</td>
            <td> <input type="text" name="chiSoCu" value="<?php if (isset($chiSoCu)) echo $chiSoCu;?>"></td>
            <td>(Kw)</td>
            </tr>
        </tr>
        <tr>
            <td>Chỉ số mới:</td>
            <td> <input type="text" name="chiSoMoi" value="<?php if (isset($chiSoMoi)) echo $chiSoMoi;?>"></td>
            <td>(Kw)</td>
            </tr>
        </tr>
        <tr>
            <td>Đơn giá:</td>
            <td> <input type="text" name="donGia" value="2000" readonly></td>
            <td>(VNĐ)</td>
            </tr>
        </tr>
        <tr>
            <td>Số tiền thanh toán:</td>
            <td> <input type="text" name="area" style="background-color: lightpink; width: 160px" readonly
                        value="<?php if (isset($sotienThanhToan)) echo $sotienThanhToan; else echo "";?>">
            </td>
            <td>(VNĐ)</td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" name="submit" value="Tính">
                <input type="submit" name="reset" value="Clear">
            </td>
        </tr>
</body>
</html>