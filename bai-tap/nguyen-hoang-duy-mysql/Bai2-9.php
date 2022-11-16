<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
        td {
        max-width: 800px;
    }
    p{
        margin: 5px 0;
        font-weight: 700;
    }
    span{
        font-weight: 100;
    }
        a,b {
        text-decoration: none;
        color: black;
        font-size: 20px;
        cursor: pointer;
        }
        .phanTrang {
            gap: 20px;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }    

        .img-product {
            box-sizing: border-box;
            padding: 20px;
        }

        td {
            text-align: left;
            padding: 10px;
        }
        p > b{
            font-size: 16px;
        }
    </style>
    <?php
    include("./connection.php");
    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
    else {
        $rowPerPage = 2;
        if(!isset($_GET['page']))
        {
            $_GET['page'] = 1;
        }

        $offset = ($_GET['page']-1)* $rowPerPage;
        $query = "SELECT   Ma_sua, Hinh, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich
            FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
            inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua ";
        $result = mysqli_query($conn, $query);
        $numRow = mysqli_num_rows($result);
        $query = "SELECT   Ma_sua, Hinh, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich
            FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
            inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
        LIMIT $offset, $rowPerPage";
        $result = mysqli_query($conn, $query);
        $maxPage = ceil($numRow / $rowPerPage); 
    
    }
    if(isset($_GET['submit']))
    {
        $search = $_GET['search'];
        if($search != '')
        {
            include("./connection.php");
                if(!$conn){
                    die("Connection failed: ". mysqli_connect_error());
                }
                else {
                    $rowPerPage = 2;
                    if(!isset($_GET['page']))
                    {
                        $_GET['page'] = 1;
                    }

                    $offset = ($_GET['page']-1)* $rowPerPage;
                    $query = "SELECT   Ma_sua, Hinh, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich
                        FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
                        inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
                        WHERE Ten_sua LIKE '%$search%'";
                    $result = mysqli_query($conn, $query);
                    $numRow = mysqli_num_rows($result);
                    $query = "SELECT   Ma_sua, Hinh, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich
                        FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
                        inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
                        WHERE Ten_sua LIKE '%$search%'
                    LIMIT $offset, $rowPerPage";
                    $result = mysqli_query($conn, $query);
                    $maxPage = ceil($numRow / $rowPerPage); }
    }
    }
    ?>
    <form action="" method="get">
        <table border='1' align='center' style='border-collapse: collapse; text-align: center;'>
            <tr style='color: #AA1C6C;''>
                <th colspan='5'>Tìm kiếm thông tin sữa</th>
            </tr>
            <tr >
                <td colspan='5' style='text-align: center;'>
                        Tên sữa: <input type='text' name='search' value='<?php if(isset($search)) echo $search; else echo "";?>'>
                        <button type='submit' name='submit'>Tìm kiếm</button>
                </td>
            </tr>
            <tr>
                <?php
                    if(isset($_GET['submit']) && $search != '')
                    if($numRow === 0)
                     echo "<td style='text-align: center; color: red;'>Không tìm thấy sản phẩm nào hết</td>";
                    else echo "<td style='text-align: center; color: red;'>Có $numRow sản phẩm được tìm thấy</td>";
                ?>
            </tr>
            <tr>
                <td>
                <?php
                    if(!$result)
                        echo "Không xem được";
                    else {
                        if(mysqli_num_rows($result) != 0)
                        {
                            echo "
                            <table border='1' align='center' style='border-collapse: collapse; text-align: center;'>";
                            $dem = 0;
                            while($row = mysqli_fetch_array($result))
                            {
                                echo "<tr style='background-color: #FFEEE6;'> <td colspan='2' style ='text-align: center; font-size: 28px; color: #F25015; font-weight: 700;'>".$row['Ten_sua']." - ".$row['Ten_hang_sua']."</td></tr>";
                                $src = "./images/".$row['Hinh'];
                                echo "<tr> 
                                    <td><img width='150px' height='150px' src='".$src."' alt='' class='img-product'></td>
                                    <td>
                                        <p>Thành phần dinh dưỡng<p>
                                        <span>".$row['TP_Dinh_Duong']."</span>
                                        <p>Lợi ích<p>
                                        <span>".$row['Loi_ich']."</span>
                                        <p><b>Trọng lượng:</b> <span style='color: red;'>".$row['Trong_luong']." gr - </span><b>Đơn giá :</b><span style='color: red;'> ".$row['Don_gia']." VNĐ </span></p>
                                    </td>
                                </tr>";
                            }
                            echo " </table>";  
                        }                    
                    }
              ?>
                </td>
            </tr>
        </table>
    </form>

    <?php
        echo "<div class='phanTrang'>";
        $firstPage = 1;
        $prePage = $_GET['page'] - 1;
        if($prePage === 0)
        {
            $prePage = $maxPage;
        }
        if(!isset($_GET['search']))
        {
            echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$firstPage."> << </a>"; 
            echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$prePage."> < </a>"; 
        } 
        else {
            echo "<a href=".$_SERVER ['PHP_SELF']."?search=".$search."&submit=&page=".$firstPage."> << </a>";   
            echo "<a href=".$_SERVER ['PHP_SELF']."?search=".$search."&submit=&page=".$prePage."> < </a>";   
        }
        for($i = 1; $i <= $maxPage; $i++ ){
            if($i == $_GET['page'])
            echo '<b> '.$i.' </b>';
            else if(!isset($_GET['search']))
            {
                echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$i."> ".$i." </a>";
            } 
            else echo "<a href=".$_SERVER ['PHP_SELF']."?search=".$search."&submit=&page=".$i."> ".$i." </a>";   
        }

        
        $nextPage = $_GET['page'] + 1;
        if($nextPage == $maxPage+1)
        {

            $nextPage = 1;
        }
        $lastPage = $maxPage;
        if(!isset($_GET['search']))
        {
            echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$nextPage."> > </a>"; 
            echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$lastPage."> >> </a>";  
        } 
        else {
            echo "<a href=".$_SERVER ['PHP_SELF']."?search=".$search."&submit=&page=".$nextPage."> > </a>";   
            echo "<a href=".$_SERVER ['PHP_SELF']."?search=".$search."&submit=&page=".$lastPage."> >> </a>"; 
        }
        echo "</div>";
    ?>

</body>
</html>


