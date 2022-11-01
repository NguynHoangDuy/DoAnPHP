<?php
    function getSanPham($conn, $danhMuc){
        $query = "SELECT `ma_sp`,`ten_sp`,`gia`,`ten_dm`,`hinh_anh` FROM `san_pham` inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm WHERE `danh_muc` = '$danhMuc' LIMIT 1, 8";
        $result =  mysqli_query($conn, $query);
        if(!$result)
        echo "Không xem được";
        else {
            if(mysqli_num_rows($result) != 0)
            {
                echo "<div class='product'>";
                while($row = mysqli_fetch_array($result))
                {
                    $src = "./assets/images/$row[hinh_anh]";
                    echo "<div class='product-item'>";
                        echo "<div class='product-img'>
                        <img src='".$src."'>
                            </div>";
                        echo "<div class='product-content'>
                            <p class='product-dm'>$row[ten_dm]</p>
                            <p class='product-name'>$row[ten_sp]</p>
                            <span class='product-price'>$row[gia] VNĐ</span>
                        </div>";
                    echo "</div>";
                }
                echo "</div>";
            }
        }
    }
?>
