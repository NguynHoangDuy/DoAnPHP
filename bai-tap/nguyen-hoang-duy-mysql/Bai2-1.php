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
        //include("../block/global.php");
        include("../../block/header.php");
    ?>
    <style>
        td, th{
            padding: 10px;
            border: 1px solid grey;
        }
        table{
            max-width: 800px; margin: 0 auto;
        }


    </style>
    <div class="container">
    <?php
        include("./connection.php");
        if(!$conn){
            die("Connection failed: ". mysqli_connect_error());
        }
        else {
            $query = "SELECT * FROM `hang_sua`";
            $result = mysqli_query($conn, $query);
            if(!$result)
                echo "Không xem được";
            else {
                if(mysqli_num_rows($result) != 0)
                {
                    echo "
                    <table border='1' align='center' style='border-collapse: collapse; max-width: 800px; margin: 0 auto;'>
                    <tr style='background-color: pink;'>
                        <th>Mã HS</th>
                        <th>Tên hãng sữa</th>
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                    </tr>";
                    while($row = mysqli_fetch_array($result))
                    {
                            echo "<tr>";
                        for($i = 0; $i < mysqli_num_fields($result); $i++)
                        {
                            echo "<td style='padding: 20px'>".$row[$i]."</td>";
                        }
                            echo "</tr>";
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
</html>

