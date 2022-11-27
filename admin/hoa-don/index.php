
<?php
 include("../../block/connection.php");
if(isset($_POST["tt"]))
{
    if(isset($_POST["ma_hd"]))
    {
        $dsHD = $_POST["ma_hd"];
        
        foreach ($dsHD as $value) {
            $query = "UPDATE `don_hang` SET `tinh_trang_tt`='1' WHERE don_hang.ma_donhang = '$value'";
            $result = mysqli_query($conn, $query);
        }
    }
}
if(isset($_POST["gh"]))
{
    if(isset($_POST["ma_hd"]))
    {
        $dsHD = $_POST["ma_hd"];
        
        foreach ($dsHD as $value) {
            $query = "UPDATE `don_hang` SET `tinh_trang_giaohang`='1' WHERE don_hang.ma_donhang = '$value'";
            $result = mysqli_query($conn, $query);
        }
    }
}
function adminContent()
{
    include("../../block/connection.php");
    
    echo '<div class="container hd" >
        <form action="" method="post">
            <h3 class="admin-product--title size-title">Đơn hàng</h3>
            <div class="receipt-comand">
                <div class="receipt-comand--title">Tất cả đơn hàng</div>
                <div class="comand--btn">
                    <button type="submit" name="tt">Xác nhận thanh toán</button>
                    <button type="submit" name="gh">Xác nhận giao hàng</button>
                </div>
            </div>
            <div class="table-overflow">
            <table class="receipt-table" >
                <tr class="receipt-title">
                    <td><input type="checkbox" class="check-all" /></td>
                    <td>Đơn hàng</td>
                    <td>Khách hàng</td>
                    <td>Ngày đặt</td>
                    <td>Thanh toán</td>
                    <td>Giao hàng</td>
                    <td>Tổng tiền</td>
                    <td></td>
                </tr>
                ';
                if(!isset($_GET['page']))
                {
                    $_GET['page'] = 1;
                }
                $rowPerPage = 12;
                $offset = ($_GET['page']-1)* $rowPerPage;
                $query = "SELECT `ma_donhang`, `ten_kh`, `tg_dat`, `tinh_trang_tt`, `tinh_trang_giaohang`, `tong_tien` FROM `don_hang` ";
                $result = mysqli_query($conn, $query);
                $numRow = mysqli_num_rows($result);
                $maxPage = ceil($numRow / $rowPerPage); 
                $query = "SELECT `ma_donhang`, `ten_kh`, `tg_dat`, `tinh_trang_tt`, `tinh_trang_giaohang`, `tong_tien` FROM `don_hang` LIMIT $offset, $rowPerPage";
                $result =  mysqli_query($conn, $query);
                if($result){
                    if(mysqli_num_rows($result) != 0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                            echo "<tr>";
                            echo  '<td><input type="checkbox" class="check-hd" name="ma_hd[]" value="'.$row["ma_donhang"].'"></td>';
                            echo "<td>$row[ma_donhang]</td>";
                            echo "<td>$row[ten_kh]</td>";
                            echo "<td>$row[tg_dat]</td>";
                            echo "<td>";
                            if($row["tinh_trang_tt"] == 1)
                                echo '<span class="paid">Đã thanh toán</span>';
                            else echo '<span class="un-paid">Chưa thanh toán</span>';
                            echo "</td>";
                            echo "<td>";
                            if($row["tinh_trang_giaohang"] == 1)
                                echo '<span class="paid">Đã giao hàng</span>';
                            else echo '<span class="un-ship">Chưa giao hàng</span>';
                            echo "</td>";
                            echo "<td><span class='money'>$row[tong_tien]</span> VNĐ</td>";
                            echo "<td><a href='./chi-tiet-hoa-don.php?mahd=".$row["ma_donhang"]."' class='receipt-link'>Xem chi tiết</a></td>";
                            echo "</tr>";
                        }
                    }
                }
                echo '
            </table>
            </div>
        </form>
    </div>';
}
include("../../block/connection.php");
include("../../block/global.php");
include("../../block/admin-block.php");


?>