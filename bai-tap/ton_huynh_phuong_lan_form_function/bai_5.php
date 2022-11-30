<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền karaoke</title>
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
    include("../../block/header.php");
    echo "<div class='container'>";
    $gioketthuc="";
    $tien="";
    $giobatdau="";
    $tien1="";
    $tien2="";
    define("dongia1", 20000);
    define("dongia2", 45000);
    if (isset($_POST["submit"])){
        $giobatdau=$_POST["giobatdau"];
        $gioketthuc=$_POST["gioketthuc"];
        if ((is_numeric($giobatdau)) and (is_numeric($gioketthuc)))
        {
            if ($gioketthuc > $giobatdau)
            {
                if ($giobatdau>=10 and $gioketthuc<=17){
                    $tien=($gioketthuc-$giobatdau) * dongia1;
                }
                else if ($giobatdau>=17 and $gioketthuc<=24){
                    $tien=($gioketthuc-$giobatdau) * dongia2;
                }
                else if ($giobatdau>=10 and $gioketthuc<=24){
                    $tien=(17-$giobatdau) * dongia1 + ($gioketthuc -17) * dongia2;
                }
            }
            else 
                echo '
                    <script>
                        alert("Giờ kết thúc phải lớn hơn giờ bắt đầu");
                    </script>
                ';
        }
    }

    ?>
    <form action="" method="post" style=" background-color: #03b0b6;
            display: block;
            margin: 0 auto;
            width: 350px;">
        <table>
            <tr>
                <td colspan="3" align="center" style="font-style: italic;
            font-weight: bold;
            color: white;
            background-color: #018b8e;
            text-align: center;
            padding: 10px 90px;
            font-size: 16px;">TÍNH TIỀN KARAOKE</td>
            </tr>
            <tr>
                <td>Giờ bắt đầu:</td>
                <td>
                    <input type="text" name="giobatdau" id="" placeholder="Nhập giờ bắt đầu..." value="<?php
                        if (isset($giobatdau)) echo $giobatdau; else echo ""; 
                    ?>" min="10" >
                </td>
                <td>
                    (h)
                </td>
            </tr>
            <tr>
                <td>Giờ kết thúc:</td>
                <td>
                    <input type="text" name="gioketthuc" id="" placeholder="Nhập giờ kết thúc..." value="<?php
                        if (isset($gioketthuc)) echo $gioketthuc; else echo "";
                    ?>" max="24" >
                </td>
                <td>
                    (h)
                </td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>
                <td>
                    <input type="text" name="tien" id="" style="background-color: wheat" disabled 
                    value="<?php
                        if (isset($tien)) echo $tien; else echo "";
                    ?>">
                </td>
                <td>
                    (VNĐ)
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                <input type="submit" value="Tính tiền" name="submit">
                    <input type="submit" value="Xóa" name="reset">
                </td>
            </tr>
        </table>
    </form>
    <?php
echo "</div>";
include("../../block/footer.php")
?>
</body>
</html>