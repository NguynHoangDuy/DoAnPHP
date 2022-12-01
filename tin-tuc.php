<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyên liệu trà sữa</title>
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link rel="icon" type="image/x-icon" href="./assets/images/blue_tea_logo.webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
</head>

<body>
    <?php
        include("./block/connection.php");
        include("./block/global.php");
        include("./block/header.php");
    ?>
    <?php
        if(isset($_GET["id"]))
        {
            $id = $_GET["id"];
            $query = "SELECT `ma_tintuc`, `tieu_de`, `hinh_dd`, `noi_dung`, `tg_dang` FROM `tin_tuc` WHERE `ma_tintuc` = '$id'" ;
            $result = mysqli_query($conn, $query);
            if($result)
            {
                if(mysqli_num_rows($result) != 0)
                {
                    $row = mysqli_fetch_array($result);
                    echo '<div class="container">
                    <p class="blog-title size28">'.$row["tieu_de"].'</p>
                    <p class="blog-date mgb-20">'.$row["tg_dang"].'</p>';
                    echo $row['noi_dung'];
                    echo "</div>";  
                }
            }
    
        }
        else {
            echo '<div class="container">';
                echo "<p class='blog-detail-header'> Tin tức trà sữa</p>";
                getAllTinTuc($conn);
            echo '</div>';
        }


    ?>
    <?php
        include("./block/footer.php");
    ?>
    <script src="./assets/js/main.js"></script>
</body>

</html>