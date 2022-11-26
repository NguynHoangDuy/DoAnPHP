
<?php
function adminContent()
{
    include("../../block/connection.php");
    echo "<div class='container'>
    <h3 class='admin-product--title size-title'>Tin Tức</h3>
    <div class='comand--btn'>
    <button name='add'>Thêm tin tức mới</button>
    </div>";
    
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
                    echo "<a class='blog-item' href='./edit.php?id=$row[ma_tintuc]'>";
                    $src = "../../assets/images/$row[hinh_dd]";
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
    echo "</div>";
    
}
include("../../block/connection.php");
include("../../block/global.php");
include("../../block/admin-block.php");


?>