<?php
    require_once __DIR__."/autoload/autoload.php"; 

    $sqlHomeCategory = "SELECT * FROM category WHERE home = 1 ORDER BY updated_at";

    $categoryHome = $db->fetchSql($sqlHomeCategory);

    $data = [];
    foreach ($categoryHome as $key => $value) {
        $param = $value['id'];
        $sqlProduct = "SELECT * FROM product WHERE category_id = $param";
        $product = $db->fetchSql($sqlProduct);
        $data[$value['name']] = $product;
    }
 
?>
<?php require_once __DIR__."/layouts/header.php"; ?>
    <div class="col-md-9 bor">
    <div>
        <?php foreach ($categoryHome as $item) : ?>
            <img class="mySlides" src="<?php echo base_domain() ?>public/frontend/images/slide/<?php echo $item['banner']?>" style="width:100%">
        <?php endforeach; ?>
        <button class="w3-button w3-black w3-display-left btn-click-left" onclick="plusDivs(-1)">&#10094;</button>
        <button class="w3-button w3-black w3-display-right btn-click-right" onclick="plusDivs(1)">&#10095;</button>
        
    </div>
    <?php foreach ($data as $key => $value): ?>
        <section class="box-main1">
            <h3 class="title-main"><a href=""> 
                <?php echo $key ?></a>
            </h3>
            <div class="showitem">
                <?php foreach ($value as $item) : ?>
                    <div class="col-md-3 item-product bor">
                        <a href="/chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                            <img src="<?php echo 'public/uploads/product/'.$item['thunbar'] ?>" class="" width="100%" height="180">
                        </a>
                        <div class="info-item">
                            <a href="/chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                            <p><strike class="sale"><?php echo formatNumber($item['price']) ?> đ</strike> <b class="price"><?php echo saleProduct($item['price'], $item['sale']) ?> đ</b></p>
                        </div>
                        <div class="hidenitem">
                            <p><a href=""><i class="fa fa-search"></i></a></p>
                            <p><a href=""><i class="fa fa-heart"></i></a></p>
                            <p><a href="<?php echo base_domain() ?>add-cart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    <?php endforeach; ?>
        
    </div>
<?php require_once __DIR__."/layouts/footer.php"; ?>

<script>
    var slideIndex = 1;
    showDivs(slideIndex);

    function plusDivs(n) {
    showDivs(slideIndex += n);
    }

    function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("mySlides");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length}
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    x[slideIndex-1].style.display = "block";  
    }
</script>


                