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
        include("./block/header.php");
        include("./block/category_slider.php");
    ?>
    <?php
        $queryDM = "SELECT * FROM `danh_muc`";
        $result = mysqli_query($conn, $queryDM);

        if($result)
        {
            if(mysqli_num_rows($result)!= 0){
                while($row = mysqli_fetch_array($result))
                    {
                        echo "<div class='container'>
                        <h3 class='product-header'>".$row["ten_dm"]."</h3>";
                         getSanPham($conn, $row["ma_dm"]); 
                        echo "</div>";
                    }
            }
        }
    ?>
    
        
    <?php
        include("./block/footer.php");
    ?>
</body>
</html>