<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2.7</title>
    <link rel="stylesheet" href="../../assets/css/main.css"/>
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        .app {
            margin: 20px auto 30px;
            font-size: 18px;
        }
        .contentTB {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        table.content-table {
            border-collapse: separate;
            border-spacing: 1px;
        }
        table, th, td {
            border: 1px groove #D3E4DB;
        }

        .content-table thead tr {
            color: #D10E4C;
            text-align: center;
            font-weight: bold;
        }
        
        .image-items {
            width: 100px;
            height: 100px;
        }
        .btn-back {
            margin-top: 20px;
            width: 70px;
            height: 30px;
        }
        .btn-back:hover{
            background-color: #b0cfd4;
            border: 1px solid #b0cfd4;
        }
        .btn-back a {
            text-decoration: none;
            font-size: 17px;
        }
    </style>
</head>
<body>
    <?php
        include("../../block/header.php");
    ?>
<div class="app">
    <div class="contentTB">
        <table class="content-table">
            <thead>
    <?php
    // require('./lab2_7.php');
    $id = $_GET['id'];
    if ($id == '')
        echo 'Không có sản phẩm';
    else {
        require('./db_helper/DB_driver.php');
        $DB = new DB_driver();
        $query = "SELECT Ma_sua, Hinh, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
        inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua 
        WHERE Ma_sua = '$id'";
        $detailProducts = $DB->get_list($query);

        foreach ($detailProducts as $product) {
            echo '
                <tr>
                    <th colspan="2" >'.$product['Ten_sua'].' - '.$product['Ten_hang_sua'].'</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img src="./images/'.$product['Hinh'].'" alt="" class="image-items"></td>
                    <td>
                        <h4>Thành phần dinh dưỡng:</h4>
                        <span>'.$product['TP_Dinh_Duong'].'</span>
                        <p>Lợi ích:<p>
                        <span>'.$product['Loi_ich'].'</span>
                        <p><b>Trọng lượng:</b>
                            <span>'.$product['Trong_luong'].' gr - </span><b>Đơn giá :</b><span>'.$product['Don_gia'].' VNĐ </span>
                        </p>
                    </td>
                </tr>
            ';
        }
    }
    ?>
                </tbody>
            </table>
        </div>
        <button class="btn-back"><a href="./lab2_7.php">Trở về</a></button>
    </div>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>