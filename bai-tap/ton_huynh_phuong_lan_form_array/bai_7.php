<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7</title>
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
    if (isset($_POST["submit"])){
    $duonglich=$_POST["duonglich"];
    $amlich=$_POST["amlich"];
    $mang_can=array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh","Tân", "Nhâm");
    $mang_chi=array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ","Ngọ","Mùi", "Thân" ,"Dậu","Tuất");
    $mang_hinh=array("hoi.jpg","ti.jpg","suu.jpg","dan.jpg","mao.jpg", "thin.jpg","ty.jpg","ngo.jpg","mui.jpg","than.jpg",
    "dau.jpg", "tut.jpg");
    $nam=$duonglich-3;
    $can=$nam%10;
    $chi=$nam%12;
    $amlich=$mang_can[$can];
    $amlich=$amlich." ".$mang_chi[$chi];
    $hinh=$mang_hinh[$chi];
    $hinh_anh="<img src='./12_con_giap/$hinh'>";
}
?>
    <form action="" method="post">
        <table style="background-color: #B9EEFF; margin: 0 auto; width: 400px">
            <tr style="background-color: #0863C6">
                <td colspan="3" align="center">TÍNH NĂM ÂM LỊCH</td>
            </tr>
            <tr>
                <td align="center">Năm dương lịch</td>
                <td></td>
                <td align="center">Năm âm lịch</td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="duonglich" id="" value="<?php
                        if (isset($duonglich)) echo $duonglich; else echo "";
                    ?>">
                </td>
                <td align="center">
                    <input type="submit" value="=>" style="color: red" name="submit"> 
                </td>
                <td>
                    <input type="text" name="amlich" id="" readonly value="<?php
                        if (isset($amlich)) echo $amlich; else echo "";
                    ?>">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <?php
                        if (isset($hinh_anh)) echo $hinh_anh; else echo "";
                    ?>
                </td>
                <td></td>
            </tr>
        </table>
    </form>
<?php
echo "</div>";
include("../../block/footer.php")
?>
</body>
</html>