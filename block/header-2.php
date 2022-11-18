  <header>
        <div class="header-container">
            <div class="header-info">
                <div class="header-info--name">
                    <a href="../../index.php">Công ty cổ phần Thạch Rau Câu Minh Hạnh</a>
                </div>
                <div class="header-info--contact">
                <div class="header-info--gmail">
                <i class="fa fa-envelope"></i>
                    <a href="#">kunhantea@gmail.com</a>
                </div>
                <div class="header-info--tel">
                <i class="fa fa-phone"></i>
                    <a href="#">0945.323.666</a>
                </div>
                </div>
            </div>
            <div class="header-content">
                <div class="header-content--mobile">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="header-content--logo">
                    <img src="../../assets/images/blue_tea_logo.webp" alt="" width="100" height="100">
                </div>
                <div class="header-content--method">
                    <div class="header-method--hotline">
                        <i class="fa fa-phone"></i>
                        <div class="header-method--text">
                            <strong>Hotline: 0912.077.322</strong>
                            <br>Tư vấn 24/7 miễn phí
                        </div>
                    </div>
                    <div class="header-method--hotline">
                    <i class="fa fa-phone"></i>
                        <div class="header-method--text">
                            <strong>Hotline: 0945.323.666</strong>
                            <br>Tư vấn 24/7 miễn phí
                        </div>
                    </div>
                    <div class="header-method--ship">
                    <i class="fas fa-truck-fast"></i>
                        <div class="header-method--text">
                            <strong>Giao hàng toàn quốc</strong>
                            <br>Ship COD tận nhà
                        </div>
                    </div>
                </div>
                <div class="header-content--product">
                    <a href="http://" class="header-product--text">
                    GIỎ HÀNG /<?php
                        session_start();
                        if(isset($_SESSION["gioHang"]))
                        {
                            $gia = 0;
                            $gioHang = $_SESSION["gioHang"];
                            for($i = 0; $i < count($gioHang); $i++)
                            {
                                $gia = $gia + $gioHang[$i]["gia"];
                            }
                            echo "<span class='money'>$gia</span>";
                        }
                        else echo "0";
                        session_write_close();
                        ?>  <span>đ</span>
                </a>
                <i class="fas fa-bag-shopping"></i>
                </div>
            </div>
            <div class="header-menu">
                <div class="header-menu--list">
                    <div class="header-menu--item">
                        <a href="../../index.php" class="header-menu--link">Trang chủ</a>
                    </div>
                    <div class="header-menu--item">
                        <a href="../../gioi-thieu.php" class="header-menu--link">Giới thiệu</a>
                    </div>
                    <div class="header-menu--item">
                        <a href="../../bai-tap.php" class="header-menu--link">Bài tập</a>
                    </div>
                    <div class="header-menu--item">
                        <a href="../../san-pham.php" class="header-menu--link">Sản phẩm</a>
                    </div>
                    <div class="header-menu--item">
                        <a href="#" class="header-menu--link">Tin tức</a>
                    </div>
                    <div class="header-menu--item">
                        <a href="#" class="header-menu--link">Đặt hàng</a>
                    </div>
                    <div class="header-menu--item">
                        <a href="#" class="header-menu--link">liên hệ</a>
                    </div>
                </div>
                <div class="header-menu--search">
                    <input type="text" name="" id="" placeholder="Bạn cần tìm gì?...">
                    <button type="submit"><i class="fas fa-magnifying-glass"></i></button>
                </div>
                <div class="header-menu--close">
                    <i class="fa fa-times"></i>
                </div>
            </div>
        </div>
    </header>
    <script >
        const btnOpen = document.querySelector(".header-content--mobile");
        const btnClose = document.querySelector(".header-menu--close");
        const headerMenu = document.querySelector(".header-menu");
        btnOpen.addEventListener("click", function(){
            headerMenu.style="transform: translate(0%)";
        });
        btnClose.addEventListener("click", function(){
            headerMenu.style="transform: translate(-100%)";
        });
        const listMenuItem = document.querySelectorAll(".header-menu--link");
        console.log(listMenuItem);
        [...listMenuItem].forEach(item => item.addEventListener("click", function (e){
            [...listMenuItem].forEach(item => item.classList.remove("is-active"));
            e.target.classList.add("is-active");
        }));
    </script>