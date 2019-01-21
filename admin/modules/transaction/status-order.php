<?php
    require_once __DIR__."/../../autoload/autoload.php";

    $id = $_GET['id'];
    
    // lay id transaction
    // dua id transaction get ra all san pham trong order va lay qty
    // cap nhat product va so luong
    
    $sql = "SELECT product_id, qty FROM orders WHERE transaction_id = $id";
    $order = $db->fetchsql($sql);

    foreach($order as $item)
    {
        $product = $db->fetchID('product', $item['product_id']);
        $update = $db->update('product',
                                array('number' => $product['number'] - $item['qty'], array('pay' => $product['pay']+1)),
                                array('id' => $product['id']));
    }

    if ($id) {
        $data = [
            'status' => 1,
        ];
        $update = $db->update('transaction', $data, array('id'=> $id));
        header('Location: index.php');
    }

?>


<!-- array(2) {
  [0]=>
  array(7) {
    ["id"]=>
    string(1) "1"
    ["transaction_id"]=>
    string(2) "16"
    ["product_id"]=>
    string(1) "1"
    ["qty"]=>
    string(1) "1"
    ["price"]=>
    string(8) "12000000"
    ["created_at"]=>
    NULL
    ["updated_at"]=>
    NULL
  }
  [1]=>
  array(7) {
    ["id"]=>
    string(1) "2"
    ["transaction_id"]=>
    string(2) "16"
    ["product_id"]=>
    string(1) "2"
    ["qty"]=>
    string(1) "1"
    ["price"]=>
    string(8) "14000000"
    ["created_at"]=>
    NULL
    ["updated_at"]=>
    NULL
  }
} -->
