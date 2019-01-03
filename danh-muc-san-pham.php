<?php

    require_once __DIR__."/autoload/autoload.php";

    if (isset($_GET['page']))
    {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $idCategory = $_GET['id'];

    $sql = "SELECT * FROM product WHERE product.category_id = $idCategory";
    $total = count($db->fetchSql($sql));
    $product = $db->fetchJones('product', $sql, $total, $page, 4, true);
    
    $id = intval(getInput('id'));
    $idEdit = $db->fetchID('category', $id);

    if ($product['page'])
    {
        $sotrang = $product['page'];
        unset($product['page']);
    }

?>
<?php require_once __DIR__."/layouts/header.php"; ?>
    <div class="col-md-9 bor">
        <section class="box-main1">
        <h3 class="title-main"><a href=""> <?php  echo $idEdit['name'] ?></a> </h3>
            <?php foreach ($product as $key => $item) : ?>
                <div class="showitem">
                    <div class="col-md-3 item-product bor">
                        <a href="/chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                            <img src="public/uploads/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                        </a>
                        <div class="info-item">
                            <a href="/chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                            <p><strike class="sale"><?php echo formatNumber($item['price']) ?> đ</strike> <b class="price"><?php echo saleProduct($item['price'], $item['sale'])?> đ</b></p>
                        </div>
                        <div class="hidenitem" style="display: none;">
                            <p><a href=""><i class="fa fa-search"></i></a></p>
                            <p><a href=""><i class="fa fa-heart"></i></a></p>
                            <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>
                <nav class="text-center">
                    <ul class="pagination">
                         <?php for($i = 1; $i <= $sotrang; $i++): ?>
                            <li class="page-item <?php echo isset($_GET['page']) && $i == isset($_GET['$page']) ? 'active' : '' ?>">
                                <a class="page-link" href="?id=<?php echo $idCategory ?>&&page=<?php echo $i ?>"><?php echo $i ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
        </section>
    </div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


                