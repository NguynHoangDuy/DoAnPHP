<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2.3</title>
    <link rel="stylesheet" href="../../assets/css/main.css"/>
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        .app {
            display: flex;
            margin: 20px auto;
            font-size: 18px;
        }
        table {
            margin: auto;
        }
        table, th, td {
            border: 1px groove #D3E4DB;
        }
        .content-table thead tr {
            color: #D10E4C;
            text-align: center;
            font-weight: bold;
        }
        .table-item_phai {
            display: flex;
        }
         .phai{
            width: 40px;
            height: 40px;
            margin: auto;
        }
        .content-table tbody tr:nth-of-type(odd) {
            background-color: #B3D0C7;
        }
    </style>
</head>
<body>
    <?php
        include("../../block/header.php");
    ?>
    <div class="app">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>Mã KH</th>
                        <th>Tên Khách hàng</th>
                        <th>Giới tính</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                    </tr>
                </thead>
                <tbody>
    <?php
        require('./db_helper/DB_driver.php');
        $DB = new DB_driver();
        $khachHangList = $DB->get_list('SELECT * FROM khach_hang');
        foreach ($khachHangList as $khachHang){
            $gender = $khachHang['Phai'] == false ? './images/male.png' : './images/female.png';
            echo '
                <tr> 
                    <td>'.$khachHang['Ma_khach_hang'].'</td>
                    <td>'.$khachHang['Ten_khach_hang'].'</td>
                    <td class="table-item_phai"><image class="phai" src="'.$gender.'"></image></td>
                    <td>'.$khachHang['Dia_chi'].'</td>
                    <td>'.$khachHang['Dien_thoai'].'</td>
                </tr>
            ';
        }
    ?>
                </tbody>
            </table>
    </div>

    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>