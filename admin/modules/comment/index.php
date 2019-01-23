<?php
    $open = 'comment';
    require_once __DIR__."/../../autoload/autoload.php";
    require_once __DIR__."/../../layouts/header.php";

    if (isset($_POST['search'])) {
        $data = [
            'sort' => $_POST['sort'],
            'date' => $_POST['date'],
            'content' => $_POST['content'],
            'user' => $_POST['user'],
        ];
        $db->search('comment', $data);
        die;
    }

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
    
    $sql = "SELECT `comment`.*, product.name as product_name, users.`name` as user_name, product.thunbar as thunbar
                FROM `comment`
            LEFT JOIN product ON `comment`.id_product = product.id
            LEFT JOIN users ON `comment`.user_id = users.id";

    $comment = $db->fetchJone('comment', $sql, $page, 10, true);

    if ($comment['page'] < $page) {
        $_SESSION['error'] ="Page này không tồn tại";
        $sotrang = 0 ;
    }

    if ($comment['page'])
    {
        $sotrang = $comment['page'];
        unset($comment['page']);
    }
?>
    
    <!-- Page Heading Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh Sách Bình Luận
                <a href="add.php" class="btn btn-sm btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url() ?>/admin/moduls">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Bình luận
                </li>
            </ol>
        </div>
    </div>
    
    <!-- Required file notification. Messgae success or failse -->
    <?php require_once __DIR__."/../../../partials/notification.php" ?>

    <div class="row">
        <div class="table-responsive">
        <div class="col-md-12 pull-right div-search">
            <!-- search comment -->
            <form action="" class="form-search" method="POST">

                <div class="row col-md-2">
                    <div class="form-group">
                        <select class="form-control" name="sort" id="exampleFormControlSelect1">
                            <option value="0">Sắp xếp</option>
                            <option value="1">Tăng dần</option>
                            <option value="2">Giảm dần</option>
                        </select>
                    </div>
                </div>

                <div class="row col-md-2">
                    <input class="form-control" type="date" name="date" style="float:left">
                </div>
                <div class="row col-md-5">
                    <input class="form-control" type="text" placeholder="Tìm kiếm theo nội dung" name="content" style="float:left">
                </div>
                <div class="row col-md-3">
                    <input class="form-control" type="text" placeholder="Tìm kiếm theo người dùng" name="user" style="float:left">
                </div>
                <div class="row col-md-1">
                    <input type="submit" value="Search" name="search" class="btn btn-sm btn-info button-search" style="float:left">
                </div>
            </form>
        </div>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên nguời dùng</th>
                    <th>Sản phẩm</th>
                    <th>Thời gian bình luận</th>
                    <th>Nội dụng bình luận</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comment as $key => $value): ?>
                    <tr id="row-product-<?php echo $value['id'] ?>">
                        <td class="center-column"><?php echo $key +1 ?></td>
                        <td class="center-column"><?php echo $value['user_name'] ?></td>
                        <td class="center-column">
                            <img src="<?php echo ROOT.'product/'.$value['thunbar'] ?>">
                        </td>
                        <td class="center-column"><?php echo date_parse($value['time'])['day'] .'/'. date_parse($value['time'])['month'] . '/' . date_parse($value['time'])['year']?></td>
                        <td class="center-column"><?php echo $value['content_comment'] ?></td>
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