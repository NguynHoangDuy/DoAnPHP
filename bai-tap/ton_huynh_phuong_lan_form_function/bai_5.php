<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền karaoke</title>
    <style>
        form{
            background-color: #03b0b6;
            display: block;
            margin: 0 auto;
            width: 350px;
        }
        .form-title{
            font-style: italic;
            font-weight: bold;
            color: white;
            background-color: #018b8e;
            text-align: center;
            padding: 10px 90px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php
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
    <form action="" method="post">
        <table>
            <tr>
                <td colspan="3" align="center" class="form-title">TÍNH TIỀN KARAOKE</td>
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
</body>
</html>