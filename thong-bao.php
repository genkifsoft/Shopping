<?php require_once __DIR__."/autoload/autoload.php"; ?>
<?php require_once __DIR__."/layouts/header.php"; ?>
    <div class="col-md-9 bor">
        <section class="box-main1">
            <h3 class="title-main"><a href="">Thông báo thanh toán</a> </h3>
            <?php if(isset($_SESSION['success-thongbao'])): ?>
                <div class="alert alert-success" id="message">
                    <?php echo $_SESSION['success-thongbao']; unset($_SESSION['success-thongbao'])?>
                </div>
            <?php endif ?>
        </section>
    </div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


                