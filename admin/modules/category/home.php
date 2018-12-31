<?php
    $open = 'category';

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";


    $id = intval(getInput('id'));
    $editCategory = $db->fetchID('category', $id);
  
    if (empty($editCategory))
    {
        $_SESSION['error'] = 'Dữ liệu không tồn tại';
        redirectAdmin('category');
    } else {
        $home = $editCategory['home'] == 1 ? 0 : 1;
        $update = $db->update('category', array('home'=> $home), array('id'=>$id));
        if ($update > 0)
        {
            $_SESSION['success'] = 'Cập nhật thành công';
            redirectAdmin('category');
        } else {
            $_SESSION['error'] = 'Cập nhật thất bại';
            redirectAdmin('category');
        }
    }
   
?>
<?php require_once __DIR__."/../../layouts/header.php"; ?>

<?php

    /**
     * Required filed footer
     * __DIR__ C:\xampp\htdocs\Shopping\admin\modules
     */
    require_once __DIR__."/../../layouts/footer.php";
?>