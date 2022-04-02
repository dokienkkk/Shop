<div id="content" >
    <?php 
        require 'admin/connect.php';
        $sql = "select products.*,manufacturers.name as manufacturer_name 
        from products 
        join manufacturers 
        on products.manufacturer_id = manufacturers.id";
        $result = mysqli_query($connect,$sql);
    ?>

    <?php foreach ($result as $each) { ?>
        <div id="item" style="border: 1px solid #000;">
            <img src="admin/products/images/<?php echo $each['image']; ?>" alt="" height="100px">
            <br>
            <span><?php echo $each['name']; ?></span>
            <br>
            <span>
                <?php echo $each['manufacturer_name']; ?>
            </span>
            <div>
                Giá: $<?php echo $each['price']; ?>
            </div>
            <a href="">Xem chi tiết>>></a><br>
            <a href="">Thêm vào giỏ hàng</a>
        </div>
    <?php } ?>
    <?php mysqli_close($connect); ?>
</div>