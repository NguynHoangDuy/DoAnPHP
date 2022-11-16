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
</body>
</html>

