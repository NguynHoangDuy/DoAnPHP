<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bt2.2</title>
</head>
<body>
<?php
    $severname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qly_ban_sua";
    $conn = mysqli_connect($severname, $username, $password, $dbname) or die('Không thể kết nối' . mysqli_connect_error());
    mysqli_set_charset($conn, charset:'utf8');
    $query="SELECT * FROM khach_hang";
    $result=mysqli_query($conn, $query);
    if (mysqli_num_rows($result) <>0)
    {
        echo "<h2 align='center' style='color: blue;'>THÔNG TIN KHÁCH HÀNG</h2>";
        echo "<table align='center' border='1' cellpadding='2' width='100%' style='border-collapse: collpase'>";
        echo "<tr>
            <th>Mã KH</th>
            <th>Tên khách hàng</th>
            <th>Giới tính</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
        </tr>";
        $dem = 1;
        while ($rows=mysqli_fetch_array(($result))){
            $dem++;
            if($dem%2==0){
                echo "<tr style='background-color: #FEe0C1'>";
            for($i=0; $i < mysqli_num_fields($result);$i++)
            {
                echo "<td>".$rows[$i]."</td>";
            }
            echo "</td>";
            }
            else {
                
            echo "<tr>";
            for ($i=0; $i < mysqli_num_fields($result);$i++)
            {
                echo "<td>" .$rows[$i]. "</td>";
            }
            echo "</tr>";
        }
        }
        echo "</table>";
    }
    ?>
</body>
</html>