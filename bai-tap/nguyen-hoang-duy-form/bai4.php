<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
<body>
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
    <?php
        
        
    ?>
    
</body>

</html>