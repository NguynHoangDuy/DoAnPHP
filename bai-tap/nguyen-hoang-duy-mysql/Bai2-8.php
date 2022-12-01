<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nguyên Liệu Trà Sữa</title>
    <link rel="stylesheet" href="../../assets/css/main.css" />
    <link rel="icon" type="image/x-icon" href="../../assets/images/blue_tea_logo.webp">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <?php
        include("../../block/connection.php");
        // include("../block/global.php");
        include("../../block/header.php");
    ?>
    <style>
    td {
        max-width: 800px;
    }

    p {
        margin: 5px 0;
        font-weight: 700;
    }

    span {
        font-weight: 100;
    }

    a,
    b {
        text-decoration: none;
        color: black;
        font-size: 20px;
        cursor: pointer;
    }

    .phantrang {
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

    p>b {
        font-size: 16px;
    }
    </style>
    <style>
    td,
    th {
        padding: 10px;
        border: 1px solid grey;
    }

    table {
        max-width: 800px;
        margin: 0 auto;
    }
    </style>
    <div class="container">

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
            if(!$result)
            echo "Không xem được";
            else {
                if(mysqli_num_rows($result) != 0)
                {
                    echo "
                    <table border='1' align='center' style='border-collapse: collapse; text-align: center;'>
                    <tr style='color: #AA1C6C;''>
                    <th colspan='5'>Thông tin chi tiết các loại sữa</th>
                    </tr>";
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
            echo "<div class='phantrang'>";
            $firstPage = 1;
            echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$firstPage."> << </a>"; 
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
        ?>
    </div>
    <?php
        include("../../block/footer.php");
        ?>
</body>

</html>