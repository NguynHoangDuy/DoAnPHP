<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin chi tiết sản phẩm</title>
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="icon" type="image/x-icon" href="../../assets/images/blue_tea_logo.webp">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
</head>
<body>
<?php

if (isset($_GET["ok"])){
    $self=$_GET['page'];
    include("../../block/connection.php");
    $sql= "DELETE FROM `san_pham` WHERE ma_sp='$id'";
    $result=mysqli_query($conn,$sql);
    if ($result){
        header("Location: ../../admin/san-pham/index.php");
    }
}
?>
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
        <div class="admin-sidebar">
            
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
                    <a href="../san-pham">
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
            <div class="admin-content">
                <div class="container">
                    <?php
                    include("../../block/connection.php");
                    $id=$_GET["id"];
                    if (isset($id)){
                        $sql ="SELECT `ma_sp`, `ten_sp`, `gia`, `mo_ta`, `ten_dm`, `hinh_anh` FROM `san_pham`
                        INNER JOIN danh_muc ON san_pham.danh_muc = danh_muc.ma_dm WHERE ma_sp='$id'";
                        $result=mysqli_query($conn, $sql);
                        if (!$result){
                            echo "Không thành công";
                        }
                        else {
                            while ($row=mysqli_fetch_array($result)){
                                echo "<h1 class='admin-product--title'>THÔNG TIN CỦA SẢN PHẨM</h1>";
                                echo "<div class='admin-product--detail'>
                                <div class='product-detail--img'>
                                    <img src='../../assets/images/{$row['hinh_anh']}' alt='' title='Ảnh sản phẩm {$row['ten_sp']}'>
                                </div>
                                <div class='product-detail--content'>
                                    <div class='product-detail--id'>
                                        <span style='color: #1d48ba; font-weight: bold'>Mã sản phẩm:</span> {$row['ma_sp']}</div>
                                    <div class='product-detail--name'>
                                        <span style='color: #1d48ba; font-weight: bold'>Tên sản phẩm: </span> {$row['ten_sp']}</div>
                                    <div class='product-detail--price'>
                                        <span style='color: #1d48ba; font-weight: bold'>Giá: </span> 
                                        <span class='money'>{$row['gia']}</span> VNĐ
                                        </div>
                                    <div class='product-detail--type'>
                                        <span style='color: #1d48ba; font-weight: bold'>Danh mục: </span>{$row['ten_dm']}</div>
                                    <div class='product-detail--desc'>
                                        <span style='color: #1d48ba; font-weight: bold'>Mô tả: </span> {$row['mo_ta']}</div>
                                </div>
                            </div>";
                            }
                        }
                    echo "<div class='product-link' align='center'>
                    <a href='../../admin/san-pham/edit.php?id={$id}' class='product-link--edit'>Chỉnh sửa</a>
                    <a href='#modal' class='product-link--delete admin-delete'>Xóa</a>
                </div>";
                }
                else {
                    echo "Sản phẩm không tồn tại";
                }
                    ?>
                    <script>
                    const btnDelete = document.querySelectorAll(".admin-delete");
                    const container = document.querySelector(".container");
                    function addModal(){
                        const template =`<form action="" method="get" id="modal">
                        <div class="modal modal-hidden" align='center'>
                        <input type="hidden" class="id-product" name="id"> 
                        <button  name="reset">
                        <i class="fa fa-close modal-content--close"></i></button>
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
                        e.preventDefault();
                        addModal();
                        const modal = document.querySelector(".modal");
                        modal.classList.remove("modal-hidden");
                        modal.classList.add("modal-show");
                        const btnClose = document.querySelectorAll(".modal-content--close");
                        btnClose.forEach((item) => item.addEventListener("click", function(){
                            modal.classList.remove("modal-show");
                            modal.classList.add("modal-hidden");
                        }))
                    }));
                </script>
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>
</html>