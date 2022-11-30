<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiết</title>
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
    $id=$_GET['id'];
    if (isset($id)){
        $conn= mysqli_connect("localhost", "root", "", "quanly_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
        mysqli_set_charset($conn, charset:'utf8');
        $query= "SELECT Ma_sua, Ten_sua,Ten_hang_sua, Trong_luong, Don_gia, Hinh, TP_Dinh_Duong, Loi_ich
        FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua  where Ma_sua='$id'";
        $result=mysqli_query($conn, $query);
        $row=mysqli_fetch_array($result);
        if (mysqli_num_rows($result) <>0){
            echo "<table align='center' border='1' cellpadding='2' width='50%' style='margin: 0 auto;'>";
            echo "<tr style='background-color: #FFEEE6; color: orange'>
            <td style='border: 1px solid black' colspan='2' align='center' style='font-size: 20px'>".$row['Ten_sua']." - ".$row['Ten_hang_sua']."</td>
                </tr>";
                echo "<td style='border: 1px solid black'> <img src='./img/".$row["Hinh"]."' style='display: block; margin: 0 auto;'</td>";
                echo "<td style='border: 1px solid black; vertical-align: middle'>";
                echo "<p style='font-style: italic; font-weight: bold'> Thành phần dinh dưỡng</p>"
                    .$row['TP_Dinh_Duong'];
                echo "<p style='font-style: italic; font-weight: bold'> Lợi ích</p>"
                    .$row['Loi_ich'];
                echo "<p align='right'><strong style='font-style: italic'>Trọng lượng: </strong>".$row['Trong_luong']." gr - <strong style='font-style: italic'>Đơn giá: </strong>"
                .$row['Don_gia']." VNĐ";
            echo "</tr>";
            echo "<tr style='border: 1px solid black'>";
            echo "<td style='border: 1px solid black'> <a href='./bai_7_list.php'>Quay lại</a></td>";
            echo "</tr>";
        echo "</table>";
        }
        
    }
    echo "</div>";
    include("../../block/footer.php")
    ?>
</body>
</html>