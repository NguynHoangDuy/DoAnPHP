<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
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
        $n="";
        $ketqua="";
        $s=0;
        if (isset($_POST["submit"])){
            $n=$_POST["n"];
            $mang=explode(",",$n);
            for ($i=0;$i<count($mang);$i++){
                $s=$s+$mang[$i];
            }
            $ketqua=$s;
        }
    ?>
    <form action="" method="post">
        <table style="background-color: #CCD9CF; margin: 0 auto">
            <tr style="background-color: #309393; padding: 0px 5px">
                <td colspan="3" align="center">NHẬP VÀ TÍNH TỔNG DÃY SỐ</td>
            </tr>
            <tr>
                <td>
                    Nhập dãy số:
                </td>
                <td>
                    <input type="text" name="n" id="" value="<?php
                        if (isset($n)) echo $n; else echo " ";
                    ?>">
                </td>
                <td style="color: red">
                    (*)
                </td>
            </tr>
            <tr>
                <td>
                    Tổng dãy số:
                </td>
                <td>
                    <input type="text" name="ketqua" id="" readonly disable value="<?php
                        if (isset($ketqua)) echo $ketqua; else echo " ";
                    ?>">
                </td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Tổng dãy số" name="submit" style="background-color: rgb(252,245,141); border: none; padding: 5px 10px; box-shadow: 0 1px 5px 0px">
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <span style="color: red">(*) </span> Các số được nhập cách nhau bằng dấu ","
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