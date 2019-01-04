<?php session_start();
    unset($_SESSION['name']);
    unset($_SESSION['id']);
    echo "<script>location.href='index.php'</script>";
    
?>