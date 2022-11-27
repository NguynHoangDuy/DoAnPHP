<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem chi tiết</title>
</head>
<body>
    <?php
    $id=$_GET['id'];
    if (isset($id)){
        $conn= mysqli_connect("localhost", "root", "", "ql_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
        mysqli_set_charset($conn, charset:'utf8');
        $query= "SELECT Ma_sua, Ten_sua,Ten_hang_sua, Trong_luong, Don_gia, Hinh, TP_Dinh_Duong, Loi_ich
        FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua  where Ma_sua='$id'";
        $result=mysqli_query($conn, $query);
        $row=mysqli_fetch_array($result);
        if (mysqli_num_rows($result) <>0){
            echo "<table align='center' border='1' cellpadding='2' width='50%' style='border-collapse: collpase;'>";
            echo "<tr style='background-color: #FFEEE6; color: orange'>
            <td colspan='2' align='center' style='font-size: 20px'>".$row['Ten_sua']." - ".$row['Ten_hang_sua']."</td>
                </tr>";
                echo "<td> <img src='./img/".$row["Hinh"]."' style='display: block; margin: 0 auto;'</td>";
                echo "<td>";
                echo "<p style='font-style: italic; font-weight: bold'> Thành phần dinh dưỡng</p>"
                    .$row['TP_Dinh_Duong'];
                echo "<p style='font-style: italic; font-weight: bold'> Lợi ích</p>"
                    .$row['Loi_ich'];
                echo "<p align='right'><strong style='font-style: italic'>Trọng lượng: </strong>".$row['Trong_luong']." gr - <strong style='font-style: italic'>Đơn giá: </strong>"
                .$row['Don_gia']." VNĐ";
            echo "</tr>";
            echo "<tr>";
            echo "<td> <a href='./bai_7_list.php'>Quay lại</a></td>";
            echo "</tr>";
        echo "</table>";
        }
        
    }
    ?>
</body>
</html>