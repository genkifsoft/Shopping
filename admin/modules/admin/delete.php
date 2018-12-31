<?php

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";

    $id = $_POST['id'];
    $idDelete = $db->delete('admin', $id);

    /**
     * check category exits prpduct
     */

    if (empty($idDelete))
    {
        echo 'Dữ liệu không tồn tại';
    } else {
        $delete = $db->delete('admin', $id);
        $message = 'Xóa thành công';
        echo $message;
    }
   
?>
