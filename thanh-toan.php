<?php require_once __DIR__."/autoload/autoload.php"; ?>
<?php

if (isset($_SESSION['id'])) {
    $user = $db->fetchID('users', $_SESSION['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_SESSION['id']) && isset($_SESSION['cart'])) {
            $data = [
                'amount'   => $_SESSION['total'],
                'users_id' => $_SESSION['id'],
                'status'   => 0,
            ];
            // insert table transaction. rturn ID
            $userId = $db->insert('transaction', $data);
            
            foreach($_SESSION['cart'] as $item) {
                $insetOrder = [
                    'transaction_id' => $userId,
                    'product_id'     => $item['id'],
                    'qty'            => $item['qty'],
                    'price'          => $item['price'],
                ];
                $order = $db->insert('orders', $insetOrder);
            }
            unset($_SESSION['cart']);
            $_SESSION['success-thongbao'] = 'Success! Lưu thông tin đơn hàng thành công! Chúng tôi sẽ liên hệ đến bạn sớm nhất!';
            header('Location: thong-bao.php');
        }
    }
?>

<?php require_once __DIR__."/layouts/header.php"; ?>
    <div class="col-md-9 bor">

        <section class="box-main1">
            <h3 class="title-main" style="padding: 10px 15px 5px 8px; border-radius: 0px 66px 0px 0px;background-color: #ea3a3c;">
                <a href="" style="color:#fff"> Thanh toán đơn  hàng</a> </h3>
            
                <?php require_once __DIR__."/partials/notification.php" ?>

                <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="form-group margin-form">
                        <label class="col-sm-2 col-form-label center-label">Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="name" readonly placeholder="Dang Quy" value="<?php echo $user['name'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label center-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" name="email" class="form-control" readonly placeholder="dang.quy@seldatinc.com" value="<?php echo $user['email'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label center-label">Phone</label>
                        <div class="col-md-8">
                            <input type="number" class="form-control" name="phone" readonly placeholder="0964 9444 917" value="<?php echo $user['phone'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label center-label">Address</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address" placeholder="Ấp 2, Xã Nam Bình - Quận Thái An - TPCHM" readonly value="<?php echo $user['address'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label center-label">Số tiền</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="address" placeholder="1000.000" readonly value="<?php echo $user['address'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-form-label center-label">Ghi chú</label>
                        <div class="col-md-8">
                            <textarea rows="4" cols="96"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2"></label>
                        <button type="submit" class="btn btn-success pull-center">Lưu</button>
                        <button type="reset" class="btn btn-cancel pull-center">Cancel</button>
                    </div>
                </form>
        </section>
    </div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


                