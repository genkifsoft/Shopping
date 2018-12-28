<?php
    $open = 'category';

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";


    $id = intval(getInput('id'));
    var_dump($id);
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
        }
    }
   
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>

    <!-- Page Heading Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Thêm mới danh mục
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
        </div>
    </div>
    <!-- /.row -->

   <form class="form-horizontal" action="" method="POST">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="category" id="category" value="<?php echo $idEdit['name'] ?>" placeholder="Tên Danh Mục">
                <?php if (isset($errors['name'])): ?>
                    <p class="text-danger"><?php echo $errors['name'] ?></p>
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