<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 6 - Trang nhập liệu</title>
    <link rel="stylesheet" href="../../assets/css/main.css"/>
	<link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include("../../block/header.php");
    ?>
    <form action="./results_page_bai6.php" method="post">
        <table align="center" style="background-color: #F5D5AE; margin: 20px auto;">
            <thead>
                <tr>
                    <th colspan="9" style="background-color: #FFE15D">PHÉP TÍNH TRÊN HAI SỐ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chọn phép tính:</td>
                    <td>
                        <input type="radio" name="choose" value="+">
                        Cộng
                        <input type="radio" name="choose" value="-">
                        Trừ
                        <input type="radio" name="choose" value="*">
                        Nhân
                        <input type="radio" name="choose" value="/">
                        Chia
                    </td>
                </tr>
                <tr>
                    <td>Số thứ nhất:</td>
                    <td><input type="text" name="num1"></td>
                </tr>
                <tr>
                    <td>Số thứ nhì:</td>
                    <td><input type="text" name="num2"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <button type="submit" name="submit">Tính</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>