<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyên liệu trà sữa</title>
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
        include("./block/header.php");
        echo "<div class='container'>";
        if (isset($_GET["timKiem"])){
            $search=$_GET["search"];
            $rowPerPage = 12;
                if(!isset($_GET['page']))
                    {
                        $_GET['page'] = 1;
                    }
            $offset = ($_GET['page']-1)* $rowPerPage;
            if (!empty($search)){
                $query= "SELECT ma_sp,ten_sp,ten_dm,gia,hinh_anh FROM `san_pham` 
                inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm
                WHERE ten_sp LIKE '%$search%'";
                $resultSearch =  mysqli_query($conn, $query);
                $numRowSearch=mysqli_num_rows($resultSearch);
                $maxPage = ceil($numRowSearch / $rowPerPage); 

                $query = "SELECT ma_sp,ten_sp,ten_dm,gia,hinh_anh FROM `san_pham` 
                inner join danh_muc on san_pham.danh_muc = danh_muc.ma_dm
                WHERE ten_sp LIKE '%$search%'
                LIMIT $offset, $rowPerPage";
                $resultSearch =  mysqli_query($conn, $query);
                if ($resultSearch){
                    if ($numRowSearch> 0 && $search!=""){
                        echo "<p style='font-size: 18px; padding: 0 0px 20px'>Tìm thấy ";
                        echo "<span style='font-weight: bold'>$numRowSearch</span>";
                        echo " kết quả với từ khóa ";
                        echo "<span style='font-weight: bold'>$search</span>";
                        echo "</p>";
                        if (!mysqli_num_rows($resultSearch)==0){
                            echo '<div class="product">';
                            while($row = mysqli_fetch_assoc($resultSearch))
                            {
                        echo "<a class='product-item' href='./chi-tiet-san-pham.php?id=$row[ma_sp]'>";
                        $src = "./assets/images/$row[hinh_anh]";
                            echo "<div class='product-img'>
                            <img src='".$src."'>
                                </div>";
                            echo "<div class='product-content'>
                            <p class='product-dm'>$row[ten_dm]</p>
                                <p class='product-name'>$row[ten_sp]</p>
                                <p class='product-price'> <span class='money'>$row[gia]</span> VNĐ</p>
                            </div>";
                        echo "</a>";
                    }
                    echo "</div>";
                    echo "<div class='phanTrang'>";
                $firstPage = 1;
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?search=".$search."&timKiem="."?page=".$firstPage.">";
                echo "<img src='./assets/images/angle-double-left-solid.png' alt=''>";
                echo "</a>"; 
                $prePage = $_GET['page'] - 1;
                if($prePage === 0)
                {
                    $prePage = $maxPage;
                }
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?search=".$search."&timKiem="."?page=".$prePage.">";
                echo "<img src='./assets/images/angle-left-solid.png' alt=''>";
                echo "</a>";
                for($i = 1; $i <= $maxPage; $i++ ){
                    if($i == $_GET['page'])
                    echo '<b> '.$i.' </b>';
                    else echo "<a class='link-text' href=".$_SERVER ['PHP_SELF']."?search=".$search."&timKiem="."&page=".$i."> ".$i." </a>";
                }
                $nextPage = $_GET['page'] + 1;
                if($nextPage == $maxPage+1)
                {

                    $nextPage = 1;
                }
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?search=".$search."&timKiem="."&page=".$nextPage.">";
                echo "<img src='./assets/images/angle-right-solid.png' alt=''>";
                echo "</a>"; 
                $lastPage = $maxPage;
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?search=".$search."&timKiem="."&page=".$lastPage.">";
                echo "<img src='./assets/images/angle-double-right-solid.png' alt=''>";
                echo "</a>";  
                echo "</div>";
                        }
                    }
                }
                else {
                    echo "Không xem được";
                }
            }
        }
    echo "</div>";
    ?>
    <?php
        include("./block/footer.php");
    ?>
</body>
</html>