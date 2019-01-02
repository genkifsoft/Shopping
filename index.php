<?php
    require_once __DIR__."/autoload/autoload.php"; 

    $sqlHomeCategory = "SELECT * FROM category WHERE home = 1 ORDER BY updated_at";

    $categoryHome = $db->fetchSql($sqlHomeCategory);



?>
<?php require_once __DIR__."/layouts/header.php"; ?>
    <div class="col-md-9 bor">
    <?php foreach ($categoryHome as $key => $value): ?>
    <section id="slide" class="text-center" >
            <img src="images/slide/sl3.jpg" class="img-thumbnail">
        </section>
    <?php 
        $param = $value['id'];
        $sqlproduct = "SELECT *
                            FROM product
                            WHERE category_id = $param
                            LIMIT 4";
        $product = $db->fetchSql($sqlproduct);
    ?>
        <section class="box-main1">
            <h3 class="title-main"><a href=""> 
                <?php echo $value['name']?></a>
            </h3>
            <div class="showitem">
            <?php foreach ($product as $key => $item) : ?>
                <div class="col-md-3 item-product bor">
                    <a href="">
                        <img src="<?php echo 'public/uploads/product/'.$item['thunbar'] ?>" class="" width="100%" height="180">
                    </a>
                    <div class="info-item">
                        <a href=""><?php echo $item['name'] ?></a>
                        <p><strike class="sale"><?php echo formatNumber($item['price']) ?> đ</strike> <b class="price"><?php echo saleProduct($item['price'], $item['sale']) ?> đ</b></p>
                    </div>
                    <div class="hidenitem">
                        <p><a href=""><i class="fa fa-search"></i></a></p>
                        <p><a href=""><i class="fa fa-heart"></i></a></p>
                        <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>
        
    </div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


                