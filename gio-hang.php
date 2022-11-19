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

    $phiGH = 30000;
    if(isset($gia))
    {
        $tong = $gia + $phiGH;
    }
?>

<?php
    // session_start();
    if(!isset($_SESSION["gioHang"]))
    {
        include("./block/not-cart.php");
    }
    else {
        $gioHang = $_SESSION["gioHang"];
        echo "<div class='container'>
        <form action='' method='post' class='cart-content'>
            <div class='cart'>
                <h2 class='cart-title'>Có ".count($gioHang)." sản phẩm trong giỏ hàng</h2>
                <div class='cart-group'>";

        for($i = 0; $i < count($gioHang); $i++)
        {
            $arr = $gioHang[$i];
            $query= "SELECT `ma_sp`,`ten_sp`,`gia`,`ten_dm`,`hinh_anh` FROM `san_pham` inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm WHERE `ma_sp` = '$arr[ma_sp]'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $src = "./assets/images/$row[hinh_anh]";
            echo " <div class='cart-item'>
                        <div class='cart-item--img'>
                            <img src='".$src."' alt=''>
                        </div>
                        <div class='cart-item-info'>
                            <a href='./chi-tiet-san-pham.php?id=$row[ma_sp]' class='cart-item--name'>".$row['ten_sp']."</a>
                            <p class='cart-item--dm'> <b>Danh mục: </b>".$row['ten_dm']."</p>
                        </div>
                        <div class='cart-item--amount'>
                                <div class='cart-item--sl'>
                                    <button class='detail-btn btn-decr' >-</button>
                                    <input type='number' class='input-count' value='$arr[sl]' name='amount'>
                                    <button class='detail-btn btn-incr' >+</button>
                                </div>
                                <p class='cart-item--price'> <span class='money'>$arr[gia]</span> VNĐ</p>
                                <button class='btn-del' name='delete'>
                                    <i class='fa-solid fa-trash-can'></i>
                                    <span>Xóa</span>
                                </button>
                        </div>
                    </div> ";
        }
                    
        echo"   </div>
            <div class='form-order'>
                    <div class='form-order--group'>
                        <div class='form-order-radius'>
                            <label for='nam'>
                                <input type='radio' value ='1' checked name='gt' id='nam'>
                                <span>Anh</span>
                            </label>
                        </div>
                        <div class='form-order-radius'>
                            <label for='nu'>
                                <input type='radio' value ='0' name='gt' id='nu'>
                                <span>Chị</span>
                            </label>
                        </div>
                    </div>
                    <div class='form-order--group'>
                        <div class='form-order-item'>
                            <input type='text' name='hoten' placeholder='Nhập họ và tên'>
                        </div>
                        <div class='form-order-item'>
                            <input type='tel' name='sdt' placeholder='Nhập số điện thoại'>
                        </div>
                    </div>
                    <div class='form-order--group'>
                        <div class='form-order-address'>
                            <textarea name='diachi' placeholder='Nhập địa chỉ'></textarea>
                        </div>
                    </div>
                    </div>
                </div>
                <div class='cart-info'>
                    <h3 class='cart-info-title'>
                        <i class='fa-solid fa-bag-shopping'></i>
                        <span>Thông tin đơn hàng</span>
                    </h3>
                    <div class='cart-info--content'>
                        <div class='cart-info-item'>
                            <p class='cart-info-desc'>
                                Tổng tiền
                            </p>
                            <p class='cart-info-price'>
                                <span class='money'>".$gia."</span>
                                 <span> VNĐ</span>
                            </p>
                        </div>
                        <div class='cart-info-item'>
                            <p class='cart-info-desc'>
                                Phí giao hàng dự kiến
                            </p>
                            <p class='cart-info-price'>
                                <span class='money'>". $phiGH."</span>
                                 <span> VNĐ</span>
                            </p>
                        </div>
                        <div class='cart-info-item'>
                            <p class='cart-info-desc'>
                                <b>Cần thanh toán</b>
                            </p>
                            <p class='cart-info-price bold'>
                                <span class='money'>".$tong."</span>
                                 <span> VNĐ</span>
                            </p>
                        </div>
                    </div>
                    <div class='cart-info--order'>
                        <div class='cart-info--btn'>
                            <button type='submit' name='dathang'>Hoàn tất đặt hàng</button>
                        </div>
                        <p class='cart-info-detail'>Bằng cách đặt hàng, bạn đồng ý với<br>
                        Điều khoản sử dụng của Blue Tea</p>
                    </div>
                </div>
            </form>
        </div>";
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