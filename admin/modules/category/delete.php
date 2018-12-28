<?php

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";

    $id = $_POST['id'];
    $idDelete = $db->fetchID('category', $id);

    if (empty($idDelete))
    {
        echo 'Dữ liệu không tồn tại';
    } else {
        $delete = $db->delete('category', $id);
        $message = '';
        $delete > 0 ? $message = 'Xóa thành công' : $message = 'Xóa thất bại';
        echo $message;
    }
   
?>
