<?php

    require_once __DIR__."/autoload/autoload.php"; 
    require_once __DIR__."/layouts/header.php";
    
    if (isset($_GET['token'])) {
        $token = trim($_GET['token']);

        $isset = $db->fetchOne('admin', "token = '". $token ."'");
        if ($isset > 0) {
            
           
        } else {
            header('Location:index.php');
        }
    } else {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $errors = [];
            $email = trim($_POST['email']);

            postInput('email') == '' ? $errors['email']    = 'Bạn chưa nhập email' : '';
            
            if (empty($errors))
            {   
                $sql = "SELECT * FROM users WHERE email = '". $email ."' LIMIT 1";
                $record = $db->fetchsql($sql);
                
                if (is_null($record[0]['id']))
                {
                    $_SESSION['error'] = 'Email không hợp lệ';
                } else {
                    $query = "SELECT * FROM config WHERE email = 'quy.dang@seldatinc.com' LIMIT 1";
                    $dataEmail = $db->fetchsql($query);

                    $data['time_expire'] = time();
                    
                    $data['token'] = createToken();

                    $idUser = $db->update('users', $data, array('email' => $email));

                    $content = file_get_contents('teample-mail/forgot-password.php');

                    $content = str_replace('{{name}}', $record[0]['name'], $content);
                    $content = str_replace('{{token}}', $data['token'], $content);

                    require_once __DIR__.'/libraries/Mail.php';
                    // insert scuess. Get message suceess redirect to list product.
                    if (isset($idUser))
                    {
                        $mail = new PHPMail($dataEmail[0]['email'], $dataEmail[0]['password'], $dataEmail[0]['email'], $email, 'My Webstite');
                        $mail->smtMailer('Kích hoạt người dùng', $content);
                        
                        $_SESSION['success'] = 'Mail đã được gửi! Vui lòng kiểm tra mail';
                        // header('Location: index.php');
                    } else {
                        // $_SESSION['error'] = 'Thêm người dùng thất bại';
                        // redirectAdmin('/../../../dang-nhap.php');
                    }
                }
            }
        }
    }
    
?>
    <?php if(empty($_GET['code'])) : ?>
        <div class="col-md-9 bor">

            <section class="box-main1">
                <h3 class="title-main"><a href="">QUÊN MẬT KHẨU</a> </h3>

                <?php require_once __DIR__."/partials/notification.php" ?>

                <form action="" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <p style="padding-top:5px; font-size:15px" class="text-center">Link reset mật khẩu sẽ được gửi đến email của bạn</p>
                </div>
                    <div class="form-group">
                        
                        <label class="col-sm-2 col-form-label center-label">Email</label>
                        <div class="col-md-8">
                            <input type="email" name="email" class="form-control" placeholder="mail@hotmail.com">
                            <?php if (isset($errors['email'])) : ?>
                                <p class="text-danger"><?php echo $errors['email'] ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-5"></label>
                        <button type="submit" class="col-md-2 text-center btn btn-success">Gửi</button>
                    </div>
                </form>
            </section>
        </div>
    <?php endif; ?>

    <?php require_once __DIR__."/layouts/footer.php"; ?>
    


                