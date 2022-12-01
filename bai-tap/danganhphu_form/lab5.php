<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>
    <link rel="stylesheet" href="../../assets/css/main.css"/>
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
</head>
    <?php
        include("../../block/header.php");
    ?>
<?php
    if(isset($_POST['submit'])){
        $gioBD = $_POST['gioBD'];
        $gioKT = $_POST['gioKT'];
        if(isset($gioBD) && isset($gioKT))
        {
            if($gioBD > $gioKT)
            {
                $gioBD = $gioKT = "Giờ kt > giờ bd";
            }
            else{
                if($gioBD >= 10 && $gioKT <= 17)
                {
                    $result = ($gioKT - $gioBD)*20000;
                }
                else if($gioBD > 10 && $gioKT > 17)
                {
                    $result = (17-$gioBD)*20000 + ($gioKT - 17)*45000;
                }
                else if($gioBD >= 17 && $gioKT >= 24)
                {
                    $result = ($gioKT - $gioBD)*45000;
                }
            }
        }
        else{
            $gioBD = $gioKT = "Giờ nghỉ";
        }
    }
    if(isset($_POST['reset']))
        $gioBD = $gioKT = $result = "";
?>
<body>
    <form action="" method="post">
        <table align="center" style="background-color: #F5D5AE; margin: 20px auto;">
            <thead>
                <tr>
                    <th colspan="3" style="background-color: #FFE15D">TÍNH TIỀN KARAOKE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Giờ bắt đầu:</td>
                    <td><input type="test" required value="<?php if (isset($gioBD)) echo $gioBD; else echo"";?>" name="gioBD"></td>
                    <td>(h)</td>
                </tr>
                <tr>
                    <td>Giờ kết thúc:</td>
                    <td><input type="text" value="<?php if (isset($gioKT)) echo $gioKT; else echo"";?>" name="gioKT"></td>
                    <td>(h)</td>
                </tr>
                <tr>
                    <td>Tiền thanh toán: </td>
                    <td><input type="text" value="<?php if (isset($result)) echo $result; else echo "";?> " name="result" disabled></td>
                    <td>(VNĐ)</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center">
                        <button type="submit" name="submit">Tính tiền</button>
                        <button type="submit" name="reset">Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>