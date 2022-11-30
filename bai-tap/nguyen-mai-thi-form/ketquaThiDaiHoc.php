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
            $toan = $_POST['toan'];
            $ly = $_POST['ly'];
            $hoa = $_POST['hoa'];
            $diemChuan = $_POST['diemChuan'];
            if (isset($toan) && isset($ly) && isset($hoa) && isset($diemChuan) && is_numeric($hoa) && is_numeric($ly) && is_numeric($toan) &&is_numeric($diemChuan) && $toan >= 0 && $ly >= 0 && $hoa >= 0 && $diemChuan > 0)
            {
                $tongDiem = round($toan + $ly + $hoa,1);
    
                if($tongDiem >= $diemChuan & $toan > 0 && $ly > 0 && $hoa > 0)
                $ketQuaThi = "Đậu";
                else $ketQuaThi = "Rớt";
            }
            else {
                $toan = "Nhập sai";
                $ly = "Nhập sai";
                $hoa = "Nhập sai";
                $diemChuan = "Nhập sai";}}

    ?>
    <div class="container">
    <form action="" method="post">
    <table align="center" bgcolor="yellow">
        <tr>
            <td colspan="2" bgcolor="violet"><h1>KẾT QUẢ THI ĐẠI HỌC </h1></td>
        </tr>
        <tr>
            <td>Toán :</td>
            <td> <input type="text" name="toan" value="<?php if (isset($toan)) echo $toan;?>"></td>
        </tr>
        <tr>
            <td>Lý:</td>
            <td> <input type="text" name="ly" value="<?php if (isset($ly)) echo $ly;?>"></td>
            </tr>
        </tr>
        <tr>
            <td>Hóa:</td>
            <td> <input type="text" name="hoa" value="<?php if (isset($hoa)) echo $hoa;?>"></td>
            </tr>
        </tr>
        <tr>
            <td>Điểm chuẩn:</td>
            <td> <input type="text" name="diemChuan" value="<?php if (isset($diemChuan)) echo $diemChuan;?>"></td>
            </tr>
        </tr>
        <tr>
            <td>Tổng điểm :</td>
            <td> <input type="text" name="tongDiem" style="background-color: lightpink; width: 160px" readonly
                        value="<?php if (isset($tongDiem)) echo $tongDiem; else echo "";?>">
            </td>
            <tr>
            <td>Kết quả thi:</td>
            <td> <input type="text" name="ketQuaThi" style="background-color: lightpink; width: 160px" readonly
                        value="<?php if (isset($ketQuaThi)) echo $ketQuaThi; else echo "";?>">
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type="submit" name="submit" value="Xem kết quả">
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