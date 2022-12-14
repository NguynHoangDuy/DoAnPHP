<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính điểm thi đại học</title>
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
        $toan="";
        $ly="";
        $hoa="";
        $tong="";
        $ketqua="";
        if (isset($_POST["submit"]))
        {
            define("diemchuan", $_POST["diemchuan"]);
            $toan=$_POST["toan"];
            $ly=$_POST["ly"];
            $hoa=$_POST["hoa"];
            $tong=$hoa+$ly+$toan;
            if (($toan > 0) and ($ly > 0) and ($hoa > 0) and ($tong >= diemchuan)){
                $ketqua="Đậu";
            }
            else 
                {
                    $ketqua="Rớt";
                }
        }
    ?>
    <form action="" method="post" style="display: block;
            margin: 0 auto;
            width: 300px;
            background-color: pink;">
        <table>
            <tr>
                <td colspan="2" align="center" style="font-style: italic;
            color: white;
            background-color: palevioletred;
            padding: 10px 45.3px;
            font-size: 20px;">KẾT QUẢ THI ĐẠI HỌC</td>
            </tr>
            <tr>
                <td>Toán</td>
                <td>
                    <input type="text" name="toan" value="<?php
                        if (isset($toan)) echo $toan; else echo "";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Lý</td>
                <td>
                    <input type="text" name="ly" value="<?php
                        if (isset($ly)) echo $ly; else echo "";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Hóa</td>
                <td>
                    <input type="text" name="hoa" value="<?php
                        if (isset($hoa)) echo $hoa; else echo "";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Điểm chuẩn</td>
                <td>
                    <input type="text" name="diemchuan" value="20" readonly style="color: red">
                </td>
            </tr>
            <tr>
                <td>Tổng</td>
                <td>
                    <input type="text" name="tong" value="<?php
                        if (isset($tong)) echo $tong; else echo "";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Kết quả</td>
                <td>
                    <input type="text" name="ketqua" value="<?php
                        if (isset($ketqua)) echo $ketqua; else echo "";
                    ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Kết quả" name="submit">
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