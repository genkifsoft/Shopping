<?php
    require_once __DIR__."/autoload/autoload.php";

    if (isset($_POST['comment'])&& $_POST['comment'] != '') {
        $data = [
            'time' => timeNowComment(),
            'user_id' => $_SESSION['id'],
            'id_product' => $_POST['id_product'],
            'name_img' => substr($_SESSION['name'], 0, 1),
            'content_comment' => $_POST['comment'],
        ];
        $comment = $db->insert('comment', $data);
    }

    header('Location: /chi-tiet-san-pham.php?id='. $_POST['id_product']);
?>