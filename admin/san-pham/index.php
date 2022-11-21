<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../assets/images/blue_tea_logo.webp">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
</head>
<body>
    <?php
        session_start();
            $hasAcc = $_SESSION["hasAcc"];
            if($hasAcc != true)
            {
                header("location: ../");
            }
        session_write_close();

        if(isset($_POST["logout"]))
        {
            session_start();
                $_SESSION["hasAcc"] = false;
                header("location: ../");
            session_write_close();
        }
    ?>
    <div class="admin">
        <div class="admin-sidebar active">
            
            <ul class="admin-sidebar-list">
                <li class="admin-sidebar-item">
                    <a href="">
                        <img src="../../assets/images/tachometer-alt-solid.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Trang chủ</span>
                    </a>
                </li>
                <li class="admin-sidebar-item">
                    <a href="">
                        <img src="../../assets/images/user-solid.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Nhân Viên</span>
                    </a>
                </li>
                <li class="admin-sidebar-item">
                    <a href="">
                        <img src="../../assets/images/list-solid.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Danh Mục</span>
                    </a>
                </li>
                <li class="admin-sidebar-item">
                    <a href="../quan-ly/sanpham.php">
                        <img src="../../assets/images/coffee-solid.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Sản phẩm</span>
                    </a>
                </li>
                <li class="admin-sidebar-item">
                    <a href="">
                        <img src="../../assets/images/newspaper-regular.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Tin tức</span>
                    </a>
                </li>
                <li class="admin-sidebar-item">
                    <a href="">
                        <img src="../../assets/images/file-contract-solid.png" alt="" class="admin-sidebar-icon">
                        <span class="admin-sidebar-desc">Liên Hệ</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="admin-main">
            <!-- PC, Tablet -->
            <div class="admin-header">
                <div class="flex">
                    <form action="" method="post">
                            <button name="logout" type ="submit" class="admin-logout-btn" title="Đăng xuất tài khoản">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            </button>
                        </form>
                <a href="" class="admin-sidebar-logo">
                    <img src="../../assets/images/blue_tea_logo.webp" alt="" class="admin-sidebar-img">
                    <span>BLUE TEA</span>
                </a>
                <div class="admin-sidebar--toggle">
                    <i class="fa fa-bars"></i>
                </div>  
            </div>
                <div class="admin-search">
                    <form action="" method="post">
                        <input type="text" placeholder="Tìm kiếm ..." class="admin-search-input">
                        <button type="submit" class="admin-search-icon">
                            <div class="fas fa-magnifying-glass"></div>
                        </button>
                    </form>
                </div>
                <div class="admin-avatar">
                    <img src="../../assets/images/avatar-admin.jpg" alt="" class="admin-avatar-img">
                    <form action="" method="post">
                        <button name="logout" type ="submit" class="admin-logout-btn" title="Đăng xuất tài khoản">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="admin-content isactive">
                <div class="container">
                <?php
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
                        echo "<h1 class='admin-product--title'>THÔNG TIN CỦA SẢN PHẨM</h1>";
                        echo "<div class='product-link' align='left' style='margin-bottom: 30px'>
                        <a href='../../admin/san-pham/create.php' class='product-link--edit'>Thêm sản phẩm mới</a>
                    </div>";
                        echo "<table align='center' class='admin-product--table'>";
                        echo "<tr >
                                <th>STT</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Danh mục</th>
                                <th>Đơn giá</th>
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
                ?>
                <script>
                    const btnDelete = document.querySelectorAll(".admin-delete");
                    const container = document.querySelector(".container");
                    function addModal(){
                        const template =`<form action="" method="post" >
                        <div class="modal modal-hidden" align='center'>
                        <input type="hidden" class="id-product" name="id"> 
                        <button type="button" name="reset">
                        <i class="fa fa-close modal-content--close"></i></button>
                            <div class="modal-content">
                                <div class="modal-content--text">Bạn có muốn xóa sản phẩm này?</div>
                                <div class="modal-content--link">
                                    <button type="button" name="reset" class='modal-content--close'>Hủy</button>
                                    <button type="submit" name="ok" class='modal-content--delete'>Xóa</button>
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
                </script>
                    <?php
                        if (isset($_POST["ok"])){
                            $id= $_POST['id'];
                            include("../../block/connection.php");
                            $sql= "DELETE FROM `san_pham` WHERE ma_sp='$id'";
                            $result=mysqli_query($conn,$sql);
                            if ($result){
                                
                                
                            }
                        }
                        else {
                            $id="";
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>
</html>