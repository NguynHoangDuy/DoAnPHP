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



    if(isset($_POST['submit'])){
        $toan = $_POST['math'];
        $ly = $_POST['physics'];
        $hoa = $_POST['chemistry'];
        $diemChuan = $_POST['mark'];
        if (isset($toan) && isset($ly) && isset($hoa) && isset($diemChuan) && is_numeric($hoa) && is_numeric($ly) && is_numeric($toan) &&is_numeric($diemChuan) && $toan >= 0 && $ly >= 0 && $hoa >= 0 && $diemChuan > 0)
        {
            $tong = round($toan + $ly + $hoa,1);

            if($tong >= $diemChuan & $toan > 0 && $ly > 0 && $hoa > 0)
            $kq = "Đậu";
            else $kq = "Rớt";
        }
        else {
            $toan = "Nhập sai rồi má";
            $ly = "Nhập sai rồi má";
            $hoa = "Nhập sai rồi má";
            $diemChuan = "Nhập sai rồi má";
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
                <td colspan="2" style="text-align:center; background-color: coral;">KẾT QUẢ THI ĐẠI HỌC</td>
            </tr>
            <tr>
                <td>Toán:</td>
                <td><input type="test" required value="<?php if (isset($toan)) echo$toan; else echo"";?>" name="math"></td>
            </tr>
            <tr>
                <td>Lý:</td>
                <td><input type="text" value="<?php if (isset($ly)) echo$ly; else echo"";?>" name="physics"></td>
            </tr>
            <tr>
                <td>Hóa:</td>
                <td><input type="text" value="<?php if (isset($hoa)) echo$hoa; else echo "";?>" name="chemistry"></td>
            </tr>
            <tr>
                <td>Điểm chuẩn:</td>
                <td><input type="text" value="<?php if(isset($diemChuan)) echo $diemChuan; else echo ""?>" name="mark" ></td>
            </tr>
            <tr>
                <td>Tổng điểm:</td>
                <td><input type="text" value="<?php if(isset($tong)) echo $tong; else echo ""?>" name="total" disabled style="background-color: lightpink;"></td>
            </tr>
            <tr>
                <td>Kết quả thi:</td>
                <td><input type="text" value="<?php if (isset($kq)) echo $kq; else echo "";?> " name="result" disabled style="background-color: lightpink;"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding-top: 10px;">
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