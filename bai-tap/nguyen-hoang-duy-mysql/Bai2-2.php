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
<style>
        td, th{
            padding: 10px;
            border: 1px solid grey;
        }
        table{
            max-width: 800px; margin: 0 auto;
        }


    </style>
    <?php
        include("../../block/connection.php");
        // include("../block/global.php");
        include("../../block/header.php");
    ?>
    <div class="container">

        <?php
        include("./connection.php");
        if(!$conn){
            die("Connection failed: ". mysqli_connect_error());
        }
        else {
            $query = "SELECT * FROM `khach_hang`";
            $result = mysqli_query($conn, $query);
            if(!$result)
            echo "Không xem được";
            else {
                if(mysqli_num_rows($result) != 0)
                {
                    echo "
                    <table border='1' align='center' style='border-collapse: collapse;'>
                    <tr style='color: #AA1C6C;''>
                    <th>Mã KH</th>
                    <th>Tên Khách hàng</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    </tr>";
                    $dem = 1;
                    while($row = mysqli_fetch_array($result))
                    {
                        if($dem % 2 != 0)
                        {    echo "<tr style='background-color: #FEE0C1;'>";
                            for($i = 0; $i < mysqli_num_fields($result)-1; $i++)
                            {
                                echo "<td style='padding: 20px;' >".$row[$i]."</td>";
                            }
                            echo "</tr>";}
                            else{
                                echo "<tr>";
                                for($i = 0; $i < mysqli_num_fields($result)-1; $i++)
                                {
                                    echo "<td style='padding: 20px;' >".$row[$i]."</td>";
                                }
                            echo "</tr>";
                        }
                            $dem++;
                        }
                        echo " </table>";
                    }                    
                }
            }
            ?>
    </div>
    <?php
        include("../../block/footer.php");
        ?>
</body>
</body>
</html>

