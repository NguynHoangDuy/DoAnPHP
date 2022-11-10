<?php
    function getSanPham($conn, $danhMuc){
        $query = "SELECT `ma_sp`,`ten_sp`,`gia`,`ten_dm`,`hinh_anh` FROM `san_pham` inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm WHERE `danh_muc` = '$danhMuc' LIMIT 1, 8";
        $result =  mysqli_query($conn, $query);
        if(!$result)
        echo "Không xem được";
        else {
            if(mysqli_num_rows($result) != 0)
            {
                echo "<a class='product' href='#'>";
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
                echo "</a>";
            }
        }
    }

    function getALLSanPham($conn){

        $rowPerPage = 12;
        if(!isset($_GET['page']))
        {
            $_GET['page'] = 1;
        }
        $offset = ($_GET['page']-1)* $rowPerPage;
        $query= "SELECT `ma_sp`,`ten_sp`,`gia`,`ten_dm`,`hinh_anh` FROM `san_pham` inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm";
        $result = mysqli_query($conn, $query);
        $numRow = mysqli_num_rows($result);

        $maxPage = ceil($numRow / $rowPerPage); 
        $query = "SELECT `ma_sp`,`ten_sp`,`gia`,`ten_dm`,`hinh_anh` FROM `san_pham` inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm LIMIT $offset, $rowPerPage";
        $result =  mysqli_query($conn, $query);
        if(!$result)
        echo "Không xem được";
        else {
            if(mysqli_num_rows($result) != 0)
            {
                echo "<a class='product' href='#'>";
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
                echo "</a>";


                echo "<div class='phanTrang'>";
                $firstPage = 1;
                echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$firstPage.">";
                echo "<img src='./assets/images/angle-double-left-solid.png' alt=''>";
                echo "</a>"; 
                $prePage = $_GET['page'] - 1;
                if($prePage === 0)
                {
                    $prePage = $maxPage;
                }
                echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$prePage."> < </a>";  
                for($i = 1; $i <= $maxPage; $i++ ){
                    if($i == $_GET['page'])
                    echo '<b> '.$i.' </b>';
                    else echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$i."> ".$i." </a>";
                }
                $nextPage = $_GET['page'] + 1;
                if($nextPage == $maxPage+1)
                {

                    $nextPage = 1;
                }
                echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$nextPage."> > </a>"; 
                $lastPage = $maxPage;
                echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$lastPage."> >> </a>";  
                echo "</div>";
            }
        }
    }
?>
