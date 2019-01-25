<?php
    require_once __DIR__."/autoload/autoload.php"; 
    require_once __DIR__."/layouts/header.php";

    if (isset($_GET['code']) && isset($_GET['email'])) {
        
        $email = trim($_GET['email']);
        $code  = trim($_GET['code']);
        $sql = "SELECT * FROM users WHERE email = '". $email ."' LIMIT 1";
        
        $record = $db->fetchsql($sql);
        $emailExpire = $record[0]['time_expire'];
        if ($emailExpire >= time()) {
            $update = $db->update('users', array('times_comfirm' => 1), array('id' => $record[0]['id']));
        } else {
            echo "<script>alert('Bạn đã hết hạn thời gian kích hoạt tài khoản! Vui lòng tạo lại tài khoản mới');location.href='dang-ky.php'</script></script>";
        }
    }
    
?>
