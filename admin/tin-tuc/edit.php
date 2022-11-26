
<?php
if(isset($_POST["edit"]))
{
    include("../../block/connection.php");
    $id = $_GET["id"];
    $tieude = $_POST["title"];
    $noidung =$_POST['noidung'];


    $target_dir = "../../assets/Images/";
    $target_file = $target_dir.basename($_FILES["hinh_dd"]["name"]);
    if($_FILES['hinh_dd']['tmp_name'] != "")
    {
        $fileImage = $_FILES['hinh_dd']['tmp_name'];
        move_uploaded_file($fileImage, $target_file);
    }
    if($_FILES['hinh_dd']['name'] != "")
    {
        $query = "UPDATE `tin_tuc` SET `tieu_de`='$tieude',`hinh_dd`='".$_FILES['hinh_dd']['name']."',`noi_dung`='$noidung' WHERE `ma_tintuc` = '$id'";
    }
    else {
        $query = "UPDATE `tin_tuc` SET `tieu_de`='$tieude',`noi_dung`='$noidung' WHERE `ma_tintuc` = '$id'";
    }
    
    $result=mysqli_query($conn,$query);
}
function adminContent(){
    include("../../block/connection.php");
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $query = "SELECT `ma_tintuc`, `tieu_de`, `hinh_dd`, `noi_dung`, `tg_dang` FROM `tin_tuc` WHERE `ma_tintuc` = '$id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        $src = "../../assets/images/$row[hinh_dd]";
        echo "<div class='container'>
        <form action='' method='post' enctype='multipart/form-data'>
            <h3 class='admin-product--title size-title'>Chỉnh sửa bài viết</h3>
            <div class='comand--btn'>
                <button name='edit'>Cập nhật</button>
                <button name='remove'>Xóa</button>
            </div>
            <input type='text' name='title' value='".$row['tieu_de']."' class='new-edit-title'>

            <textarea name='noidung' id='editor1'>".$row['noi_dung']."</textarea>
            <h4 class='edit-title'>Ảnh đại diện</h4>
            <div class='new-edit-img'>
                <img src='$src' alt='' class='img-news'>
                <input type='file' name='hinh_dd' title='' value='$src' id='input-file-img' class='hinh_dd'>
                <label for='input-file-img' class='product-update--label not-hover'>Chọn ảnh</label>
            </div>
        </form>";
        echo "</div>";

        echo "<script>CKEDITOR.replace('editor1')</script>";
        echo "<script>
            const hinh_dd = document.querySelector('.hinh_dd')
            const imgNews = document.querySelector('.img-news')
            hinh_dd.addEventListener('change', (e)=>{
                imgNews.src =  window.URL.createObjectURL(hinh_dd.files[0]);
                console.log(hinh_dd.files[0])
            })

        </script>";
    }
}
?>
<?php
include("../../block/connection.php");
include("../../block/global.php");
include("../../block/admin-block.php");
?>