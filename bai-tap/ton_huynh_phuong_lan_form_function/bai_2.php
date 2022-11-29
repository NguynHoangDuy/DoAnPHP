<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính chu vi và diện tích hình tròn</title>
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
    include("../../block/header-2.php");
    echo "<div class='container'>";
    $s="";
    define("PI", 3.14);
    $p="";
    $r="";
        if (isset($_POST["submit"]))
        {
            $r=$_POST["r"];
            if (isset($r) and is_numeric($r)){
                $p=PI * $r * $r;
                $s=2*PI* $r;
            }
        }
    ?>
    <form action="" method="post" style="background-color: pink;
            display: block;
            margin: 0 auto;
            width: 300px;">
        <table>
            <tr style="background-color: orange">
                <td colspan="2" align="center" >
                    TÍNH CHU VI VÀ DIỆN TÍCH HÌNH TRÒN
                </td>
            </tr>
            <tr>
                <td>Bán kính:</td>
                <td>
                    <input type="text" name="r" id="" value="<?php
                    if (isset($r)) echo $r; else echo ""; 
                    ?>"> 
                </td>
            </tr>
            <tr>
                <td>Chu vi: </td>
                <td> 
                    <input type="text" name="p" readonly disable value="<?php
                    if (isset($p)) echo $p; else echo ""; 
                    ?>">
                </td>
            </tr>
            <tr>
                <td>Diện tích: </td>
                <td>
                    <input type="text" name="s" readonly disable value="<?php
                    if (isset($s)) echo $s; else echo ""; 
                    ?>">
                </td>
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
    <?php
echo "</div>";
include("../../block/footer.php")
?>
</body>
</html>