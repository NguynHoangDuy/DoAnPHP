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
    <?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quanly_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname) or die('Không thể kết nối' . mysqli_connect_error());
    mysqli_set_charset($conn, charset:'utf8');
        //phan trang
$rowsPerPage=5;
if ( ! isset($_GET['page']))
    $_GET['page'] = 1;
$offset =($_GET['page']-1)*$rowsPerPage;
//$query="Select * from sua LIMIT $offset, $rowsPerPage";
$query="SELECT sua.Ten_sua, hang_sua.Ten_hang_sua, loai_sua.Ten_loai , sua.Trong_luong, sua.Don_gia 
FROM sua CROSS JOIN hang_sua CROSS JOIN loai_sua WHERE sua.`Ma_hang_sua`=`hang_sua`.`Ma_hang_sua` and sua.`Ma_loai_sua`= loai_sua.`Ma_loai_sua` LIMIT $offset, $rowsPerPage;";
$result = mysqli_query($conn,$query);
if (!$result ) die ('<br> <b>Query failed</b>');
$numRows= mysqli_num_rows($result);
$maxPage = ceil($numRows / $rowsPerPage);
if($numRows<>0)
{
    echo "<p align='center'><font size='5' color='blue'> THÔNG TIN SỮA</font></p>";
    echo "<table align='center' width='100%' border='1' cellpadding='2' style='border-collapse'>";
    echo "<tr align='center' style='color:red'>
            <th>Tên Sữa</th>
            <th>Hãng Sữa</th>
            <th>Loại Sữa</th>                      
            <th>Trọng Lượng</th>
            <th>Đơn giá</th>	
        </tr>";
        $dem=1;
        while($rows=mysqli_fetch_array($result)){
            $dem++;
            if($dem%2==0){
                echo "<tr style='background-color: #FEE0C2'>";
            for ($i=0; $i < mysqli_num_fields($result); $i++)
            {
                echo "<td>".$rows[$i]."</td>";
            }
            echo "</tr>";  
            }

            else {
                echo "<tr>";
                for ($i=0; $i<mysqli_num_fields($result); $i++)
                {
                    echo "<td>".$rows[$i]."</td>";
                }
                echo "</tr>";
            }
        }
    $temp=$_GET['page']*$rowsPerPage;// danh so thu tu
    if($temp<=$rowsPerPage) $num=0;
    else $num=$temp-$rowsPerPage;
    while($rows=mysqli_fetch_array($result))
    {
        $num++;
        echo "<tr>";
            echo "<td>".$num."</td>";
            echo "<td>{$rows['Ten_sua']}</td>";
            echo "<td>{$rows['Ten_hang_sua']}</td>";
            echo "<td>{$rows['Ten_loai']}</td>";
            echo "<td>{$rows['Trong_luong']} gram</td>";
            echo "<td>{$rows['Don_gia'] } VNĐ</td>";
        echo "</tr>";
    }
    echo"</table> </div>";
    $re = mysqli_query($conn, 'select * from sua');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows/$rowsPerPage) + 1;
    echo "<div align='center'>";
    if ($_GET['page'] > 1){
        echo "<a  href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">Back</a> "; //gắn thêm nút Back
    }
    for ($i=1 ; $i<=$maxPage ; $i++)
    {
        if ($i == $_GET['page'])
        {
            echo '<b class="center">Trang'.$i.'</b> '; //trang hiện tại sẽ được bôi đậm
        }
        else {
            echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">Trang " . $i . "</a> ";
        }
    }
    if ($_GET['page'] < $maxPage) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">Next</a>";  //gắn thêm nút Next
    }
    echo"</div>";
//    echo 'Tong so trang la: '.$maxPage;
}
mysqli_close($conn);
?>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>