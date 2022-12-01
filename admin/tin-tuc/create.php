
<?php
if(isset($_POST["add"]))
{
    include("../../block/connection.php");
    date_default_timezone_set("Asia/Ho_Chi_Minh");  
    $tieude = $_POST["title"];
    $noidung =$_POST['noidung'];
    $tgdang = date('Y-m-d H:i:s');
    $target_dir = "../../assets/Images/";
    $target_file = $target_dir.basename($_FILES["hinh_dd"]["name"]);
    if($_FILES['hinh_dd']['tmp_name'] != "")
    {
        $fileImage = $_FILES['hinh_dd']['tmp_name'];
        move_uploaded_file($fileImage, $target_file);
    }
    if($_FILES['hinh_dd']['name'] != "")
    {
        $query = "INSERT INTO `tin_tuc`(`tieu_de`, `hinh_dd`, `noi_dung`, `tg_dang`) VALUES ('$tieude','".$_FILES['hinh_dd']['name']."','$noidung','$tgdang')";
    }
    
    $result=mysqli_query($conn,$query);
    if($result)
    {
        header("location: ./index.php");
        session_start();
        $_SESSION["tb"] = "add";
        session_write_close();
    }
}
function adminContent(){
    include("../../block/connection.php");

        $src = "../../assets/images/image-choice.png";
        echo "<div class='container'>
        <form action='' method='post' enctype='multipart/form-data'>
            <h3 class='admin-product--title size-title'>Thêm bài viết</h3>
            <div class='comand--btn'>
                <button name='add'>Thêm mới</button>
            </div>
            <input type='text' name='title' value='' class='new-edit-title' placeholder='Tiêu đề bài viết'>

            <textarea name='noidung' id='editor1'></textarea>
            <h4 class='edit-title'>Ảnh đại diện</h4>
            <div class='new-edit-img'>
                <img src='".$src."' alt='' class='img-news'>
                <input type='file' name='hinh_dd' title='' value='' id='input-file-img' class='hinh_dd'>
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
?>
<?php
include("../../block/connection.php");
include("../../block/global.php");
include("../../block/admin-block.php");
?>