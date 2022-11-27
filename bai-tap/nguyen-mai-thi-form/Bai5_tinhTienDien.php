<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền Karaoke</title>
</head>
<?php
    if(isset($_POST['submit'])){
        $start = $_POST['start'];
        $end = $_POST['end'];
        if(isset($start) && isset($end))
        {
            if($start > $end)
            {
                $start = "Giờ kết thúc phải lớn hơn giờ bắt đầu";
                $end = "Giờ kết thúc phải lớn hơn giờ bắt đầu";
            }
            else{
                if($start >= 10 && $end <= 17)
                {
                    $kq = ($end - $start)*20000;
                }
                else if($start > 10 && $end > 17)
                {
                    $kq = (17-$start)*20000 + ($end - 17)*45000;
                }
                else if($start >= 17 && $end >= 24)
                {
                    $kq = ($end - $start)*45000;
                }
            }
        }
        else{
            $start = "Giờ nghỉ";
            $end = "Giờ nghỉ";
        }
    }
    if(isset($_POST['reset'])){
        $start = "";
        $end = "";
        $kq = "";
    }
?>
<body>
    <form action="" method="post">
    <table align="center" bgcolor="#faebd7">
        <tr>
            <td colspan="2" bgcolor="yellow"><h1>TÍNH TIỀN KARAOKE</h1></td>
        </tr>
            <tr>
                <td>Giờ bắt đầu:</td>
                <td><input type="test" required value="<?php if (isset($start)) echo $start; else echo"";?>" name="start"></td>
            </tr>
            <tr>
                <td>Giờ kết thúc:</td>
                <td><input type="text" value="<?php if (isset($end)) echo $end; else echo"";?>" name="end"></td>
            </tr>
            <tr>
                <td>Tiền thanh toán:</td>
                <td><input type="text" value="<?php if (isset($kq)) echo $kq; else echo "";?> " name="result" disabled style="background-color: lightpink;"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center; padding-top: 10px;">
                    <button type="submit" style="display: inline; " name="submit">Tính</button>
                    <button type="submit" style="display: inline;" name="reset">Reset</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
        
        
    ?>
    
</body>

</html>