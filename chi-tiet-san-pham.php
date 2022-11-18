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
    $id = $_GET['id'];
    $query= "SELECT `ma_sp`,`ten_sp`,`gia`,`ten_dm`,`hinh_anh`, `mo_ta` FROM `san_pham` inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm
    WHERE ma_sp = '$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    if(isset($_POST["addCard"]))
    {
        session_start();
        $sl = $_POST["amount"];
        $gia = $sl * $row["gia"];
        $arr = ["ma_sp" => $row["ma_sp"], "sl" => $sl, "gia" => $gia];
        if(isset($_SESSION["gioHang"]))
        {
            $gioHang = $_SESSION["gioHang"];
            $checkCard = false;
            for($i = 0; $i < count($gioHang); $i++)
            {
                if($gioHang[$i]["ma_sp"] == $arr["ma_sp"])
                {
                    $checkCard = true;
                    $gioHang[$i]["sl"] = $gioHang[$i]["sl"] + $arr["sl"];
                    $gioHang[$i]["gia"] = $gioHang[$i]["gia"] + $arr["gia"];
                }
            }
            if($checkCard == false)
            {
                array_push($gioHang, $arr);
            }
            $_SESSION["gioHang"] = $gioHang;
        }
        else {
            $gioHang = [$arr];
            $_SESSION["gioHang"] = $gioHang;
        }        
        session_write_close();
}
            
    ?>
    <?php
      
        include("./block/header.php");
        $src = "./assets/images/$row[hinh_anh]";
    ?>
    <div class="container">
    <form action="" method="post">
        <div class="product-detail">
            <div class="detail-img">
                <img src="<?php echo $src;?>" alt="">
                <p class='product-dm'><?php echo $row["ten_dm"];?></p>
            </div>
            <div class="detail-info">
                <p class="detail-name"> <?php echo $row["ten_sp"];?></p>
                <p class="detail-price"> <b>Giá: </b> <?php echo "<span class='money'> ".$row['gia']."</span>";?> VNĐ</p>
                <p class="detail-dm"> <b>Danh mục: </b> <?php echo $row["ten_dm"];?></p>
                <p class="detail-desc"> <b>Mô tả: </b> <?php echo $row["mo_ta"];?></p>
                <div class="detail-count">
                    <p style="font-size: 20px; font-weight: bold;">Chọn số lượng:</p>
                    <div class="detail-count-content">
                        <button class="detail-btn btn-decr" type="button">-</button>
                        <input type="number" class="input-count" value="1" name="amount">
                        <button class="detail-btn btn-incr" type="button">+</button>
                    </div>
                </div>
                
                    <div class="buy">
                        <button class="btn-add" type="submit" name="addCard">
                            THÊM VÀO GIỎ HÀNG
                        </button>
                        <button class="btn-buy" type="submit" name="buyNow">
                            MUA NGAY
                        </button>
                    </div>
                
                <div class="commit">
                    <h3 class="commit-title">
                        Blue tea cam kết
                    </h3>
                    <div class="commit-content">
                        <div class="commit-item">
                            <div class="commit-img">
                                <img src="./assets/images/exchange-500x500.png" alt="">
                            </div>
                            <p class="commit-desc">Đổi trả trong 30 ngày</p>
                        </div>
                        <div class="commit-item">
                            <div class="commit-img">
                                <img src="./assets/images/like-500x500.png" alt="">
                            </div>
                            <p class="commit-desc">Đảm bảo chất lượng</p>
                        </div>
                        <div class="commit-item">
                            <div class="commit-img">
                                <img src="./assets/images/express-delivery-500x500.png" alt="">
                            </div>
                            <p class="commit-desc">Miễn phí vận chuyển</p>
                        </div>
                    </div>
                </div>
                <div class="detail-contact">
                    <p>
                    <i class="fa-solid fa-phone"></i>
                    <b>0369454037</b>
                    <span>Gọi tư vấn (8:00 - 22:00)</span>
                    </p>
                </div>
            </div>
        </div>
        <?php include("./block/product-hot.php")?>
        </form>
    </div>
    <?php
        include("./block/footer.php");
    ?>
</body>
<script src="./assets/js/main.js"></script>
</html>