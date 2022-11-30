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
    <div class="container">
    <?php
    $ten="";
    $csMoi="";
    $csCu="";
    $soTien="";
    $DG=""; 
    if(isset($_POST["submit"]))
    {
        $ten=$_POST["tenChuHo"];
        $csMoi=$_POST["chiSoMoi"];
        $csCu=$_POST["chiSoCu"];
        if(is_numeric($csCu) and is_numeric($csMoi)){
            if ($csCu < $csMoi)
                $soTien=($csMoi - $csCu) * $DG;
            else
                echo'
                <script> alert("Không thể tính ra kết quả")</script>
                ';
        }
    }
        
    ?>
    <form action="" method="post" style="width: 500px; margin: 0 auto;">
        <table style="background-color:bisque">
            <tr style="background-color: orange">
                <td colspan="3" align="center" >
                    Thanh Toán Tiền Điện
                </td>
            </tr>
            <tr>
                <td>Tên chủ hộ:</td>
                <td><input type="text" value="<?php
                 if (isset($ten)) echo $ten; else echo ""?>"
                 name="tenChuHo" ></td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td><input type="text" value="<?php
                    if (isset($csMoi)) echo $csMoi; else echo "";?>"
                 name="chiSoMoi" ></td>
                 <td>(Kw)</td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td><input type="text" value="<?php
                    if (isset($csCu)) echo $csCu; else echo "" ;?>"
                 name="chiSoCu" ></td>
                 <td>(Kw)</td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td><input type="text" name="donGia" value="20000" ></td>
                <td>VNĐ</td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>
                <td><input type="text" style="background-color:hotpink ;" readonly value="<?php
                        if (isset($soTien)) echo $soTien; else echo "";?>"
                 name="soTienThanhToan" ></td>
                 <td>VNĐ</td>
            </tr>
            <tr>
                <td>

                </td>
                <td>
                    <input type="submit" value="Tính" name="submit">
                    <input type="submit" value="Xóa" name="reset">
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