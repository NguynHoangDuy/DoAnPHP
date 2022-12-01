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
                if($maxPage != 1)
                {
                    echo "<div class='phanTrang'>";
                    if($maxPage > 4)
                    {
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
                    }
                    if($maxPage > 4)
                    {
                        if($_GET['page'] == 1)
                        {
                            $i = $_GET['page'];
                            echo '<b> '.$i.' </b>';
                            echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?page=".++$i."> ".$i." </a>";
                            echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?page=".++$i."> ".$i." </a>";
                            echo "<span class='page-dot'>...</span>";
                            echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?page=".$maxPage."> ".$maxPage." </a>";
                        }
                        else {
                            if($_GET['page'] == $maxPage)
                            {
                                echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?page=1>1</a>";
                                $i = $_GET['page']-3;
                                echo "<span class='page-dot'>...</span>";
                                echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?page=".++$i."> ".$i." </a>";
                                echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?page=".++$i."> ".$i." </a>";
                                echo '<b> '.$maxPage.' </b>';
                            }
                            else {
                                if($_GET['page'] > 2)
                                {
                                    echo "<span class='page-dot'>...</span>";
                                }
                                for($i = $_GET['page']-1; $i <= $_GET['page']+1; $i++ ){
                                    
                                    if($i == $_GET['page'])
                                    echo '<b> '.$i.' </b>';
                                    else echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?page=".$i."> ".$i." </a>";
                                }
                                if($_GET['page'] < $maxPage - 1)
                                {
                                    echo "<span class='page-dot'>...</span>";
                                }
                            }
                        }
                    }
                    else {
                        for($i = 1; $i <= $maxPage; $i++ ){
                            if($i == $_GET['page'])
                            echo '<b> '.$i.' </b>';
                            else echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?page=".$i."> ".$i." </a>";
                        }
                    }
                    if($maxPage > 4)
                    {
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
                    }
                        
                    echo "</div>";
                }
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
                
                if($maxPage != 1)
                {
                    echo "<div class='phanTrang'>";
                    if($maxPage > 4)
                    {
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
                    }
                    if($maxPage > 4)
                    {
                        if($_GET['page'] == 1)
                        {
                            $i = $_GET['page'];
                            echo '<b> '.$i.' </b>';
                            echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".++$i."> ".$i." </a>";
                            echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".++$i."> ".$i." </a>";
                            echo "<span class='page-dot'>...</span>";
                            echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".$maxPage."> ".$maxPage." </a>";
                        }
                        else {
                            if($_GET['page'] == $maxPage)
                            {
                                echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=1>1</a>";
                                $i = $_GET['page']-3;
                                echo "<span class='page-dot'>...</span>";
                                echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".++$i."> ".$i." </a>";
                                echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".++$i."> ".$i." </a>";
                                echo '<b> '.$maxPage.' </b>';
                            }
                            else {
                                if($_GET['page'] > 2)
                                {
                                    echo "<span class='page-dot'>...</span>";
                                }
                                for($i = $_GET['page']-1; $i <= $_GET['page']+1; $i++ ){
                                    
                                    if($i == $_GET['page'])
                                    echo '<b> '.$i.' </b>';
                                    else echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".$i."> ".$i." </a>";
                                }
                                if($_GET['page'] < $maxPage - 1)
                                {
                                    echo "<span class='page-dot'>...</span>";
                                }
                            }
                        }
                    }
                    else {
                        for($i = 1; $i <= $maxPage; $i++ ){
                            if($i == $_GET['page'])
                            echo '<b> '.$i.' </b>';
                            else echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".$i."> ".$i." </a>";
                        }
                    }
                    
                    if($maxPage > 4)
                    {
                        $nextPage = $_GET['page'] + 1;
                        if($nextPage == $maxPage+1)
                        {

                            $nextPage = 1;
                        }
                        echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".$nextPage.">";
                        echo "<img src='./assets/images/angle-right-solid.png' alt=''>";
                        echo "</a>"; 
                        $lastPage = $maxPage;
                        echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?dm=".$dm."&loc=&page=".$lastPage.">";
                        echo "<img src='./assets/images/angle-double-right-solid.png' alt=''>";
                        echo "</a>";  
                    }
                        
                    echo "</div>";
                }  
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
                    $src = "./assets/images/$row[hinh_dd]";
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
        $none = false;
        $rowPerPage = 6;
        if(!isset($_GET['page']))
        {
            $_GET['page'] = 1;
        }
        $offset = ($_GET['page']-1)* $rowPerPage;
        $query = "SELECT `ma_tintuc`, `tieu_de`, `hinh_dd`, `tg_dang` FROM `tin_tuc`";
        $result = mysqli_query($conn, $query);
        $numRow = mysqli_num_rows($result);
        if($numRow == $rowPerPage)
        {
            $none = true;
        }

        $maxPage = ceil($numRow / $rowPerPage); 

        $query= "SELECT `ma_tintuc`, `tieu_de`, `hinh_dd`, `tg_dang` FROM `tin_tuc` LIMIT $offset, $rowPerPage";
        $result =  mysqli_query($conn, $query);
        if($result)
        {
            if(mysqli_num_rows($result) != 0)
            {
                echo '<div class="blog">';
                while($row = mysqli_fetch_array($result))
                {
                    echo "<a class='blog-item' href='./tin-tuc.php?id=$row[ma_tintuc]'>";
                    $src = "./assets/images/$row[hinh_dd]";
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
        if($none != true)
        {
            echo "<div class='news-control'>";
            if($_GET['page'] == 1)
            {
                echo "<a href='".$_SERVER ['PHP_SELF']."?page=1' class='news-btn' >
                <i class='fa-solid fa-angle-left'></i> </a>";
            }
            else {
                $prePage = $_GET['page'] - 1;
                echo "<a href='".$_SERVER ['PHP_SELF']."?page=".$prePage."' class='news-btn' >
                <i class='fa-solid fa-angle-left'></i> </a>";
            }
            if($_GET['page'] == $maxPage)
            {
                echo "<a href='".$_SERVER ['PHP_SELF']."?page=".$maxPage."' class='news-btn' >
                <i class='fa-solid fa-angle-right'></i> </a>";
            }
            else {
                
                $nextPage = $_GET['page'] + 1;
                echo "<a href='".$_SERVER ['PHP_SELF']."?page=".$nextPage."' class='news-btn' >
                <i class='fa-solid fa-angle-right'></i> </a>";
            }
            echo "</div>";
        }

       
    }

    function product_hot($conn){
        echo '<div class="product-hot">
            <p class="product-hot-title">Sản phẩm đề xuất</p>';
                $query = "SELECT `ma_sp`,`ten_sp`,`gia`,`ten_dm`,`hinh_anh` FROM `san_pham` inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm ORDER BY RAND () LIMIT 1, 4";
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