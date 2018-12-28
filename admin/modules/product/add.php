<?php
    $open = 'product';

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";

    // get all category
    $category = $db->fetchAll('category');

    /**
     * When submit form
     * 
     * Check filed in form have invalid
     */
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $data = [
            'category_id' => postInput('category_id'),
            'name'        => trim(postInput('name')),
            'slug'        => to_slug(trim(postInput('name'))),
            'price'       => trim(postInput('price')),
            'sale'        => trim(postInput('sale')),
            'content'     => trim(postInput('content')),
        ];

        $errors = [];
        postInput('category_id') == '' ? $errors['category_id'] = 'Bạn chưa chọn danh mục cho sản phẩm' : '';
        postInput('name')        == '' ? $errors['name']        = 'Bạn chưa nhập tên sản phẩm' : '';
        postInput('price')       == '' ? $errors['price']       = 'Bạn chưa nhập giá sản phẩm' : '';
        postInput('sale')        == '' ? $errors['sale']        = 'Bạn chưa nhập giảm giá' : '';
        postInput('content')     == '' ? $errors['content']     = 'Bạn chưa nhập mô tả cho sản phẩm' : '';

        if (empty($_FILES['thunbar']['name']))
        {
            $errors['thunbar'] = 'Bạn chưa chọn ảnh';
        }
        
        /**
         * If $errors == [];
         * Form submit valid. Insert data in table Category
         * 
         * param: $errors.
         */
        if (empty($errors))
        {
            $isset = $db->fetchOne('product', "name = '". $data['name'] ."'");

            if ($isset > 0)
            {
                $_SESSION['error'] = 'Tên sản phẩm đã tồn tại';
            } else {
                $fileName = timeNow(). '_'.$_FILES['thunbar']['name'];
                $data['thunbar'] = $fileName;
                $dataname = $_FILES["thunbar"]["tmp_name"]. ROOT .'product/'. $fileName;

                // move image from ram temp to forder upload
                move_uploaded_file($_FILES["thunbar"]["tmp_name"], ROOT.'product/'. $fileName);
                $idProduct = $db->insert('product', $data);
    
                // insert scuess. Get message suceess redirect to list product.
                if (isset($idProduct))
                {
                    $_SESSION['success'] = 'Thêm sản phẩm thành công';
                    redirectAdmin('product');
                } else {
                    $_SESSION['error'] = 'Thêm sản phẩm thất bại';
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
                Thêm mới sản phẩm
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_domain()?>/admin/modules">Dashboard</a>
                </li>
                <li>
                    <i></i>  <a href="">Sản phẩm</a>
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
            <label class="col-sm-2 control-label">Danh mục sản phẩm</label>
            <div class="col-sm-8">
                    <select name="category_id" class="form-control">
                        <option value="">--- Xin mời bạn chọn danh mục cho sản phẩm ---</option>
                        <?php foreach($category as $key => $value): ?>
                            <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
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
                <input type="text" class="form-control" name="name" placeholder="Tên Sản Phẩm">
                <?php if (isset($errors['name'])): ?>
                    <p class="text-danger"><?php echo $errors['name'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Giá sản phẩm</label>
            <div class="col-sm-8">
                <input class="form-control currency" type="number" name="price" id="price" placeholder="9.000.000">
                <?php if (isset($errors['price'])): ?>
                    <p class="text-danger"><?php echo $errors['price'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Giảm giá</label>
            <div class="col-sm-3">
                <input class="form-control" type="number" name="sale" value="0">
                <?php if (isset($errors['sale'])): ?>
                    <p class="text-danger"><?php echo $errors['sale'] ?></p>
                <?php endif ?>
            </div>
            <label class="col-sm-1 control-label">Hình ảnh</label>
            <div class="col-sm-3">
                <input type="file" name="thunbar" class="form-control" accept="image/x-png,image/gif,image/jpeg" />
                <?php if (isset($errors['thunbar'])): ?>
                    <p class="text-danger"><?php echo $errors['thunbar'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nội dung</label>
            <div class="col-sm-8">
                <textarea name="content" class="form-control" rows="4"></textarea>
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