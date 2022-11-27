<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền điện</title>
    <style>
        form{
            background-color: wheat;
            display: block;
            margin: 0 auto;
            width: 400px;
        }
        .form-title{
            font-style: italic;
            font-weight: bold;
            color: red;
            background-color: orange;
            text-align: center;
            padding: 10px 35px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <?php
    $chisocu="";
    $chisomoi="";
    $tien="";
    $tenchuho="";
    if (isset($_POST["submit"])){
        define("dongia", $_POST["dongia"]);
        $tenchuho=$_POST["tenchuho"];
        $chisocu=$_POST["chisocu"];
        $chisomoi=$_POST["chisomoi"];
        if ((is_numeric($chisocu)) and (is_numeric($chisomoi)))
        {
            if ($chisomoi > $chisocu)
            {
                $tien=($chisomoi-$chisocu) * dongia;
            }
            else 
                echo '
                    <script>
                        alert("Không thể tính được");
                    </script>
                ';
        }
    }

    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td colspan="3" align="center" class="form-title">THANH TOÁN TIỀN ĐIỆN CHO HỘ GIA ĐÌNH</td>
            </tr>
            <tr>
                <td>Tên chủ hộ:</td>
                <td>
                    <input type="text" name="tenchuho" id="" placeholder="Nhập tên chủ hộ..." value="<?php
                        if (isset($tenchuho)) echo $tenchuho; else echo ""; 
                    ?>">
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>Chỉ số cũ:</td>
                <td>
                    <input type="text" name="chisocu" id="" placeholder="Nhập chỉ số cũ..." value="<?php
                        if (isset($chisocu)) echo $chisocu; else echo "";
                    ?>">
                </td>
                <td>
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>Chỉ số mới:</td>
                <td>
                    <input type="text" name="chisomoi" id="" placeholder="Nhập chỉ số mới..." value="<?php
                        if (isset($chisomoi)) echo $chisomoi; else echo "";
                    ?>">
                </td>
                <td>
                    (Kw)
                </td>
            </tr>
            <tr>
                <td>Đơn giá:</td>
                <td>
                    <input type="text" name="dongia" id="" value="20000" readonly>
                </td>
                <td>
                    (VNĐ)
                </td>
            </tr>
            <tr>
                <td>Số tiền thanh toán:</td>
                <td>
                    <input type="text" name="tien" id="" style="background-color: pink" disabled 
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
                <input type="submit" value="Tính" name="submit">
                    <input type="submit" value="Xóa" name="reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>