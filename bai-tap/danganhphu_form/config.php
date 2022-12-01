<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 8 - Show information</title>
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
    <?php
        echo "Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập: <br>";
        echo "Fullname: ", $_POST["fullname"];
        echo "<br>";
        echo "Address: ", $_POST["address"];
        echo "<br>";
        echo "Phone Number: ", $_POST["phone"];
        echo "<br>";
        echo "Gender: ", $_POST["gender"];
        echo "<br>";
        echo "Country: ", $_POST["country"];
        echo "<br>";
        echo "Study:";
        if(isset($_POST["Security"]))
        echo " ",$_POST["Security"];
        if(isset($_POST["CCNA"]))
        echo " ",$_POST["CCNA"];
        if(isset($_POST["ASP"]))
        echo " ",$_POST["ASP"];
        if(isset($_POST["PHP"]))
        echo " ",$_POST["PHP"];
        echo "<br>";
        echo "Note: ", $_POST["note"];
        echo "<br>";
        echo '<button style="margin-top: 20px"><a href="./form.php">Quay lại trang trước</a></button>';
    ?>
    <?php
        include("../../block/footer.php");
    ?>
</body>
</html>