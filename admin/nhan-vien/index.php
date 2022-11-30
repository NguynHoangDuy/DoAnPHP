<?php
session_start();
if (isset($_SESSION["err"]))
{

    echo "<div class='noti-show'>
    <p class='update-noti--text'><span>".$_SESSION["err"]."</span>
    <i class='fa fa-close update--noti noti--close'></i>
    </p>
    </div>";
    unset($_SESSION["err"]);
}
session_write_close();
?>
<?php
session_start();
if (isset($_SESSION["noti-people"]))
{

    echo "<div class='noti-show'>
    <p class='update-noti--text'><span>".$_SESSION["noti-people"]."</span>
    <i class='fa fa-close update--noti noti--close'></i>
    </p>
    </div>";
    unset($_SESSION["noti-people"]);
}
session_write_close();
include("../../block/admin-block.php");
function adminContent(){
    echo "<div class='container'>";
    echo "<div class='product-content--link' align='left' style='margin-bottom: 30px'>";
    echo "<h1 class='admin-product--title'>DANH SÁCH NHÂN VIÊN</h1>
    <a href='../../admin/nhan-vien/create.php' class='product-link--edit'>Thêm nhân viên mới</a>
</div>";
include("../../block/connection.php");
    $rowsPerPage=5;
    if ( ! isset($_GET['page']))
        $_GET['page'] = 1;
    $offset =($_GET['page']-1)*$rowsPerPage;
    $query = "SELECT * FROM nhan_vien LIMIT $offset, $rowsPerPage";
    $result = mysqli_query($conn, $query);
    if (!$result){
        echo "<p sstyle='color: red; font-weight: bold'>Không có dữ liệu</p>";
    }
    else {
        if (!mysqli_num_rows($result)==0){
            echo "<div class='people'>";
            while ($row=mysqli_fetch_array($result)){
                echo "<div class='people-item'>";
                echo "<a href='../../admin/nhan-vien/edit.php?id=".$row['ma_nv']."'>";
                if ($row['hinh_anh']==null) echo "<img src='../../assets/images/personal.png' class='people-img'>";
                else echo "<img src='../../assets/images/".$row['hinh_anh']."' class='people-img'>";
                echo "<div class='people-content'>";
                echo "<p class='people-name'> <span>Tên nhân viên:</span> ".$row['ho_nv']. " " .$row['ten_nv']."</p>";
                if ($row['gioi_tinh']==1) echo "<p class='people-gender'><span>Giới tính: </span> Nam</p>"; else echo "<p class='people-gender'><span>Giới tính: </span> Nữ</p>";
                echo "<p class='people-tel'><span>Số điện thoại:</span> ".$row['sdt']."</p>";
                echo "<p class='people-address'><span>Địa chỉ: </span>".$row['dia_chi']."</p>";
                echo "</div>";
                echo "</a>";
                echo "</div>";
            }
        }
    }
    echo "</div>";

}
?>
<script>
    window.addEventListener("click",function(e){
    if (e.target.matches(".noti--close")){
        document.querySelector(".noti-show").style="z-index: 0; transition: all .25s linear";
    }
})
</script>