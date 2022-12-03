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
        include("../../block/header.php");
    ?>
    <style>
        td, th{
            padding: 10px;
            border: 1px solid grey;
        }
        table{
            max-width: 1000px; margin: 0 auto;
        }
    </style>
    <div class="container">
<?php 
        $servername="localhost";
        $username="root";
        $password="";
        $dbname ="quanly_ban_sua";
        $conn= mysqli_connect($servername, $username, $password, $dbname) or die('Không thể kết nối' . mysqli_connect_error());
        $query="SELECT * FROM khach_hang";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)<>0){
            echo "<p align='center'><font size='5' color='blue'> THÔNG TIN HÃNG SỮA</font></p>";
            echo "<table width='100%' border-top='1px solid black' cellpadding='2' style='border-collapse'>";
            echo "<tr align='center'>
                    <th>MÃ KH</th>
                    <th>Tên khách hàng</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
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
            echo "</table>";
        }

    ?>
     </div>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>