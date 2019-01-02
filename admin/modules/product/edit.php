<?php
    $open = 'product';

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";

    $category = $db->fetchAll('category');
    
    $id = intval(getInput('id'));
    $idEdit = $db->fetchID('product', $id);
  
    if (empty($idEdit))
    {
        $_SESSION['error'] = 'Dữ liệu không tồn tại';
        redirectAdmin('product');
    } else {

        /**
         * When submit form
         * 
         * Check filed in form have invalid
         */
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = [
                'name' => trim(postInput('name')),
                'slug' => to_slug(postInput('name')),
                'price' => trim(postInput('price')),
                'sale' => trim(postInput('sale')),
                'content' => trim(postInput('content')),
                'thunbar' => $_FILES['thunbar']['name'],
            ];

            $errors = [];
            if (postInput('name') == '')
            {
                $errors['name'] = 'Bạn chưa nhập tên sản phẩm';
            }

            /**
             * If $errors == [];
             * Form submit valid. Insert data in table product
             * 
             * param: $errors.
             */
            if (empty($errors))
            {
                if ($idEdit['name'] != $data['name'] || $idEdit['price'] != $data['price'] ||
                    $idEdit['sale'] != $data['sale'] || $idEdit['content'] != $data['content'] ||
                    $idEdit['thunbar'] != $data['thunbar']) {

                    $isset = $db->fetchOne('product', "name = '". $data['name'] ."'");

                    if ($isset > 0 && $data['name'] != $idEdit['name']) {
                        $_SESSION['error'] = 'Tên sản phẩm đã bị trùng';
                    } else {
                        if ($_FILES['thunbar']['name'] != NULL)
                        {
                            $fileName = timeNow(). '_'.$_FILES['thunbar']['name'];
                            $data['thunbar'] = $fileName;
                            $dataname = $_FILES["thunbar"]["tmp_name"]. ROOT .'product/'. $fileName;
    
                            // move image from ram temp to forder upload
                            move_uploaded_file($_FILES["thunbar"]["tmp_name"], ROOT.'product/'. $fileName);
                            $idProduct = $db->insert('product', $data);
                        }
                        
                        // Update in db.
                        $id_Edit = $db->update('product', $data, array("id" => $id));
                        // update scuess. Get message suceess redirect to list product.
                        if (isset($id_Edit))
                        {
                            $_SESSION['success'] = 'Cập nhật thành công';
                            redirectAdmin('product');
                        } else {
                            $_SESSION['error'] = 'Dữ liệu không thay đổi';
                        }
                    }
                } else {
                    $_SESSION['error'] = 'Dữ liệu không thay đổi';
                    redirectAdmin('product');
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
                Cập nhật sản phẩm
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li>
                    <i></i>  <a href="">Danh mục</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i>Sửa sản phẩm
                </li>
            </ol>
            <?php if(isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error'])?>
                </div>
            <?php endif ?>
        </div>
    </div>
    <!-- /.row -->

    <form enctype="multipart/form-data" class="form-horizontal" action="" method="POST">
        <div class="form-group">
            <label class="col-sm-2 control-label">Danh mục sản phẩm</label>
            <div class="col-sm-8">
                    <select name="category_id" class="form-control">
                        <option value="">--- Xin mời bạn chọn danh mục cho sản phẩm ---</option>
                        <?php foreach($category as $key => $value): ?>
                            <option value="<?php echo $value['id'] ?>"
                                <?php checkSelected($value, $idEdit, 'id', 'category_id') ?>><?php echo $value['name']?>
                            </option>
                        <?php endforeach ?>
                    </select>
                <?php if (isset($errors['category_id'])): ?>
                    <p class="text-danger"><?php echo $errors['category_id'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="name" value="<?php echo $idEdit['name'] ?>" placeholder="Tên Sản Phẩm">
                <?php if (isset($errors['name'])): ?>
                    <p class="text-danger"><?php echo $errors['name'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Giá sản phẩm</label>
            <div class="col-sm-8">
                <input class="form-control currency" type="number" name="price" value="<?php echo $idEdit['price'] ?>" placeholder="9.000.000">
                <?php if (isset($errors['price'])): ?>
                    <p class="text-danger"><?php echo $errors['price'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Giảm giá</label>
            <div class="col-sm-3">
                <input class="form-control" type="number" name="sale" value="<?php echo $idEdit['sale'] ?>" value="0">
                <?php if (isset($errors['sale'])): ?>
                    <p class="text-danger"><?php echo $errors['sale'] ?></p>
                <?php endif ?>
            </div>
            <label class="col-sm-1 control-label">Hình ảnh</label>
            <div class="col-sm-3">
                <input type="file" name="thunbar" class="form-control" accept="image/x-png,image/gif,image/jpeg" />
                <span id="show-name-img">
                    <?php echo (isset($idEdit['thunbar']) != NULL) ? $idEdit['thunbar'] : '' ?>
                </span>
                <?php if (isset($errors['thunbar'])): ?>
                    <p class="text-danger"><?php echo $errors['thunbar'] ?></p>
                <?php endif ?>
            </div>
                <img id="choose-file" src="<?php echo '/../../../public/uploads/product/2019_01_02_16_01_18_del04.jpg' ?>" alt="">
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nội dung</label>
            <div class="col-sm-8">
                <textarea name="content" class="form-control" rows="4"><?php echo $idEdit['content'] ?></textarea>
                <?php if (isset($errors['content'])): ?>
                    <p class="text-danger"><?php echo $errors['content'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-success">Lưu</button>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('[type="file"]').onchange = changeEventHandler;
    },false);

    function changeEventHandler(event) {
        document.getElementById('show-name-img').innerHTML = ''; 
    }
</script>