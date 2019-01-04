<?php 
    require_once __DIR__."/autoload/autoload.php";

    $data = [
        'email'    => trim(postInput('email')),
        'password' => MD5(trim(postInput('password'))),
    ];

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $errors = [];
        postInput('email')     == '' ? $errors['email']    = 'Bạn chưa nhập email' : '';
        postInput('password')  == '' ? $errors['password'] = 'Bạn chưa nhập password' : '';

        if (empty($errors))
        {
            $issetUser = $db->fetchOne('users',"email = '". $data['email'] ."' AND password = '". $data['password'] ."'");

            if ($issetUser > 0)
            {
                $_SESSION['name'] = $issetUser['name'];
                $_SESSION['id'] = $issetUser['id'];
                echo "<script>alert('Đăng nhập thành công'); location.href='index.php'</script>";
            } else {
                $_SESSION['error'] = "Email hoặc mật khẩu không chính xác";
            }
        }
    }

?>
<?php require_once __DIR__."/layouts/header.php"; ?>
    <div class="col-md-9 bor">

        <section class="box-main1">
            <h3 class="title-main"><a href="">Đăng Nhập</a> </h3>
            <?php require_once __DIR__."/partials/notification.php" ?>
            <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group margin-form">
                    <label class="col-sm-2 col-form-label center-label">Email</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="email" placeholder="Dang Quy" value="<?php echo $data['email'] ?>">
                        <?php if (isset($errors['email'])) : ?>
                            <p class="text-danger"><?php echo $errors['email'] ?></p>
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
                    <label class="col-sm-5"></label>
                    <button type="submit" class="btn btn-success pull-center">Đăng nhập</button>
                </div>
            </form>
        </section>
    </div>
<?php require_once __DIR__."/layouts/footer.php"; ?>


                