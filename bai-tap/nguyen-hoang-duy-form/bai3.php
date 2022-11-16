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
        include("../../block/header-2.php");
    ?>
<?php



    if(isset($_POST['submit'])){
        $tenChuHo = $_POST['nameChuHo'];
        $chiSoCu = $_POST['chiSoCu'];
        $chiSoMoi = $_POST['chiSoMoi'];
        $donGia = $_POST['donGia'];
        if (isset($chiSoCu) && isset($chiSoMoi) && is_numeric($chiSoCu) && is_numeric($chiSoMoi) && $chiSoCu > 0 && $chiSoMoi > 0 && $chiSoCu < $chiSoMoi)
        {
            $tien = ($chiSoMoi-$chiSoCu)*$donGia;
        }
        else {
            $chiSoCu = "Nhập sai rồi má";
            $chiSoMoi = "Nhập sai rồi má";
        }
    }
    if(isset($_POST['reset'])){
        $tenChuHo = "";
        $chiSoCu = "";
        $chiSoMoi = "";
    }
?>
<div class="container">
<form action="" method="post">
        <table align="center" bgcolor="#faebd7">
            <tr>
                <td colspan="3" style="text-align:center; background-color: coral;">THANH TOÁN TIỀN ĐIỆN</td>
            </tr>
            <tr>
                <td>Tên chủ hộ:</td>
                <td><input type="test" required value="<?php if (isset($tenChuHo)) echo$tenChuHo; else echo"";?>" name="nameChuHo"></td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td><input type="text" value="<?php if (isset($chiSoCu)) echo$chiSoCu; else echo"";?>" name="chiSoCu"></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td><input type="text" value="<?php if (isset($chiSoMoi)) echo$chiSoMoi; else echo "";?>" name="chiSoMoi"></td>
                <td>(Kw)</td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td><input type="text" value="2000" name="donGia" readonly></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>
                <td><input type="text" value="<?php if (isset($tien)) echo $tien; else echo "";?> " name="tien" disabled style="background-color: lightpink;"></td>
                <td>(VNĐ)</td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center; padding-top: 10px;">
                    <button type="submit" style="display: inline; " name="submit">Tính</button>
                    <button type="submit" style="display: inline;" name="reset">Reset</button>
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