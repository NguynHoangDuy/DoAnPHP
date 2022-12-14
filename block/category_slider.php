<div class="container">
    <div class="categorySlider">
    <div class="category">
        <h1>Danh mục sản phẩm</h1>
        
            <div class="select-box" >
                <div class="options-container active" style="background-color: #1d48ba">
    <?php
        require_once('./db_helper/DB_Helper.php');
        $DB = new DB_helper();
        $query = 'SELECT * FROM `danh_muc`';
        $categoryList = $DB->get_list($query);

        foreach ($categoryList as $category) {
            echo '
                    <div class="option" style="background-color: #1d48ba">
                            <input type="radio" class="radio" id="'.$category['ma_dm'].'" name="category"/>
                            <label for="'.$category['ma_dm'].'"><a href="./san-pham.php?dm='.$category['ma_dm'].'&loc=">'.$category['ten_dm'].'</a></label>
                            
                    </div>
            ';
        }
    ?>
            </div>
            <div class="selected" style="background-color: #1d48ba">
                Chọn danh mục
            </div>
        </div>
        
    </div>
        <div class="content-slider">
            <div class="img-slider">
                <div class="slide active-slider">
                    <img src="./assets/images/Br1a.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="./assets/images/Br2.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="./assets/images/Br1.jpg" alt="">
                </div>
                <div class="slide">
                    <img src="./assets/images/Br3.jpg" alt="">
                </div>
                <div class="navigation">
                    <div class="btn active-slider"></div>
                    <div class="btn"></div>
                    <div class="btn"></div>
                    <div class="btn"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/js/category.js"></script>
    <script src="./assets/js/slider.js"></script>
</div>
