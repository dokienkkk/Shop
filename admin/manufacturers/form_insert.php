<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Thêm nhà sản xuất</h1>
        <a href="index.php">Về trang quản lý nhà sản xuất</a>
        <form action="process_insert.php" method="post" >
            Tên nhà sản xuất
            <input type="text" name="name" id="">
            <br>
            Địa chỉ nhà sản xuất
            <input type="text" name="address" id="">
            <br>
            Link Ảnh
            <input type="text" name="image" id="">
            <br>
            Số điện thoại
            <input type="text" name="phone" id="">
            <br>
            <button>Thêm</button>
        </form>
</body>
</html>