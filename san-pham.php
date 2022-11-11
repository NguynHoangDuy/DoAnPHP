<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyên Liệu Trà Sữa</title>
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
        if(isset($_GET["loc"]))
        {
            $dk = $_GET["dm"];
        }
    ?>
    <div class="container">
        <div class="filter-product">
            <h3 class="title"> Sản phẩm</h3>
            <form action="" method="get">
                <div class="select">
                    <select name="dm">
                        <option value="">Tất cả</option>
                        <?php
                            $queryDM = "SELECT * FROM `danh_muc`";
                            $result = mysqli_query($conn, $queryDM);
                            if($result)
                            {
                                if(mysqli_num_rows($result)!= 0){
                                    while($row = mysqli_fetch_array($result))
                                        {
                                            if(isset($dk))
                                            {
                                                if($dk === $row["ma_dm"])
                                                {
                                                    echo "<option value='$row[ma_dm]' selected>$row[ten_dm]</option>";
                                                }
                                                else echo "<option value='$row[ma_dm]'>$row[ten_dm]</option>";
                                            }
                                            else echo "<option value='$row[ma_dm]'>$row[ten_dm]</option>";
                                            
                                        }
                                }
                            }
                        ?>
                    </select>
                    <button type="button">
                        <p class="btn-desc">Lọc sản phẩm</p>
                    </button>
                    <div class="dropdown-menu">
                        <div class="bs-searchbox">
                            <input type="text" class="form-control" autocomplete="off" placeholder="Tìm danh mục...">
                        </div>
                        <div class="dropdown-content">

                        </div>
                    </div>
                </div>
                <button type="submit" name="loc">Lọc</button>
            </form>
        </div>       
    </div>
    <?php
        
        echo "<div class='container'>";
        if(isset($dk) && $dk != "")
        {
            getALLSanPhamDM($conn, $dk);
        }
        else getAllSanPham($conn);  
        echo "</div>";
    ?>
    <?php
        include("./block/footer.php");
    ?>
</body>
<script src="./assets/js/main.js"></script>
</html>