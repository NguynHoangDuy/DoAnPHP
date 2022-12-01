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
            // $query= "SELECT sua.Ma_sua, sua.Ten_sua, hang_sua.Ten_hang_sua, loai_sua.Ten_Loai, sua.Trong_luong, sua.Don_gia
            //         FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
            //         inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
            
            $result = mysqli_query($conn, $query);
            if(!$result)
                echo "Không xem được";
            else {
                if(mysqli_num_rows($result) != 0)
                {
                    echo "
                    <table border='1' align='center' style='border-collapse: collapse; text-align: center;'>
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
                            if($row['Phai']== $row[$i])
                            {
                                if($row['Phai'] == 0)
                                echo '<td><img src="https://www.pngitem.com/pimgs/m/22-220721_circled-user-male-type-user-colorful-icon-png.png" width="40px" height="40px" alt=""></td>';
                                else echo '<td><img src="https://cdn.icon-icons.com/icons2/2643/PNG/512/avatar_female_woman_person_people_white_tone_icon_159360.png" width="40px" height="40px" alt=""> </td>';
                            }
                            else echo "<td style='padding: 20px;' >".$row[$i]."</td>";
                        }
                            echo "</tr>";}
                            else{
                                echo "<tr>";
                        for($i = 0; $i < mysqli_num_fields($result)-1; $i++)
                        {
                            if($row['Phai']== $row[$i])
                            {
                                if($row['Phai'] == 0)
                                echo '<td><img src="https://www.pngitem.com/pimgs/m/22-220721_circled-user-male-type-user-colorful-icon-png.png" width="40px" height="40px" alt=""></td>';
                                else echo '<td><img src="https://cdn.icon-icons.com/icons2/2643/PNG/512/avatar_female_woman_person_people_white_tone_icon_159360.png" width="40px" height="40px" alt=""></td>';
                            }
                            else echo "<td style='padding: 20px;' >".$row[$i]."</td>";
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
</html>


