<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List sản phẩm</title>
</head>
<body>
    <?php
    
    $conn= mysqli_connect("localhost", "root", "", "ql_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
    mysqli_set_charset($conn, charset:'utf8');
    $query= "SELECT Ma_sua, Ten_sua, Trong_luong, Don_gia, Hinh
    FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
    inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
    $result=mysqli_query($conn, $query);
    if (mysqli_num_rows($result) <>0)
    {
        echo "<table align='center' border='1' cellpadding='2' width='50%' style='border-collapse: collpase'>";
        echo "<tr style='background-color: #FFEEE6; color: orange'>
           <td colspan='5' align='center'>THÔNG TIN CÁC SẢN PHẨM</td>
               </tr>";
   $dem=0;
    while ($rows=mysqli_fetch_array(($result))){
       if ($dem==0 || $dem >=5){
           echo "<tr>";
       }
       $dem++;
       if ($dem >= 5) $dem=0;
       $id=$rows["Ma_sua"];
       echo "<td align='center'>
       <a href='./bai_7_list_chi_tiet.php?id=".$id."'>
       <p style='font-weight: bold'>".$rows['Ten_sua']."</p></a>
       <p>".$rows['Trong_luong']." gr - ".$rows['Don_gia']." VNĐ</p>
       <img src='./img/".$rows["Hinh"]."' style='display: block; margin: 0 auto; width: 200px; height: 200px'>
       </td>";
       if ($dem==0){
           echo "</tr>";
       }
           }
        echo "</table>";
}
mysqli_close($conn);
    ?>
</body>
</html>