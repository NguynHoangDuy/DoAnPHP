<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nguyên Liệu Trà Sữa</title>
    <link rel="stylesheet" href="./assets/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="./assets/images/blue_tea_logo.webp">
</head>
<body>
    <?php
        include("./block/header.php");
    ?>
    <?php    
        if (isset($_GET['send'])) {
            $fullname = $_GET['fullname'];
            $email = $_GET['email'];
            $phone_number = $_GET['phone_number'];
            $message = $_GET['message'];

            if (empty($fullname) || empty($email) || empty($phone_number) || empty($message))
            {
                echo ("<script>alert('Vui lòng nhập đầy đủ thông tin!');</script>");
                echo("<script>location.href = './contact.php';</script>");
                
            } else {
                require_once('./db_helper/DB_Helper.php');
                $DB = new DB_helper();
                $DB->insert('lien_he', [
                    'ho_ten' => $fullname,
                    'email' => $email,
                    'so_dt' => $phone_number,
                    'noi_dung' => $message
                ]);

                echo("<script>location.href = './contact.php';</script>");
            }
        }
    ?>
    <div class="contactUs">
        <div class="contactBox">
            <!-- form -->
            <div class="contact form">
                <h3>Liên hệ với chúng tôi</h3>
                <form action="" method="get" id="form-contact">
                    <div class="formBox">
                        <div class="row50">
                            <div class="inputBox">
                                <label for="fullname">Họ tên</label>
                                <input id="fullname" type="text" placeholder="Đặng Anh Phú" name="fullname">
                                <span class="messageError"></span>
                            </div>
                        </div>

                        <div class="row50">
                            <div class="inputBox">
                                <label for="email">Email</label>
                                <input id="email" type="text" placeholder="vd: phuda@gmail.com" name="email">
                                <span class="messageError"></span>
                            </div>
                        </div>
                        <div class="row50">
                            <div class="inputBox">
                                <label for="phone">Số điện thoại</label>
                                <input id="phone"type="text" placeholder="0862 333 444" name="phone_number">
                                <span class="messageError"></span>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <label for="phone">Nội dung</label>
                                <textarea id="message" placeholder="Nhập nội dung tại đây..." name="message"></textarea>
                                <span class="messageError"></span>
                            </div>
                        </div>
                        <div class="row100">
                            <div class="inputBox">
                                <input type="submit" value="Gửi liên hệ của bạn" name="send">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- info -->
            <div class="contact info">
                <h3>Thông tin liên hệ</h3>
                <div class="infoBox">
                    <div>
                        <span><i class="fa-sharp fa-solid fa-location-dot"></i></span>
                        <p>02 Nguyễn Đình chiểu, Vĩnh Thọ, Nha Trang, Khánh Hòa</p>
                    </div>
                    <div>
                        <span><i class="fa-solid fa-envelope"></i></span>
                        <a href="mailto:phu.da.61cntt@ntu.edu.vn">phu.da.61cntt@ntu.edu.vn</a>
                    </div>
                    <div>
                        <span><i class="fa-solid fa-phone"></i></span>
                        <a href="tel:+84862333444">+84 862 333 444</a>
                    </div>

                    <ul class="social">
                        <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>

            <!-- map -->
            <div class="contact map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.7070733576197!2d109.19986871429839!3d12.268091533244199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317067ed31eaa10f%3A0x51786d55cd9a91c9!2zMDIgTmd1eeG7hW4gxJDDrG5oIENoaeG7g3UsIFbEqW5oIFRo4buNLCBOaGEgVHJhbmcsIEtow6FuaCBIw7JhIDY1MDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1669198630910!5m2!1svi!2s" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <?php
        include("./block/footer.php");
    ?>

    <script src="./assets/js/contact_validator.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        Validator({
          form: '#form-contact',
          formGroupSelector: '.inputBox',
          errorSelector: '.messageError',
          rules: [
            Validator.isRequired('#fullname', 'Vui lòng nhập tên'),
            Validator.isEmail('#email'),
            Validator.minLength('#phone', 10),
            Validator.isRequired('#message', 'Vui lòng nhập nội dung'),
          ]
        });
      });
    </script>
</body>
</html>