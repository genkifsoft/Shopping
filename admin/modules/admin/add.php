<?php
    $open = 'admin';

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";

    /**
     * When submit form
     * 
     * Check filed in form have invalid
     */
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $data = [
            'name'     => postInput('name'),
            'address'  => trim(postInput('address')),
            'email'    => trim(postInput('email')),
            'phone'    => trim(postInput('phone')),
            'password' => MD5(trim(postInput('password'))),
            'level'    => trim(postInput('level')),
        ];
        $errors = [];
        postInput('name')     == '' ? $errors['name']     = 'Bạn chưa nhập họ và tên' : '';
        postInput('address')  == '' ? $errors['address']  = 'Bạn chưa nhập địa chỉ' : '';
        if (postInput('email') == '')
        {
            $errors['email'] = 'Bạn chưa nhập email';
        } else {

            $is_check = $db->fetchOne('admin'," email = '". $data['email'] ."' ");
            if ($is_check != NULL)
            {
                $errors['email'] = 'Email đã tồn tại';
            }
        }
        postInput('phone')    == '' ? $errors['phone']    = 'Bạn chưa nhập số điện thoại' : '';
        postInput('password') == '' ? $errors['password'] = 'Bạn chưa nhập mật khẩu' : '';
        postInput('level')    == '' ? $errors['level']    = 'Bạn chưa chọn cấp bậc' : '';
        if (postInput('password') != postInput('confirm_password'))
        {
            $errors['password'] = 'Mật khẩu không khớp';
        }

        if (empty($_FILES['avatar']['name']))
        {
            $errors['avatar'] = 'Bạn chưa chọn ảnh';
        }
        
        /**
         * If $errors == [];
         * Form submit valid. Insert data in table Category
         * 
         * param: $errors.
         */
        if (empty($errors))
        {
            $isset = $db->fetchOne('admin', "name = '". $data['name'] ."'");

            if ($isset > 0)
            {
                $_SESSION['error'] = 'Tên admin đã tồn tại';
            } else {
                $fileName = $_FILES['avatar']['name'];
                $data['avatar'] = $fileName;
                $dataname = $_FILES["avatar"]["tmp_name"]. ROOT .'admin/'. $fileName;

                // move image from ram temp to forder upload
                move_uploaded_file($_FILES["avatar"]["tmp_name"], ROOT.'admin/'. $fileName);
                $idProduct = $db->insert('admin', $data);
    
                // insert scuess. Get message suceess redirect to list product.
                if (isset($idProduct))
                {
                    $_SESSION['success'] = 'Thêm người dùng thành công';
                    redirectAdmin('admin');
                } else {
                    $_SESSION['error'] = 'Thêm người dùng thất bại';
                    redirectAdmin('admin');
                }
            }
        }
    }
    
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>

    <!-- Page Heading Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm mới người dùng
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_domain()?>/admin/modules">Dashboard</a>
                </li>
                <li>
                    <i></i>  <a href="">Admin</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i>Thêm mới
                </li>
            </ol>
            <div class="clearfix">
                <?php if(isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error'])?>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
    <!-- /.row -->

   <form enctype="multipart/form-data" class="form-horizontal" action="" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Họ và tên:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="name" placeholder="Họ và tên" value="<?php echo isset($data['name']) ? $data['name'] : '' ?>">
                <?php if (isset($errors['name'])): ?>
                    <p class="text-danger"><?php echo $errors['name'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="address" placeholder="Quận 1 - Hồ Chí Minh" value="<?php echo isset($data['address']) ? $data['address'] : '' ?>">
                <?php if (isset($errors['address'])): ?>
                    <p class="text-danger"><?php echo $errors['address'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-8">
                <input class="form-control" type="email" name="email" placeholder="quy.dang@seldatinc.com" value="<?php echo isset($data['email']) ? $data['email'] : '' ?>">
                <?php if (isset($errors['email'])): ?>
                    <p class="text-danger"><?php echo $errors['email'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Số điện thoại</label>
            <div class="col-sm-3">
                <input class="form-control" type="number" name="phone" placeholder="0964944719" value="<?php echo isset($data['phone']) ? $data['phone'] : '' ?>">
                <?php if (isset($errors['phone'])): ?>
                    <p class="text-danger"><?php echo $errors['phone'] ?></p>
                <?php endif ?>
            </div>
            <label class="col-sm-1 control-label">Hình ảnh</label>
            <div class="col-sm-3">
                <input type="file" name="avatar" class="form-control" accept="image/x-png,image/gif,image/jpeg" />
                <?php if (isset($errors['avatar'])): ?>
                    <p class="text-danger"><?php echo $errors['avatar'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-8">
                <input name="password" class="form-control" type="password" placeholder="********">
                <?php if (isset($errors['password'])): ?>
                    <p class="text-danger"><?php echo $errors['password'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Confirm Password</label>
            <div class="col-sm-8">
                <input type="password" name="confirm_password" class="form-control" placeholder="********"/>
                <?php if (isset($errors['confirm_password'])): ?>
                    <p class="text-danger"><?php echo $errors['confirm_password'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-2 control-label">Level</label>
                <div class="col-sm-8">
                    <select name="level" class="form-control col-sm-2">
                        <option value="">--- Xin mời bạn chọn level cho admin ---</option>
                        <option value="0" <?php echo isset($data['level']) && $data['level'] == 0 ? 'selected' : '' ?>>CTV</option>
                        <option value="1" <?php echo isset($data['level']) && $data['level'] == 1 ? 'selected' : '' ?>>ADMIN</option>
                    </select>
                    <?php if (isset($errors['level'])): ?>
                        <p class="text-danger"><?php echo $errors['level'] ?></p>
                    <?php endif ?>
                </div>
            </div>
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-success">Lưu</button>
            </div>
        </div>
        </div>
        
    </form>

<?php

    /**
     * Required filed footer
     * __DIR__ C:\xampp\htdocs\Shopping\admin\modules
     */
    require_once __DIR__."/../../layouts/footer.php";
?>