<?php

function adminContent()
{
    echo "<div class='container'>";
    echo "<div class='admin-menu'>";
    echo "<a class='admin-menu--item' href='../../admin/nhan-vien'>
    <i class='fa fa-user'></i>
    <p>Nhân viên</p>
    </a>";
    echo "<a class='admin-menu--item' href='../../admin/danh-muc'>
    <i class='fa fa-list'></i>
    <p>Danh mục</p>
    </a>";
    echo "<a class='admin-menu--item' href='../../admin/san-pham'>
    <i class='fa fa-coffee'></i>
    <p>Sản phẩm</p>
    </a>";
    echo "<a class='admin-menu--item' href='../../admin/hoa-don'>
    <i class='fa fa-receipt'></i>
    <p>Hóa đơn</p>
    </a>";
    echo "<a class='admin-menu--item' href='../../admin/tin-tuc'>
    <i class='fa fa-newspaper'></i>
    <p>Tin Tức</p>
    </a>";
    echo "<a class='admin-menu--item' href='../../admin/lien-he/index.php'>
    <i class='fa fa-file-contract'></i>
    <p>Liên hệ</p>
    </a>";
    echo "</div>";
    echo "</div>";
}
include("../../block/connection.php");
include("../../block/global.php");
include("../../block/admin-block.php");


?>
