<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập dữ liệu</title>
    <style>
        input{
            width: auto;
        }
    </style>
</head>
<body>
<?php
    if(isset($_POST["submit"]))
    {
        $so_2 = $_POST["so_2"];
        if(isset($_POST["pheptinh"])){
            if($_POST["pheptinh"] == "Chia")
            {
                if(isset($so_1)&&isset($so_2))
                {
                    if ($so_2==0){
                        $err="Lỗi nhập số";
                    }
                    else {
                        $link = "./bai_6_xemketqua.php";
                    }
                }
            }
            else {
                $link = "./bai_6_xemketqua.php";
            }
        }
    }
    ?>
    <form action="<?php if (isset($link)) echo $link; else echo ""; ?>./bai_6_xemketqua.php" method="post">
        <table align="center" style="border: 1px solid #3F6F9F">
            <tr >
                <td colspan="9" style="text-align:center; color: #3F6F9F">PHÉP TÍNH TRÊN HAI SỐ</td>
            </tr>
            <tr>
                <td style="color: #AF613A"><strong>Chọn phép tính</strong>:</td>
                <td style="color: red">
                    <input type="radio" name="pheptinh" value="Cong">
                    Cộng
                    <input type="radio" name="pheptinh" value="Tru">
                    Trừ
                    <input type="radio" name="pheptinh" value="Nhan">
                    Nhân
                    <input type="radio" name="pheptinh" value="Chia">
                    Chia
                </td>
            </tr>
            <tr>
                <td style="color: #3860FF">Số thứ nhất:</td>
                <td><input type="text" name="so_1"></td>
            </tr>
            <tr>
                <td style="color: #3860FF">Số thứ hai:</td>
                <td><input type="text" name="so_2"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit"name="submit">Tính</button>
                </td>
            </tr>
        </table>
    </form>
    <?php
        
        
    ?>
    
</body>

</html>