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
        td {
        max-width: 400px;
    }
    p{
        margin: 5px 0;
        font-weight: 700;
    }
    span{
        font-weight: 100;
    }
    </style>

    <?php
        $id = $_GET['id'];
        if($id == "")
        {
            echo "Không có sản phẩm nào hết";
        }
        else {
            include("./connection.php");
            if(!$conn){
                die("Connection failed: ". mysqli_connect_error());
            }
            else {
                $query = "SELECT   Ma_sua, Hinh, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich
                FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
                inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
                WHERE Ma_sua = '$id'";

                $result = mysqli_query($conn, $query);

                if(!$result)
                {
                    echo "query bị sai rồi má";
                }
                else {
                    if(mysqli_num_rows($result)!= 0)
                    {
                        $row = mysqli_fetch_array($result);
                        echo "<table align='center' border='1' style='border-collapse: collapse;'>";
                        echo "<tr> <th colspan='2'>".$row['Ten_sua']." - ".$row['Ten_hang_sua']."</th></tr>";
                        $src = "./images/".$row['Hinh'];
                        echo "<tr> 
                            <td><img width='150px' height='150px' src='".$src."' alt='' class='img-product'></td>
                            <td>
                                <p>Thành phần dinh dưỡng<p>
                                <span>".$row['TP_Dinh_Duong']."</span>
                                <p>Lợi ích<p>
                                <span>".$row['Loi_ich']."</span>
                                <p style='text-align: right;'><b>Trọng lượng:</b> <span>".$row['Trong_luong']." gr - </span><b>Đơn giá :</b><span> ".$row['Don_gia']." VNĐ </span></p>
                            </td>
                        </tr>";
                        echo "<tr><td style='text-align: right;'><a href='./Bai2-7.php'>Quay lại</a></td></tr>";
                        echo "</table>";
                        
                    }
                }
            }
        }
    ?>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>

