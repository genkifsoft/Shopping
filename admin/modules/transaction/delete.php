<?php

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";

    $id = $_POST['id'];

    /**
     * check category exits prpduct
     */

    if (empty($id))
    {
        echo 'Dữ liệu không tồn tại';
    } else {
        $delete = $db->delete('transaction', $id);
        $message = 'Xóa thành công';
        echo $message;
    }
   
?>
