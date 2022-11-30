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
        include("../../block/header.php");
    ?>
    <div class="container">
    <?php
    $rowsPerPage = 5;
    if (!isset($_GET['page']))
        $_GET['page'] = 1;
    $offset = ($_GET['page'] - 1) * $rowsPerPage;
    $conn = mysqli_connect("localhost", "root", "", "quanly_ban_sua") or die('Không thể kết nối' . mysqli_connect_error());
    $query = "SELECT Ma_sua, Ten_sua, Trong_luong, Don_gia, Hinh
     FROM sua LIMIT $offset, $rowsPerPage;";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) <> 0) {
        echo "<table align='center' border='1' colspan='5' width='100%' style='border-collapse: collpase'>";
        echo "<tr style='background-color: #FFEEE6; color: orange'>
            <td align='center' colspan='5'>THÔNG TIN SẢN PHẨM</td>
                </tr>";
        

        echo "<tr >";
        while ($rows = mysqli_fetch_array(($result))) {
            //echo "<tr >";
            echo "<td>";
            echo "<p style='font-weight: bold'>" . $rows['Ten_sua'] . "</p>";
            echo "<p>" . $rows['Trong_luong'] . " gr - " . $rows['Don_gia'] . " VNĐ</p>";
            echo "<img src='./img/" . $rows["Hinh"] . "' style='display: block; width: 100px; height: 100px; margin: 0 auto;'";
            echo "</td>";
            // echo "</tr>";
        }
        echo "</tr>";
        echo "</table>";
        $re = mysqli_query($conn, 'select * from sua');
        $numRows = mysqli_num_rows($re);
        $maxPage = floor($numRows / $rowsPerPage) + 1;
        echo "<div align='center' style='padding-top: 10px'>";
        if ($_GET['page'] > 1) {
            echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] - 1) . ">Back</a> "; //gắn thêm nút Back
        }
        for ($i = 1; $i <= $maxPage; $i++) {
            if ($i == $_GET['page']) {
                echo '<b class="center">Trang' . $i . '</b> '; //trang hiện tại sẽ được bôi đậm
            } else {
                echo "<a  href=" . $_SERVER['PHP_SELF'] . "?page=" . $i . ">Trang " . $i . "</a> ";
            }
        }
        if ($_GET['page'] < $maxPage) {
            echo "<a href=" . $_SERVER['PHP_SELF'] . "?page=" . ($_GET['page'] + 1) . ">Next</a>";  //gắn thêm nút Next
        }
        echo "</div>";
        //    echo 'Tong so trang la: '.$maxPage;
    }
    mysqli_close($conn);
    ?>
    </div>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>