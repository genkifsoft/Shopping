        <?php 
    require_once __DIR__."/autoload/autoload.php"; 
    if (isset($_SESSION['id']))
    {
        echo "<script>alert('Bạn đã có tài khoản không nên vào đây'); location.href='index.php'</script>";
    }

    $data = [
        'name'     => trim(postInput('name')),
        'email'    => trim(postInput('email')),
        'phone'    => trim(postInput('phone')),
        'address'  => trim(postInput('address')),
        'password' => MD5(trim(postInput('password'))),
    ];

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $errors = [];
        postInput('name')      == '' ? $errors['name']     = 'Bạn chưa nhập tên' : '';
        postInput('email')     == '' ? $errors['email']    = 'Bạn chưa nhập email' : '';
        postInput('phone')     == '' ? $errors['phone']    = 'Bạn chưa nhập phone' : '';
        postInput('address')   == '' ? $errors['address']  = 'Bạn chưa nhập address' : '';
        postInput('password')  == '' ? $errors['password'] = 'Bạn chưa nhập password' : '';

        if ($_FILES['avatar']['name'] == '')
        {
            $errors['avatar'] = 'Bạn chưa chọn avatar';
        }
        
        if (empty($errors))
        {   
            $isset = $db->fetchOne('users', "email = '". $data['email'] ."'");
            if ($isset > 0)
            {
                $_SESSION['error'] = 'Email đã tồn tại';
            } else {
                $fileName = timeNow(). '_'.$_FILES['avatar']['name'];
                $data['avatar'] = $fileName;

                // move image from ram temp to forder upload
                move_uploaded_file($_FILES["avatar"]["tmp_name"], ROOT.'users/'. $fileName);
                $idUser = $db->insert('users', $data);
    
                // insert scuess. Get message suceess redirect to list product.
                if (isset($idUser))
                {
                    $_SESSION['success'] = 'Thêm người dùng thành công';
                    redirectAdmin('/../../../dang-nhap.php');
                } else {
                    $_SESSION['error'] = 'Thêm người dùng thất bại';
                    redirectAdmin('/../../../dang-nhap.php');
                }
            }
        }
    }

?>

<?php require_once __DIR__."/layouts/header.php"; ?>
    <div class="col-md-9 bor">

        <section class="box-main1">
            <h3 class="title-main"><a href=""> Đăng ký thành viên</a> </h3>

            <?php require_once __DIR__."/partials/notification.php" ?>

            <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group margin-form">
                    <label class="col-sm-2 col-form-label center-label">Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="name" placeholder="Dang Quy" value="<?php echo $data['name'] ?>">
                        <?php if (isset($errors['name'])) : ?>
                            <p class="text-danger"><?php echo $errors['name'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label center-label">Email</label>
                    <div class="col-md-8">
                        <input type="email" name="email" class="form-control" placeholder="dang.quy@seldatinc.com" value="<?php echo $data['email'] ?>">
                        <?php if (isset($errors['email'])) : ?>
                            <p class="text-danger"><?php echo $errors['email'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label center-label">Phone</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control" name="phone" placeholder="0964 9444 917" value="<?php echo $data['phone'] ?>">
                        <?php if (isset($errors['phone'])) : ?>
                            <p class="text-danger"><?php echo $errors['phone'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label center-label">Address</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="address" placeholder="Ấp 2, Xã Nam Bình - Quận Thái An - TPCHM" value="<?php echo $data['address'] ?>">
                        <?php if (isset($errors['address'])) : ?>
                            <p class="text-danger"><?php echo $errors['address'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label center-label">Password</label>
                    <div class="col-md-8">
                        <input type="password" class="form-control" name="password" placeholder="********">
                        <?php if (isset($errors['password'])) : ?>
                            <p class="text-danger"><?php echo $errors['password'] ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-form-label center-label">Avatar</label>
                    <div class="col-md-5">
                        <input type="file" class="form-control" name="avatar">
                        <?php if (isset($errors['avatar'])) : ?>
                            <p class="text-danger"><?php echo $errors['avatar'] ?></p>
                        <?php endif; ?>
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


                