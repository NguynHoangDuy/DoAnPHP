<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List sản phẩm</title>
    <style>
    
    </style>
</head>
<body>
    <?php
    $conn= mysqli_connect("localhost", "root", "", "ql_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
    mysqli_set_charset($conn, charset:'utf8');
    $sqlLoaiSua = "SELECT Ma_loai_sua, Ten_loai FROM loai_sua";
    $LoaiSua=mysqli_query($conn, $sqlLoaiSua);
    $sqlHangSua = "SELECT Ma_hang_sua, Ten_hang_sua FROM hang_sua";
    $HangSua=mysqli_query($conn, $sqlHangSua);

    ?>
    <form action="" method="get" align="center" >
        <table align="center" style="width: 1000px">
            <tr>
                <td colspan="3" align="center" style="background-color: #FECCCD; color: #E63E52">TÌM KIẾM THÔNG TIN SỮA</td>
            </tr>
            <tr>
                <td colspan="3" style="background-color: #FECCCD;">
                    Loại sữa: <select name="searchLoaiSua" id="">
                        <option value=" "></option>
                        <?php
                            if (mysqli_num_rows($LoaiSua)<>0){
                                while ($rowLoaiSua=mysqli_fetch_array($LoaiSua)){
                                    if (isset($_GET["searchLoaiSua"])){
                                        if ($_GET["searchLoaiSua"]===$rowLoaiSua["Ma_loai_sua"]){
                                            echo "<option value=".$rowLoaiSua["Ma_loai_sua"]." selected>".$rowLoaiSua["Ten_loai"]."</opiton>";
                                        }
                                        else echo "<option value=".$rowLoaiSua["Ma_loai_sua"].">".$rowLoaiSua["Ten_loai"]."</opiton>";
                                    }
                                    else echo "<option value=".$rowLoaiSua["Ma_loai_sua"].">".$rowLoaiSua["Ten_loai"]."</opiton>";
                                }
                            }
                        ?>
                    </select>
                    Hãng sữa: <select name="searchHangSua" id="">
                    <option value=" "></option>
                        <?php
                            if (mysqli_num_rows($HangSua)<>0){
                                while ($rowHangSua=mysqli_fetch_array($HangSua)){
                                    if (isset($_GET["searchHangSua"])){
                                        if ($_GET["searchHangSua"]===$rowHangSua["Ma_hang_sua"]){
                                            echo "<option value=".$rowHangSua["Ma_hang_sua"]." selected>".$rowHangSua["Ten_hang_sua"]."</opiton>";
                                        }
                                        else echo "<option value=".$rowHangSua["Ma_hang_sua"].">".$rowHangSua["Ten_hang_sua"]."</opiton>";    
                                    }
                                    else echo "<option value=".$rowHangSua["Ma_hang_sua"].">".$rowHangSua["Ten_hang_sua"]."</opiton>";
                                }
                            }
                        ?>
                    </select>
            </td>
            </tr>
            <tr >
                <td colspan="2" style="background-color: #FECCCD;">
                    Tên sữa: <input type="text" name="search" id="" value="<?php if (isset($_GET["search"])) echo $_GET["search"]; else echo ""?>">
                    <input type="submit" value="Tìm kiếm" name="submit">
                </td>
            </tr>

    <?php
        if (isset($_GET["submit"])){
            $search=$_GET['search'];
            $searchHangSua=$_GET['searchHangSua'];
            $searchLoaiSua=$_GET['searchLoaiSua'];
            if (!empty($search)){
                $conn= mysqli_connect("localhost", "root", "", "ql_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
                mysqli_set_charset($conn, charset:'utf8');
                $query= "SELECT Ma_sua, Ten_sua,Ten_hang_sua,  Trong_luong, Don_gia, Hinh, TP_Dinh_Duong, Loi_ich
                FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
                inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
                where Ten_sua like '%$search%' and  sua.Ma_hang_sua like '%$searchHangSua%' and sua.Ma_loai_sua like '%$searchLoaiSua%'";
                $result=mysqli_query($conn, $query);
                if (!$result){
                    echo "Không kết nối";
                }
                else {
                    $num=mysqli_num_rows($result);
                    if ($num>0 || $search!="" || $searchHangSua != '' || $searchLoaiSua != ''){
                        echo "<td align='center' style='border:none'>
                        <strong>Có $num sản phẩm được tìm thấy</strong>
                        
                        </td>";
                        echo "<table align='center' border='1' cellpadding='2' width='50%' style='border-collapse: collpase'>";
                        while ($rows=mysqli_fetch_assoc($result)){
                            echo "<tr style='background-color: #FFEEE6; color: orange'>
            <td colspan='2' align='center' style='font-size: 20px'>".$rows['Ten_sua']." - ".$rows['Ten_hang_sua']."</td>
                </tr>";
                echo "<td> <img src='./img/".$rows["Hinh"]."' style='display: block; margin: 0 auto;'</td>";
                echo "<td align='left'>";
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
                        echo "<td align='center' style='border:none'>
                        <strong>Không có sản phẩm nào</strong>
                        
                        </td>";
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
</body>
</html>