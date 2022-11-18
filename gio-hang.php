<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyên Liệu Trà Sữa</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/main.css"/>
    <link rel="icon" type="image/x-icon" href="./assets/images/blue_tea_logo.webp">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
</head>
<body>
<?php
    include("./block/connection.php");
    include("./block/global.php");
    include("./block/header.php");
?>

<?php
    // session_start();
    if(!isset($_SESSION["gioHang"]))
    {
        include("./block/not-cart.php");
    }
    else {
        $gioHang = $_SESSION["gioHang"];
        
    }
?>

<div class="container">
<?php include("./block/product-hot.php")?>
</div>
<?php
    include("./block/footer.php");
?>
</body>

</html>