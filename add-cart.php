<?php
    require_once __DIR__."/autoload/autoload.php"; 

    if (!isset($_SESSION['id']))
    {
        echo "<script>alert('Bạn nên đăng nhập rồi mới mua được sản phẩm'); location.href='index.php'</script>";
    }

    $id = intval($_GET['id']);
    $product = $db->fetchID('product', $id);
    
    // neu chua ton tai thi tao moi
    if ( ! isset($_SESSION['cart'][$id]))
    {
        $_SESSION['cart'][$id]['name']    = $product['name'];
        $_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
        $_SESSION['cart'][$id]['price']   = $product['price'];
        $_SESSION['cart'][$id]['qty']     = 1;
    } else {
        $_SESSION['cart'][$id]['qty']    += 1;
    }

    echo "<script>alert('Thêm sản phẩm thành công'); location.href='gio-hang.php'</script>";

?>