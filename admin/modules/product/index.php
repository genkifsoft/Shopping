<?php
    $open = 'product';

    if (isset($_GET['page']))
    {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";
    require_once __DIR__."/../../layouts/header.php";
    
    $sql = "SELECT product.* FROM product LEFT JOIN category ON product.category_id = category.id";

    $product = $db->fetchJone('product', $sql, $page, 10, true);
    if ($product['page'] < $page) {
        $_SESSION['error'] ="Page này không tồn tại";
        $sotrang = 0 ;
    }

    if ($product['page'])
    {
        $sotrang = $product['page'];
        unset($product['page']);
    }
?>
    
    <!-- Page Heading Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh Sách Sản phẩm
                <a href="add.php" class="btn btn-sm btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>/admin/moduls">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Sản phẩm
                </li>
            </ol>
        </div>
    </div>
    
    <!-- Required file notification. Messgae success or failse -->
    <?php require_once __DIR__."/../../../partials/notification.php" ?>

    <div class="row">
        <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Giảm giá</th>
                    <th>Hình ảnh</th>
                    <th>Nội dung</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($product as $key => $value): ?>
                    <tr id="row-product-<?php echo $value['id'] ?>">
                        <td class="center-column"><?php echo $key +1 ?></td>
                        <td class="center-column"><?php echo $value['name'] ?></td>
                        <td class="center-column"><?php echo $value['price'] ?></td>
                        <td class="center-column"><?php echo $value['sale'] ?></td>
                        <td class="center-column">
                            <img src="<?php echo ROOT.'product/'.$value['thunbar'] ?>">
                        </td>
                        <td class="center-column"><?php echo $value['content'] ?></td>
                        <td class="center-column"><?php echo $value['created_at'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $value['id'] ?>">
                                <button type="button" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>Sửa</button>
                            </a>
                            <a class="click-delete" id="<?php echo $value['id'].'_'.$value['name'] ?>" >
                                <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-times"></i>Xóa</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <div class="pull-right">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if($page > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page-1 ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    <?php for($i = 1; $i <= $sotrang; $i++): ?>
                        <li class="page-item <?php echo $i == $page ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
                        </li>
                    <?php endfor; ?>
                    <?php if($page < $sotrang) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $page+1 ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
    </div>
<?php

    /**
     * Required filed footer
     * __DIR__ C:\xampp\htdocs\Shopping\admin\modules
     */
    require_once __DIR__."/../../layouts/footer.php";
?>
<script type="text/javascript">
    /**
     * Function catch event click button delete.
     * data reponse is an string.   
     */
    $(".click-delete").click(function(){
        var data = $(this).attr("id");
        let id = data.substring(0, data.search('_'));
        let name = data.substring(data.search('_') + 1, length.data);
        
        if(confirm(`Bạn có chắc chắn xóa danh mục ${name}?`))
        {
            $.ajax({
               url: `delete.php`,
               type: 'POST',
               data: {id: id},
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#row-product-"+id).remove();
                    $("#message").remove();
                    alert(data);
               }
            });
        }
    });

</script>