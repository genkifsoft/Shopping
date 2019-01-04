<?php session_start();
    /**
     * Required file database and function
     * File autoload is gobal.
     */
    require_once __DIR__."/../libraries/Database.php";
    require_once __DIR__."/../libraries/Function.php";

    $db = new Database;
    
    define('ROOT',$_SERVER['DOCUMENT_ROOT'].'/public/uploads/');

    $category = $db->fetchAll('category');

    $sqlProductNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";
    $product = $db->fetchSql($sqlProductNew);

?>