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
        include("../../block/header.php");
    ?>
    <style>
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
    </style>
    <?php
        include("./connection.php");
        if(!$conn){
            die("Connection failed: ". mysqli_connect_error());
        }
        else {
            $rowPerPage = 7;
            if(!isset($_GET['page']))
            {
                $_GET['page'] = 1;
            }

            $offset = ($_GET['page']-1)* $rowPerPage;
            $query= "SELECT Ma_sua, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia
            FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
            inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
            $result = mysqli_query($conn, $query);
            $numRow = mysqli_num_rows($result);
            $query= "SELECT Ma_sua, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia
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
                        <th>Số TT</th>
                        <th>Tên sữa</th>
                        <th>Hãng sữa</th>
                        <th>Loại sữa</th>
                        <th>Trọng lượng</th>
                        <th>Đơn giá</th>
                    </tr>";
                    $dem = 1;
                    $temp = 1;
                    while($row = mysqli_fetch_array($result))
                    {
                        if($dem % 2 != 0)
                        {   
                             echo "<tr style='background-color: #FEE0C1;'>";
                            for($i = 0; $i < mysqli_num_fields($result); $i++)
                            {
                                if($row['Don_gia'] == $row[$i])
                                echo "<td style='padding: 20px;' >".$row[$i]." VNĐ"."</td>";   
                                else if($row['0'] == $row[$i]){
                                    $soTT = ($rowPerPage * $_GET['page']) - ($rowPerPage - $temp);
                                    echo "<td style='padding: 20px;' >".$soTT."</td>";
                                }
                                else echo "<td style='padding: 20px;' >".$row[$i]."</td>";
                            }
                            echo "</tr>";
                        }
                            else{
                                echo "<tr>";
                            for($i = 0; $i < mysqli_num_fields($result); $i++)
                            {
                                if($row['Don_gia'] == $row[$i])
                                echo "<td style='padding: 20px;' >".$row[$i]." VNĐ"."</td>";   
                                else if($row['0'] == $row[$i]){
                                    $soTT = ($rowPerPage * $_GET['page']) - ($rowPerPage - $temp);
                                    echo "<td style='padding: 20px;' >".$soTT."</td>";
                                }
                                else echo "<td style='padding: 20px;' >".$row[$i]."</td>";
                                
                            }
                            echo "</tr>";
                            }
                            $dem++;
                            $temp++;
                    }
                    echo " </table>";  
                }                    
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



