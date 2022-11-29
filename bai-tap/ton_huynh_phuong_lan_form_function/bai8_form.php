<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    $fullname="";
    if (isset($_POST["submit"])){
        header("Location: ./bai8_config.php");
        $fullname=$_POST["fullname"];
        $address=$_POST["address"];
        $phone=$_POST["phone"];
        $gender=$_POST["gender"];
        $country=$_POST["country"];
        $mess=$_POST["mess"];
        if ((isset($_POST["php"]))){
            $php=$_POST["php"];
        } else $php="";
        if (isset($_POST["aspnet"])){
            $aspnet=$_POST["aspnet"];
        } else $aspnet="";
        if (isset($_POST["ccna"])){
            $ccna=$_POST["ccna"];
        } else $ccna="";
        if (isset($_POST["security"])){
            $security=$_POST["security"];
        } else $security="";
        session_start();
        $_SESSION["fullname"]=$fullname;
        $_SESSION["address"]=$address;
        $_SESSION["phone"]=$phone;
        $_SESSION["gender"]=$gender;
        $_SESSION["country"]=$country;
        $_SESSION["php"]=$php;
        $_SESSION["aspnet"]=$aspnet;
        $_SESSION["ccna"]=$ccna;
        $_SESSION["security"]=$security;
        $_SESSION["mess"]=$mess;
        session_write_close();
    }
    ?>
    <form action="" method="post">
        <table>
            <tr>
                <td>
                    Full name
                </td>
                <td>
                    <input type="text" name="fullname" id="" value="<?php
                        if (isset($fullname)) echo $fullname; else echo "";
                    ?>
                    ">
                </td>
            </tr>
            <tr>
                <td>
                    Address
                </td>
                <td>
                    <input type="text" name="address" id="" value="<?php
                        if (isset($address)) echo $address; else echo "";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Phone
                </td>
                <td>
                    <input type="text" name="phone" id="" value="<?php
                        if (isset($phone)) echo $phone; else echo "";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Gender
                </td>
                <td>
                    <input type="radio" name="gender" id="" value="Nam"> Nam
                    <input type="radio" name="gender" id="" value="Nữ"> Nữ
                </td>
            </tr>
            <tr>
                <td>
                    Country 
                </td>
                <td>
                    <select name="country" id="">
                        <option value="Việt Nam">Việt Nam</option>
                        <option value="Nhật">Nhật</option>
                        <option value="Hàn">Hàn</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Study
                </td>
                <td>
                    <input type="checkbox" name="php" id="" value="PHP & MySQL"> PHP & MySQL
                    <input type="checkbox" name="aspnet" id="" value="ASP.NET"> ASP.NET
                    <input type="checkbox" name="ccna" id="" value="CCNA"> CCNA
                    <input type="checkbox" name="security" id="" value="SECURITY"> SECURITY
                </td>
            </tr>
            <tr>
                <td>Message</td>
                <td>
                    <textarea name="mess" id="" cols="30" rows="10"><?php
                        if (isset($mess)) echo $mess; else echo "";
                    ?></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Gửi" name="submit">
                    <input type="submit" value="Hủy" name="reset">
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