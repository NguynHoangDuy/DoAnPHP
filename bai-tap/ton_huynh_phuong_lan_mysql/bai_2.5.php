<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>
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
 $rowsPerPage=5;
 if ( ! isset($_GET['page']))
     $_GET['page'] = 1;
 $offset =($_GET['page']-1)*$rowsPerPage;
     $conn= mysqli_connect("localhost", "root", "", "quanly_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
     mysqli_set_charset($conn, charset:'utf8');
     $query= "SELECT Ma_sua, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia, Hinh
     FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
     inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua LIMIT $offset, $rowsPerPage;";
     $result=mysqli_query($conn, $query);
     if (mysqli_num_rows($result) <>0)
     {
         echo "<table align='center' border='1' cellpadding='2' width='50%' style='margin: 0 auto'>";
         echo "<tr style='background-color: #FFEEE6; color: orange'>
            <td colspan='2' align='center' style='vertical-align: middle!important;border: 1px solid black'><h1 style='margin-top: 14px'>THÔNG TIN SẢN PHẨM</h1></td>
                </tr>";
         $temp=$_GET['page']*$rowsPerPage;// danh so thu tu
     if($temp<=$rowsPerPage) $dem=0;
     else $dem=$temp-$rowsPerPage;
         while ($rows=mysqli_fetch_array(($result))){
            echo "<tr>";
            echo "<td style='border: 1px solid black; vertical-align:middle'> <img src='./img/".$rows["Hinh"]."' style='display: block; margin: 0 auto;'</td>";
            echo "<td style='border: 1px solid black; vertical-align:middle'>";
            echo "<p style='font-weight: bold'>".$rows['Ten_sua']."</p>";
            echo "<p> Nhà sản xuất: ".$rows['Ten_hang_sua']."</p>";
            echo "<p>".$rows['Ten_Loai']." - ".$rows['Trong_luong']." gr - ".$rows['Don_gia']." VNĐ</p>";
            echo "</td>";
            echo "</tr>";
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