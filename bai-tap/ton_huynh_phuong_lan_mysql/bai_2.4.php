<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đọc thông tin bảng sữa</title>
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
include("../../block/header.php");
echo "<div class='container'>";
    //phan trang
    $rowsPerPage=5;
if ( ! isset($_GET['page']))
    $_GET['page'] = 1;
$offset =($_GET['page']-1)*$rowsPerPage;
    $conn= mysqli_connect("localhost", "root", "", "quanly_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
    $query= "SELECT Ma_sua, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia
            FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
            inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua LIMIT $offset, $rowsPerPage;";
    $result=mysqli_query($conn, $query);
    if (mysqli_num_rows($result) <>0)
    {
        echo "<h1 align='center' style='color: blue;'>THÔNG TIN CỦA SỮA</h1>";
        echo "<table align='center' border='1' cellpadding='2' width='100%' style='border-collapse: collpase'>";
        echo "<tr>
            <th style='border: 1px solid black'>STT</th>
            <th style='border: 1px solid black'>Tên sữa</th>
            <th style='border: 1px solid black'>Hãng sữa</th>
            <th style='border: 1px solid black'>Loại sữa</th>
            <th style='border: 1px solid black'>Trọng lượng</th>
            <th style='border: 1px solid black'>Đơn giá</th>
        </tr>";
        $temp=$_GET['page']*$rowsPerPage;// danh so thu tu
    if($temp<=$rowsPerPage) $dem=0;
    else $dem=$temp-$rowsPerPage;
        while ($rows=mysqli_fetch_array(($result))){
            $dem++;
            if($dem%2==0){
                echo "<tr style='background-color: #FEE0C1; color: #D15F89'>";
                echo "<td style='border: 1px solid black'>".$dem."</td>";
                echo "<td style='border: 1px solid black'>{$rows['Ten_sua']}</td>";
                echo "<td style='border: 1px solid black'>{$rows['Ten_hang_sua']}</td>";
                echo "<td style='border: 1px solid black'>{$rows['Ten_Loai']}</td>";
                echo "<td style='border: 1px solid black'>{$rows['Trong_luong']} gram</td>";
                echo "<td style='border: 1px solid black'>{$rows['Don_gia'] } VNĐ</td>";
                echo "</tr>";
            }
            else {
                echo "<tr>";
                echo "<td style='border: 1px solid black'>".$dem."</td>";
                echo "<td style='border: 1px solid black'>{$rows['Ten_sua']}</td>";
                echo "<td style='border: 1px solid black'>{$rows['Ten_hang_sua']}</td>";
                echo "<td style='border: 1px solid black'>{$rows['Ten_Loai']}</td>";
                echo "<td style='border: 1px solid black'>{$rows['Trong_luong']} gram</td>";
                echo "<td style='border: 1px solid black'>{$rows['Don_gia'] } VNĐ</td>";
                echo "</tr>";
            }
        }
        echo "</table>";
        $re = mysqli_query($conn, 'select * from sua');
    $numRows = mysqli_num_rows($re);
    $maxPage = floor($numRows/$rowsPerPage) + 1;
    echo "<div align='center'>";
    echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=1><< </a>";  
    if ($_GET['page'] > 1){
        echo "<a  href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">< </a> "; 
    }
    for ($i=1 ; $i<=$maxPage ; $i++)
    {
        if ($i == $_GET['page'])
        {
            echo '<b class="center">'.$i.'</b> ';
        }
        else {
            echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . "> " . $i . "</a> ";
        }
    }
    if ($_GET['page'] < $maxPage) {
        echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . "> > </a>";  
    }
    echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . $maxPage . "> >></a>";  
    echo"</div>";
}
mysqli_close($conn);
echo "</div>";
    include("../../block/footer.php")

?>
</body>
</html>