<?php
    $open = 'category';

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";


    $id = intval(getInput('id'));
    $idEdit = $db->fetchID('category', $id);
  
    if (empty($idEdit))
    {
        $_SESSION['error'] = 'Dữ liệu không tồn tại';
        redirectAdmin('category');
    } else {

        /**
         * When submit form
         * 
         * Check filed in form have invalid
         */
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $data = [
                'name' => trim(postInput('category')),
                'slug' => to_slug(postInput('category')),
            ];

            $errors = [];
            if (postInput('category') == '')
            {
                $_SESSION['error'] = 'Bạn chưa nhập tên danh mục';
            }

            /**
             * If $errors == [];
             * Form submit valid. Insert data in table Category
             * 
             * param: $errors.
             */
            if (empty($errors))
            {
                if ($idEdit['name'] != $data['name']) {
                    $isset = $db->fetchOne('category', "name = '". $data['name'] ."'");
                    if ($isset > 0) {
                        $_SESSION['error'] = 'Tên danh mục đã bị trùng';
                    } else {
                        // Update in db.
                        $id_Edit = $db->update('category', $data, array("id" => $id));
    
                        // update scuess. Get message suceess redirect to list category.
                        if (isset($id_Edit))
                        {
                            $_SESSION['success'] = 'Cập nhật thành công';
                            redirectAdmin('category');
                        } else {
                            $_SESSION['error'] = 'Dữ liệu không thay đổi';
                        }
                    }
                } else {
                    $_SESSION['error'] = 'Dữ liệu không thay đổi';
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
                Cập nhật danh mục
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li>
                    <i></i>  <a href="">Danh mục</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i>Thêm mới
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

   <form class="form-horizontal" action="" method="POST">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="category" id="category" value="<?php echo $idEdit['name'] ?>" placeholder="Tên Danh Mục">
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