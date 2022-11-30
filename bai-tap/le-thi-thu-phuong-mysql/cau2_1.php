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
    <div class="container">
    <?php 
        $servername="localhost";
        $username="root";
        $password="";
        $dbname ="quanly_ban_sua";
        $conn= mysqli_connect($servername, $username, $password, $dbname) or die('Không thể kết nối' . mysqli_connect_error());
        $query="SELECT * FROM hang_sua";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result)<>0){
            echo "<p align='center'><font size='5' color='blue'> THÔNG TIN HÃNG SỮA</font></p>";
            echo "<table align='center' width='100%' border='1px solid black' cellpadding='2' style='border-collapse'>";
            echo "<tr border='1px solid black'>
                    <th border='1px solid black'>MÃ HS</th>
                    <th border='1px solid black'>Tên hãng sữa</th>
                    <th border='1px solid black'>Địa chỉ</th>
                    <th border='1px solid black'>Số điện thoại</th>
                    <th border='1px solid black'>Email</th>
                </tr>";
            while($rows=mysqli_fetch_array($result)){
                echo "<tr>";
                for ($i=0; $i<mysqli_num_fields($result); $i++){
                    echo "<td>".$rows[$i]."</td>";
                }
                echo "</tr>";
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