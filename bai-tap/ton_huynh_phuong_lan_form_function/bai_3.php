<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền điện</title>
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
    <form action="" method="post" style="background-color: wheat;
            display: block;
            margin: 0 auto;
            width: 400px;">
        <table>
            <tr>
                <td colspan="3" align="center" style="font-style: italic;
            font-weight: bold;
            color: red;
            background-color: orange;
            text-align: center;
            padding: 10px 35px;
            font-size: 16px;">THANH TOÁN TIỀN ĐIỆN CHO HỘ GIA ĐÌNH</td>
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
    <?php
echo "</div>";
include("../../block/footer.php")
?>
</body>
</html>