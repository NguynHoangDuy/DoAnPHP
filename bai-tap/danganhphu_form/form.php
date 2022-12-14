<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bài 8 - Form Information</title>
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
    <form action="./config.php" method="post">
      <table align="center" style="background-color: #f0ebce; margin: 20px auto;">
        <thead>
          <tr>
            <th colspan="2" style="background-color: #bad1c2">
              Enter Your Information
            </th>
          </tr>
        </thead>
        <tr>
          <td>Fullname:</td>
          <td><input type="text" name="fullname" /></td>
        </tr>
        <tr>
          <td>Address:</td>
          <td><input type="text" name="address" /></td>
        </tr>
        <tr>
          <td>Phone:</td>
          <td><input type="text" name="phone" /></td>
        </tr>
        <tr>
          <td>Gender:</td>
          <td>
            <input type="radio" name="gender" value="Nam" /> Nam
            <input type="radio" name="gender" value="Nữ" /> Nữ
          </td>
        </tr>
        <tr>
          <td>Country:</td>
          <td>
            <select id="cars" name="country">
              <option value="Việt Nam">Việt Nam</option>
              <option value="Hàn Quốc">Hàn Quốc</option>
              <option value="Thái Lan">Thái Lan</option>
              <option value="Nhật Bản">Nhật Bản</option>
            </select>
          </td>
        </tr>

        <tr>
          <td>Study:</td>
          <td>
            <input type="checkbox" name="PHP" value="PHP & MySQL" />PHP & MySQL
            <input type="checkbox" name="ASP" value="ASP.NET" />ASP.NET
            <input type="checkbox" name="CCNA" value="CCNA" />CCNA
            <input type="checkbox" name="Security" value="Security+" />Security+
          </td>
        </tr>
        <tr>
          <td>Note:</td>
          <td>
            <textarea name="note" cols="45" rows="5"></textarea>
          </td>
        </tr>
        <tr>
          <td></td>
          <td>
            <button type="submit" name="send">Gửi</button>
            <button type="submit" name="cancel">Hủy</button>
          </td>
        </tr>
      </table>
    </form>
    <?php
        include("../../block/footer.php");
    ?>
  </body>
</html>
