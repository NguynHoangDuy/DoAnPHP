<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xuất thông tin khách hàng</title>
    <link rel="stylesheet" href="../../assets/css/main.css"/>
    <link rel="icon" type="image/x-icon" href="../../assets/images/blue_tea_logo.webp">
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    <?php
        include("../../block/header.php");
        echo "<div class='container'>";
        $conn= mysqli_connect("localhost", "root", "", "quanly_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
        mysqli_set_charset($conn, charset:'utf8');
        $query="SELECT * FROM khach_hang";
        $result=mysqli_query($conn, $query);
        if (mysqli_num_rows($result) <>0)
        {
            echo "<h1 align='center' style='color: black;'>THÔNG TIN KHÁCH HÀNG</h1>";
            echo "<table align='center' border='1' cellpadding='2' width='100%' >";
            echo "<tr style='color: red; border: 1px solid black'>
                <th style='border: 1px solid black'>Mã KH</th>
                <th style='border: 1px solid black'>Tên khách hàng</th>
                <th style='border: 1px solid black'>Giới tính</th>
                <th style='border: 1px solid black'>Địa chỉ</th>
                <th style='border: 1px solid black'>Số điện thoại</th>
                <th style='border: 1px solid black'>Email</th>
            </tr>";
            $dem = 1;
            while ($rows=mysqli_fetch_array(($result))){
                $dem++;
                if($dem%2==0){
                    echo "<tr style='background-color: #FEE0C1'>";
                for ($i=0; $i < mysqli_num_fields($result);$i++)
                {
                    echo "<td style='border: 1px solid black'>".$rows[$i]."</td>";
                }
                echo "</tr>";
            }
                else {
                    echo "<tr>";
                for ($i=0; $i < mysqli_num_fields($result);$i++)
                {
                    echo "<td style='border: 1px solid black'>".$rows[$i]."</td>";
                }
                echo "</tr>";
                }
            }
            echo "</table>";
        }
        echo "</div>";
        include("../../block/footer.php")
    ?>
</body>
</html>