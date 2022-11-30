<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List sản phẩm</title>
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
    include("../../block/header.php");
    echo "<div class='container'>";
?>
    <form action="" method="get" align="center" >
        <table align="center" style="width: 100%">
            <tr>
                <td colspan="3" align="center" style="background-color: #FECCCD; color: #E63E52">TÌM KIẾM THÔNG TIN SỮA</td>
            </tr>
            <tr >
                <td colspan="2" style="background-color: #FECCCD;">
                Tên sữa: <input type="text" name="search" id="" value="<?php if (isset($_GET["search"])) echo $_GET["search"]; else echo ""?>">
                    <input type="submit" value="Tìm kiếm" name="submit">
                </td>
            </tr>

    <?php
        if (isset($_GET["submit"])){
            $search=addslashes($_GET['search']);
            if (!empty($search)){
                $conn= mysqli_connect("localhost", "root", "", "quanly_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
                mysqli_set_charset($conn, charset:'utf8');
                $query= "SELECT Ma_sua, Ten_sua,Ten_hang_sua, Trong_luong, Don_gia, Hinh, TP_Dinh_Duong, Loi_ich
                FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
                inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua where Ten_sua like '%$search%'";
                $result=mysqli_query($conn, $query);
                if (!$result){
                    echo "Không kết nối";
                }
                else {
                    $num=mysqli_num_rows($result);
                    if ($num>0 && $search!=""){
                        echo "<td align='center' style='border:none'>
                        <strong>Có $num sản phẩm được tìm thấy</strong>
                        
                        </td>";
                        echo "<table align='center' border='1' cellpadding='2' width='50%' style='margin: 0 auto'>";
                        while ($rows=mysqli_fetch_assoc($result)){
                            echo "<tr style='background-color: #FFEEE6; color: orange'>
            <td style='border: 1px solid black' colspan='2' align='center' style='font-size: 20px'>".$rows['Ten_sua']." - ".$rows['Ten_hang_sua']."</td>
                </tr>";
                echo "<td style='border: 1px solid black'> <img src='./img/".$rows["Hinh"]."' style='display: block; margin: 0 auto;'</td>";
                echo "<td style='border: 1px solid black; vertical-align: middle' align='left'>";
                echo "<p style='font-style: italic; font-weight: bold'> Thành phần dinh dưỡng</p>"
                    .$rows['TP_Dinh_Duong'];
                echo "<p style='font-style: italic; font-weight: bold'> Lợi ích</p>"
                    .$rows['Loi_ich'];
                echo "<p align='right'><strong style='font-style: italic'>Trọng lượng: </strong>".$rows['Trong_luong']." gr - <strong style='font-style: italic'>Đơn giá: </strong>"
                .$rows['Don_gia']." VNĐ";
            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    else {
                        $err="Không có sản phẩm nào";
                    }
                }
            }
            mysqli_close($conn);
        }
        else {
            $search="";
        }
    ?>
            </table>
    </form>
<?php
    echo "</div>";
    include("../../block/footer.php")
?>
</body>
</html>