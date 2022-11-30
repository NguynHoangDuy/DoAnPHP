<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả của phép tính</title>
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
    include("../../block/heade.php");
    echo "<div class='container'>";
        if(isset($_POST["pheptinh"]))
        {
            $so_1 = $_POST["so_1"];
            $so_2 = $_POST["so_2"];
            switch($_POST["pheptinh"]){
                case "Cong":
                    $ketqua = $so_1 + $so_2;
                    $phep = "Cộng";
                    break;
                case "Tru":
                    $ketqua = $so_1 - $so_2;
                    $phep = "Trừ";
                    break;
                case "Nhan":
                    $ketqua = $so_1 * $so_2;
                    $phep = "Nhân";
                    break;
                case "Chia":
                    $ketqua = $so_1 / $so_2;
                    $phep = "Chia";
                    break;
                default:
                    echo "Nhập sai rồi";
            }
        }
    ?>
    <form action="" method="post">
        <table align="center" style="border: 1px solid #3F6F9F">
            <tr>
                <td colspan="9" style="text-align:center; color: #3F6F9F">PHÉP TÍNH TRÊN HAI SỐ</td>
            </tr>
            <tr>
                <td style="color: #AF613A"><strong>Chọn phép tính:</strong></td>
                <td style="color: red">
                    <?php
                        if(isset($phep)) echo "$phep"; else echo "";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Số thứ nhất:</td>
                <td><input type="text" value="<?php 
                if (isset($so_1)) echo $so_1; else echo"";?>" name="" disabled>
                </td>
            </tr>
            <tr>
                <td>Số thứ hai:</td>
                <td><input type="text" value="<?php 
                if (isset($so_2)) echo $so_2; else echo"";?>" name="" disabled>
                </td>
            </tr>
            <tr>
                <td>Kết quả:</td>
                <td style="font-weight:bold"><input type="text"  value="<?php 
                if (isset($ketqua)) echo $ketqua; else echo "";?> " name="ketqua" disabled style="background-color: #3860FF; color: white"></td>
            </tr>
            <tr>
                <td></td>
                <td><a href="javascript:window.history.back(-1);">Trở về trang trước</a></td>
            </tr>
        </table>
    </form>
    <?php
echo "</div>";
include("../../block/footer.php")
?>
    
</body>

</html>