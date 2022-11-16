<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
                    <table border='1' align='center' style='border-collapse: collapse;'>
                    <tr>
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
</body>
</html>

