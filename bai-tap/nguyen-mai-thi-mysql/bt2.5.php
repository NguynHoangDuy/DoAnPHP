<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Nguyên Liệu Trà Sữa</title>
	<link rel="stylesheet" href="../../assets/css/main.css"/>
    <link rel="icon" type="image/x-icon" href="../../assets/images/blue_tea_logo.webp">
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include("../../block/connection.php");
        // include("../block/global.php");
        include("../../block/header-2.php");
    ?>
    <style>
        a,b {
            text-decoration: none;
            color: black;
            font-size:20px;
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
        </style>
        <?php
        $severname = "localhost";
        $username = "root";
        $password = "";
        $dbname = "quanly_ban_sua";
        $conn = mysqli_connect($severname, $username, $password, $dbname) or die('Không thể kết nối' . mysqli_connect_error());
        mysqli_set_charset($conn, charset:'utf8');
        $query="SELECT * FROM khach_hang";
        $result=mysqli_query($conn, $query);
        $rowPerPage = 5;
            if(!isset($_GET['page']))
            {
                $_GET['page'] = 1;
            }
        $offset = ($_GET['page']-1)* $rowPerPage;
        $query= "SELECT Hinh, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia
        FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
        inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
        $result = mysqli_query($conn, $query);
        $numRow = mysqli_num_rows($result);
        $query= "SELECT   Hinh, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia
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
                    <th colspan='2'>Thông tin sản phẩm</th>
                </tr>";
                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    $src = "./Hinh_sua/".$row[0];
                    echo "<td> <img width='150px' height='150px' src='".$src."' alt='' class='img-product'></td>";
                    echo "<td>
                        <h3>".$row['Ten_sua']."</h3>
                        <p> Nhà sản xuất".$row['Ten_hang_sua']."</p>
                        <span>".$row['Ten_Loai']." - ".$row['Trong_luong']." gr - ".$row['Don_gia']." VNĐ</span>
                    </td>";
                    echo "</tr>";
                }
                echo " </table>";  
            }                    
            echo "<div class='phanTrang'>";
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
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>