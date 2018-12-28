<?php
    $open = 'category';

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
            'name' => postInput('category'),
            'slug' => to_slug(postInput('category')),
        ];

        $errors = [];
        if (postInput('category') == '')
        {
            $errors['name'] = 'Bạn chưa nhập tên danh mục';
        }

        /**
         * If $errors == [];
         * Form submit valid. Insert data in table Category
         * 
         * param: $errors.
         */
        if (empty($errors))
        {
            $isset = $db->fetchOne('category', "name = '". $data['name'] ."'");
            if ($isset > 0)
            {
                $_SESSION['error'] = 'Tên danh mục đã tồn tại';
            } else {
                // Insert in db.
                $id_Category = $db->insert('category', $data);

                // insert scuess. Get message suceess redirect to list category.
                if (isset($id_Category))
                {
                    $_SESSION['success'] = 'Thêm danh mục thành công';
                    redirectAdmin('category');
                } else {
                    $_SESSION['error'] = 'Thêm danh mục thất bại';
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

   <form class="form-horizontal" action="" method="POST">
        <div class="form-group">
        
            <label class="col-sm-2 control-label">Danh mục sản phẩm</label>
            <div class="col-sm-8">
                    <select name="category" class="form-control">
                        <option value="">--- Xin mời bạn chọn danh mục cho sản phẩm ---</option>
                        <?php foreach($category as $key => $value): ?>
                            <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>
                        <?php endforeach ?>
                    </select>
                <?php if (isset($errors['product'])): ?>
                    <p class="text-danger"><?php echo $errors['category'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tên sản phẩm</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="product" placeholder="Tên Sản Phẩm">
                <?php if (isset($errors['product'])): ?>
                    <p class="text-danger"><?php echo $errors['product'] ?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Giá sản phẩm</label>
            <div class="col-sm-8">
                <input class="form-control" type="number" name="price" id="price" placeholder="9.000.000">
            </div>
            <?php if (isset($errors['price'])): ?>
                <p class="text-danger"><?php echo $errors['price'] ?></p>
            <?php endif ?>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Giảm giá</label>
            <div class="col-sm-3">
                <input class="form-control" type="number" name="sale" id="sale" value="0">
            </div>
            <?php if (isset($errors['sale'])): ?>
                <p class="text-danger"><?php echo $errors['sale'] ?></p>
            <?php endif ?>
            <label class="col-sm-1 control-label">Hình ảnh</label>
            <div class="col-sm-3">
                <input type="file" name="thunbar" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Nội dung</label>
            <div class="col-sm-8">
                <textarea name="content" class="form-control" rows="4"></textarea>
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