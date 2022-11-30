<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List sản phẩm</title>
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
    $conn= mysqli_connect("localhost", "root", "", "quanly_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
    mysqli_set_charset($conn, charset:'utf8');
    $query= "SELECT Ma_sua, Ten_sua, Trong_luong, Don_gia, Hinh
    FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
    inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
    $result=mysqli_query($conn, $query);
    if (mysqli_num_rows($result) <>0)
    {
        echo "<table align='center' border='1' cellpadding='2' width='50%' style='margin: 0 auto'>";
        echo "<tr style='background-color: #FFEEE6; color: orange'>
           <td style='border: 1px solid black' colspan='5' align='center'><h1 style='margin-top: 14px'>THÔNG TIN SẢN PHẨM</h1></td>
               </tr>";
   $dem=0;
    while ($rows=mysqli_fetch_array(($result))){
       if ($dem==0 || $dem >=5){
           echo "<tr>";
       }
       $dem++;
       if ($dem >= 5) $dem=0;
       $id=$rows["Ma_sua"];
       echo "<td style='border: 1px solid black' align='center'>
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