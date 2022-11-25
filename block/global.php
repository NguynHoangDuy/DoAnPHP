<?php
    function getSanPham($conn, $danhMuc){
        $query = "SELECT `ma_sp`,`ten_sp`,`gia`,`ten_dm`,`hinh_anh` FROM `san_pham` inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm WHERE `danh_muc` = '$danhMuc' LIMIT 1, 8";
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
                            <p class='product-name '>$row[ten_sp]</p>
                            <p class='product-price'> <span class='money'>$row[gia]</span> VNĐ</p>
                        </div>";
                    echo "</a>";
                }
                echo "</div>";  
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

                echo "<div class='phanTrang'>";
                $firstPage = 1;
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?page=".$firstPage.">";
                echo "<img src='./assets/images/angle-double-left-solid.png' alt=''>";
                echo "</a>"; 
                $prePage = $_GET['page'] - 1;
                if($prePage === 0)
                {
                    $prePage = $maxPage;
                }
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?page=".$prePage.">";
                echo "<img src='./assets/images/angle-left-solid.png' alt=''>";
                echo "</a>";
                for($i = 1; $i <= $maxPage; $i++ ){
                    if($i == $_GET['page'])
                    echo '<b> '.$i.' </b>';
                    else echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?page=".$i."> ".$i." </a>";
                }
                $nextPage = $_GET['page'] + 1;
                if($nextPage == $maxPage+1)
                {

                    $nextPage = 1;
                }
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?page=".$nextPage.">";
                echo "<img src='./assets/images/angle-right-solid.png' alt=''>";
                echo "</a>"; 
                $lastPage = $maxPage;
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?page=".$lastPage.">";
                echo "<img src='./assets/images/angle-double-right-solid.png' alt=''>";
                echo "</a>";  
                echo "</div>";
            }
        }
    }

    function getALLSanPhamDM($conn, $dm){

        $rowPerPage = 12;
        if(!isset($_GET['page']))
        {
            $_GET['page'] = 1;
        }
        $offset = ($_GET['page']-1)* $rowPerPage;
        $query= "SELECT `ma_sp`,`ten_sp`,`gia`,`ten_dm`,`hinh_anh` FROM `san_pham` inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm WHERE `danh_muc` = '$dm'";
        $result = mysqli_query($conn, $query);
        $numRow = mysqli_num_rows($result);

        $maxPage = ceil($numRow / $rowPerPage); 
        $query = "SELECT `ma_sp`,`ten_sp`,`gia`,`ten_dm`,`hinh_anh` FROM `san_pham` inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm WHERE `danh_muc` = '$dm' LIMIT $offset, $rowPerPage";
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
                

                echo "<div class='phanTrang'>";
                $firstPage = 1;
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".$firstPage.">";
                echo "<img src='./assets/images/angle-double-left-solid.png' alt=''>";
                echo "</a>"; 
                $prePage = $_GET['page'] - 1;
                if($prePage === 0)
                {
                    $prePage = $maxPage;
                }
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".$prePage.">";
                echo "<img src='./assets/images/angle-left-solid.png' alt=''>";
                echo "</a>";
                for($i = 1; $i <= $maxPage; $i++ ){
                    if($i == $_GET['page'])
                    echo '<b> '.$i.' </b>';
                    else echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".$i."> ".$i." </a>";
                }
                $nextPage = $_GET['page'] + 1;
                if($nextPage == $maxPage+1)
                {

                    $nextPage = 1;
                }
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."dm=".$dm."&loc=&page=".$nextPage.">";
                echo "<img src='./assets/images/angle-right-solid.png' alt=''>";
                echo "</a>"; 
                $lastPage = $maxPage;
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."dm=".$dm."&loc=&page=".$lastPage.">";
                echo "<img src='./assets/images/angle-double-right-solid.png' alt=''>";
                echo "</a>";  
                echo "</div>";
            }
        }
    }
    function getTinTuc($conn){
        $query = "SELECT `ma_tintuc`, `tieu_de`, `hinh_dd`, `tg_dang` FROM `tin_tuc` order by RAND() LIMIT 0, 3";
        $result =  mysqli_query($conn, $query);
        if($result)
        {
            if(mysqli_num_rows($result) != 0)
            {
                echo '<div class="blog">';
                while($row = mysqli_fetch_array($result))
                {
                    echo "<a class='blog-item' href='./tin-tuc.php?id=$row[ma_tintuc]'>";
                    $src = "$row[hinh_dd]";
                        echo "<div class='blog-img'>
                        <img src='".$src."'>
                            </div>";
                        echo "<div class='blog-content'>
                            <p class='blog-title'>$row[tieu_de]</p>
                            <p class='blog-date'>$row[tg_dang]</p>
                        </div>";
                    echo "</a>";
                }
                echo "</div>";  
            }
        }
    }

    function getAllTinTuc($conn)
    {
        $query = "SELECT `ma_tintuc`, `tieu_de`, `hinh_dd`, `tg_dang` FROM `tin_tuc`";
        $result =  mysqli_query($conn, $query);
        if($result)
        {
            if(mysqli_num_rows($result) != 0)
            {
                echo '<div class="blog">';
                while($row = mysqli_fetch_array($result))
                {
                    echo "<a class='blog-item' href='./tin-tuc.php?id=$row[ma_tintuc]'>";
                    $src = "$row[hinh_dd]";
                        echo "<div class='blog-img'>
                        <img src='".$src."'>
                            </div>";
                        echo "<div class='blog-content'>
                            <p class='blog-title'>$row[tieu_de]</p>
                            <p class='blog-date'>$row[tg_dang]</p>
                        </div>";
                    echo "</a>";
                }
                echo "</div>";  
            }
        }
    }
?>

