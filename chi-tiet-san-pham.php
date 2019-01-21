<?php
    require_once __DIR__."/autoload/autoload.php";

    $id = intval($_GET['id']);
    $productID = $db->fetchID('product', $id);
    $param = $productID['category_id'];
    $sql = "SELECT *
            FROM product
            WHERE category_id = $param
            ORDER BY updated_at DESC
            LIMIT 3";
    $productNext = $db->fetchSql($sql);
?>
<?php require_once __DIR__."/layouts/header.php"; ?>

<div class="col-md-9 bor">
    <section class="box-main1">
        <div class="col-md-6 text-center">
            <img src="<?php echo base_domain() ?>public/uploads/product/<?php echo $productID['thunbar'] ?>"
            class="img-responsive bor" id="imgmain" width="100%" height="370"
            data-zoom-image="<?php echo base_domain() ?>public/uploads/product/<?php echo $productID['thunbar'] ?>">
            <ul class="text-center bor clearfix" id="imgdetail">
                <li>
                    <img src="<?php echo base_domain() ?>public/uploads/product/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                </li>
                <li>
                    <img src="<?php echo base_domain() ?>public/uploads/product/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                </li>
                <li>
                    <img src="<?php echo base_domain() ?>public/uploads/product/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                </li>
                <li>
                    <img src="<?php echo base_domain() ?>public/uploads/product/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                </li>
            </ul>
        </div>
        <div class="col-md-6 bor" style="margin-top: 20px;padding: 30px;">
            <ul id="right">
                <li>
                    <h3><?php echo ucwords($productID['name']); ?></h3>
                </li>
                <li>
                    <p><?php echo $productID['content']; ?></p>
                </li>
                <li>
                    <?php if ($productID['sale'] > 0) :?>
                    <p>
                        <strike class="sale"><?php echo formatNumber($productID['price']) ?> đ</strike>
                        <b class="price">
                            <?php echo saleProduct($productID['price'], $productID['sale'])?> đ
                        </b>
                    </p>
                    <?php else: ?>
                        <p>
                            <b class="price">
                                <?php echo formatNumber($productID['price'])?> đ
                            </b>
                        </p>
                    <?php endif; ?>
                </li>
                <li><b class="price"><a href="<?php echo base_domain() ?>add-cart.php?id=<?php echo $productID['id']?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Add TO Cart</a></b></li>
                <b class="price">
                </b>
            </ul>
            <b class="price">
            </b>
        </div>
        <b class="price">
        </b>
    </section>
    <b class="price">
        <div class="col-md-12" id="tabdetail">
            <div class="row">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Comment </a></li>
                    <li><a data-toggle="tab" href="#menu1">Thông tin khác </a></li>
                    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
                </ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                    <!-- form commnet -->
                    <form action="comment.php">
                        <div class="f-left form-add">
                            <div class="main_form">
                                <textarea class="form-control" id="review_field" cols="5" rows="5"
                                placeholder="Xin mời để lại câu hỏi, Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất!" onfocus="comment.backToMainCmt()"></textarea>
                                <div class="f-left user_action_wrap clearfix">
                                    <div class="cmt_left">
                                        <a href="#" class="poli" rel="nofollow">Quy định đăng bình luận</a>
                                    </div>
                                    <div class="cmt_right">
                                        <button type="submit" id="btnSendCmt">Gửi</button>
                                    </div>
                                </div>
                                <div class="clearfix">
                                    <ul>
                                        <li class="clearfix">
                                            <img src="<?php echo base_domain() ?>public/uploads/product/16-270x270.png"
                                            class="img-responsive pull-left cmt-img">
                                            <p class="text-name-cmt"><b>Full name</b></p>
                                        </li>
                                        <li class="cmt-user"><p>This is tag p</p></li>

                                        <li class="icon-comment" >
                                            <i class="fa fa-commenting" aria-hidden="true"></i>
                                            <li>
                                                <a data-toggle="tab" href="#anscomment"> Trả lời |</a>
                                                <span class="time-cmt">Time</span>
                                            </li>
                                        </li>

                                        <div id="anscomment" class="tab-pane fade">
                                            <h3> Thông tin khác </h3>
                                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>

                    </div>
                    <div id="menu1" class="tab-pane fade">
                        <h3> Thông tin khác </h3>
                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <h3>Menu 2</h3>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                    </div>
                    <div id="menu3" class="tab-pane fade">
                        <h3>Menu 3</h3>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


                
        <!-- <div class="col-md-12">
            <div class="showitem">
                foreach ($productNext as $item) : ?>
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
                            <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                        </div>
                    </div>
                endforeach; ?>
            </div>
        </div> -->
    <!-- </b> -->