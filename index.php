<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyên liệu trà sữa</title>
    <link rel="stylesheet" href="./assets/css/main.css"/>
    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
</head>
<body>
    <?php
        include("./block/connection.php");
        include("./block/global.php");
        include("./block/header.php")
    ?>

    <div class="container">
        <h3>Thạch</h3>

        <?php getSanPham($conn, "THA"); ?>
    </div>
    <div class="container">
        <h3>Thạch</h3>

        <?php getSanPham($conn, "TRA"); ?>
    </div>
        
    <?php
        include("./block/footer.php");
    ?>
</body>
</html>