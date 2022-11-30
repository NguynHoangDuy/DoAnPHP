<?php
session_start();
if (isset($_SESSION["noti"]))
{

    echo "<div class='noti-show'>
    <p class='update-noti--text'><span>".$_SESSION["noti"]."</span>
    <i class='fa fa-close update--noti noti--close'></i>
    </p>
    </div>";
    unset($_SESSION["noti"]);
}
session_write_close();
include("../../block/connection.php");
include("../../block/global.php");
if (isset($_GET["ok"])){
    $id= $_GET['id'];
    include("../../block/connection.php");
    $sql= "DELETE FROM `san_pham` WHERE ma_sp='$id'";
    $result=mysqli_query($conn,$sql);
                        }
function adminContent()
{
    echo '<div class="container">';
    include("../../block/connection.php");
    $rowsPerPage=6;
    if ( ! isset($_GET['page']))
        $_GET['page'] = 1;
    $offset =($_GET['page']-1)*$rowsPerPage;
    $sql ="SELECT `ma_sp`, `ten_sp`, `gia`, `mo_ta`, `ten_dm`, `hinh_anh` FROM `san_pham`
    INNER JOIN danh_muc ON san_pham.danh_muc = danh_muc.ma_dm LIMIT $offset, $rowsPerPage";
    $result=mysqli_query($conn, $sql);
    if (!$result){
        echo "Không có sản phẩm nào";
    }
    else {
        if (!mysqli_num_rows($result)==0){
            echo "<div class='product-content--link' align='left' style='margin-bottom: 30px'>";
            echo "<h1 class='admin-product--title'>THÔNG TIN CỦA SẢN PHẨM</h1>
            <a href='../../admin/san-pham/create.php' class='product-link--edit'>Thêm sản phẩm mới</a>
        </div>";
            echo "<table align='center' class='admin-product--table'>";
            echo "<tr >
                    <th>STT</th>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Đơn giá</th>
                    <th>Danh mục</th>
                    <th>Chức năng</th>
                </tr>";
                $temp=$_GET['page']*$rowsPerPage;
                if($temp<=$rowsPerPage) $dem=0;
                else $dem=$temp-$rowsPerPage;
                $dem=0;
                while ($rows=mysqli_fetch_array($result)){
                    $dem++;
                    $id=$rows["ma_sp"];
                    echo "<tr>";
                    echo "<td>".$dem."</td>";
                    echo "<td><span class='id_sp'>{$rows['ma_sp']}</span></td>";
                    echo "<td>{$rows['ten_sp']}</td>";
                    echo "<td>
                    <img src='../../assets/images/{$rows['hinh_anh']}' class='admin-product--img'>
                    </td>";
                    echo "<td>
                    <span class='money'>{$rows['gia'] }</span>
                    <span>VNĐ</span></td>";
                    echo "<td>{$rows['ten_dm']}</td>";
                    echo "<td align='center'><a href='../../admin/san-pham/edit.php?id=".$id."'>
                        <i class='fa fa-edit' title='Chỉnh sửa'></i> 
                    </a> |
                    <a href='../../admin/san-pham/detail.php?id=".$id."'>
                    <i class='fa-sharp fa-solid fa-file-lines' title='Xem chi tiết'></i> 
                    </a> | 
                    
                        <i class='fa fa-trash admin-delete' style='color: red' title='Xóa' ></i> 
                    </td>";
                    echo "</tr>";
                }
                echo "</table>";
                $re = mysqli_query($conn, 'select * from san_pham');
                $numRows = mysqli_num_rows($re);
                $maxPage = floor($numRows/$rowsPerPage) + 1;
                echo "<div class='phanTrang'>";
                $firstPage=1;
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?page=".$firstPage.">";
                echo "<img src='../../assets/images/angle-double-left-solid.png' alt=''>";
                echo "</a>"; 
                if ($_GET['page'] > 1){
                    echo "<a class='link-btn' href=" .$_SERVER['PHP_SELF']."?page=".($_GET['page']-1).">
                    <img src='../../assets/images/angle-left-solid.png' alt=''>
                    </a> "; 
                }
                for ($i=1 ; $i<=$maxPage ; $i++)
                {
                    if ($i == $_GET['page'])
                    {
                        echo '<b class="center">'.$i.'</b> ';
                    }
                    else {
                        echo "<a class='link-text' href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">" . $i . "</a> ";
                    }
                }
                if ($_GET['page'] < $maxPage) {
                    echo "<a class='link-btn' href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">
                    <img src='../../assets/images/angle-right-solid.png' alt=''>
                    </a>";  
                }
                echo "<a class='link-btn' href=".$_SERVER ['PHP_SELF']."?page=".$maxPage.">";
                echo "<img src='../../assets/images/angle-double-right-solid.png' alt=''>";
                echo "</a>"; 
                echo"</div>";
        }
    }
}
include("../../block/admin-block.php");
?>
<script>
        const btnDelete = document.querySelectorAll(".admin-delete");
        const container = document.querySelector(".container");
        function addModal(){
            const template =`<form action="" method="get" >
            <div class="modal modal-hidden" align='center'>
            <input type="hidden" class="id-product" name="id"> 
            
            <i class="fa fa-close modal-content--close"></i>
                <div class="modal-content">
                    <div class="modal-content--text">Bạn có muốn xóa sản phẩm này?</div>
                    <div class="modal-content--link">
                        <input type="submit" name="reset" class='modal-content--close' value="Hủy"></input>
                        <input name="ok" type="submit" class='modal-content--delete' value="Xóa"></input>
                    </div>
                </div>
            </div>
            </form>`;
        container.insertAdjacentHTML("beforeend", template);
        }
        btnDelete.forEach((item, index) => item.addEventListener("click", function(e){
            const idProduct = document.querySelectorAll(".id_sp");
            e.preventDefault();
            var id = idProduct[index].textContent;
            console.log(id);
            addModal();
            const modal = document.querySelector(".modal");
            const idProductDel = document.querySelector(".id-product");
            idProductDel.value=id;
            console.log(idProductDel.value);
            modal.classList.remove("modal-hidden");
            modal.classList.add("modal-show");
            const btnClose = document.querySelectorAll(".modal-content--close");
            btnClose.forEach((item) => item.addEventListener("click", function(){
                modal.classList.remove("modal-show");
                modal.classList.add("modal-hidden");
            }))
        }));
        window.addEventListener("click",function(e){
    if (e.target.matches(".noti--close")){
        document.querySelector(".noti-show").style="z-index: 0; transition: all .25s linear";
    }
})
    </script>