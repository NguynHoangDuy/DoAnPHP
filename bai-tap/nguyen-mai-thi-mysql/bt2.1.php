<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bt2.1</title>
</head>
<body>
<?php
    $conn= mysqli_connect("localhost", "root", "", "qly_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
    mysqli_set_charset($conn, charset:'utf8');
    $query="SELECT * FROM hang_sua";
    $result=mysqli_query($conn, $query);
    if (mysqli_num_rows($result) <>0)
    {
        echo "<h2 align='center' style='color: blue;'>THÔNG TIN HÃNG SỮA</h2>";
        echo "<table align='center' border='1' cellpadding='2' width='100%' style='border-collapse: collpase'>";
        echo "<tr>
            <th>Mã HS</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Email</th>
        </tr>";
        while ($rows=mysqli_fetch_array(($result))){
            echo "<tr>";
            for ($i=0; $i < mysqli_num_fields($result);$i++)
            {
                echo "<td>" .$rows[$i]. "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
?>
</body>
</html>