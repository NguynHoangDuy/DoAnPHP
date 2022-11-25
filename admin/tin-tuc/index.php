
<?php
function adminContent()
{
    include("../../block/connection.php");
    echo "<div class='container'>";
    $query = "SELECT `ma_tintuc`, `tieu_de`, `hinh_dd`, `tg_dang` FROM `tin_tuc`";
    $result =  mysqli_query($conn, $query);
    if($result)
    {
        if(mysqli_num_rows($result) != 0)
        {
            echo '<div class="blog">';
            while($row = mysqli_fetch_array($result))
            {
                echo "<a class='blog-item' href=''>";
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
    echo "</div>";
    
}
include("../../block/connection.php");
include("../../block/global.php");
include("../../block/admin-block.php");


?>