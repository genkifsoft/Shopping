<?php
    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../autoload/autoload.php";
    require_once __DIR__."/../layouts/header.php";

?>

    <!-- Page Heading Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Xin chào bạn đến với trang quản trị của admin
                <small>Subheading</small>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
            </ol>
        </div>
    </div>
    <?php 
        require_once __DIR__."/layout.php";
    ?>
    <!-- /.row -->
<?php
    /**
     * Required filed footer
     * __DIR__ C:\xampp\htdocs\Shopping\admin\modules
     */
    require_once __DIR__."/../layouts/footer.php";
?>