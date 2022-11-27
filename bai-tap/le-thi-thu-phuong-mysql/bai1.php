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
        include("../../block/header-2.php");
    ?>
    <div class="container">
<?php
                        $ten="";
                        $ho="";
                        $dia_chi="";
                        $id_lop="";
                        $servername="localhost";
                        $username="root";
                        $password="";
                        $dbname ="qlsinhvien";
                        $conn= mysqli_connect($servername, $username, $password, $dbname) or die('Không thể kết nối' . mysqli_connect_error());
                        if (isset($_POST["submit"])){
                            $ten=$_POST["ten"];
                            $ho=$_POST["ho"];
                            $dia_chi=$_POST["dia_chi"];
                            $id_lop=$_POST["id_lop"];
                            $sql= "INSERT INTO sinhvien (ten, ho, dia_chi, id_lop) VALUES ('$ten', '$ho', '$dia_chi', '$id_lop')";
                            $result = mysqli_query($conn, $sql);
                            if (!$result) {
                                echo '<p style="color: red">Chèn không thành công</p>';
                            }
                            else echo '<p style="color: red">Chèn bản ghi thành công</p>';
                        }
                        if(isset($_POST["ketqua"])){
                            header(
                                'Location: ./xemkq.php'
                            );
                        }
                    
                    ?>
    <form action="" method="post" style="background-color:bisque; width: 300px; margin: 0 auto">
        <table>
            <tr >
                <td colspan="2" align="center" style="font-weight: bold;">
                    Nhập thông tin sinh viên
                </td>
            </tr>
            <tr>
                <td>
                    Tên
                </td>
                <td>
                    <input type="text" name="ten" id=""  value="<?php
                        if (isset($_POST["ten"])) echo $_POST["ten"]; else echo "";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Họ
                </td>
                <td>
                    <input type="text" name="ho" id="" value="<?php
                        if (isset($_POST["ho"])) echo $_POST["ho"]; else echo "";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>
                    Địa chỉ
                </td>
                <td>
                    <input type="text" name="dia_chi" id="" value="<?php
                        if (isset($_POST["dia_chi"])) echo $_POST["dia_chi"]; else echo "";
                    ?>">
                </td>
            </tr>
            <tr>
                <td>
                    ID của lớp
                </td>
                <td>
                    <select name="id_lop" id="">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        </select>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <input type="submit" value="Gửi" name="submit">
                    <input type="submit" value="Xóa" name="reset">
                    <input type="submit" value="Xem kết quả" name="ketqua">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                </td>
            </tr>
        </table>
    </form>
    </div>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>