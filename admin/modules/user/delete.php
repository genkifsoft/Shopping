<?php

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";

    $id = $_POST['id'];
    $idDelete = $db->delete('users', $id);

    /**
     * check category exits prpduct
     */

    if (empty($idDelete))
    {
        echo 'Dữ liệu không tồn tại';
    } else {
        $delete = $db->delete('users', $id);
        $message = 'Xóa thành công';
        echo $message;
    }
   
?>
