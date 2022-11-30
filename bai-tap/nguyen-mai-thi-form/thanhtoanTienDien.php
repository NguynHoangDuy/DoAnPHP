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
        include("../../block/header.php");
    ?>
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
    <div class="container">
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
        </table>
</form>
    </div>
    
        <?php
        include("../../block/footer.php");
    ?>
    
</body>
</html>