<?php

function product_same($dm, $conn){
    echo '<div class="product-hot">
            <p class="product-hot-title">Sản phẩm liên quan</p>';
                $query = "SELECT `ma_sp`,`ten_sp`,`gia`,`ten_dm`,`hinh_anh` FROM `san_pham` inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm WHERE danh_muc.ten_dm = '$dm'  ORDER BY RAND () LIMIT 1, 4";
                $result =  mysqli_query($conn, $query);
                if(!$result)
                echo "Không xem được";
                else {
                    if(mysqli_num_rows($result) != 0)
                    {
                        echo '<div class="product">';
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<a class='product-item' href='./chi-tiet-san-pham.php?id=$row[ma_sp]'>";
                            $src = "./assets/images/$row[hinh_anh]";
                                echo "<div class='product-img'>
                                <img src='".$src."'>
                                    </div>";
                                echo "<div class='product-content'>
                                    <p class='product-dm'>$row[ten_dm]</p>
                                    <p class='product-name'>$row[ten_sp]</p>
                                    <p class='product-price'><span class='money'>$row[gia]</span> VNĐ</p>
                                </div>";
                            echo "</a>";
                        }
                        echo "</div>";  
                    }
                }
        echo '</div>';
}

?>

