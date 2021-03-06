<?php
    $open = 'category';

    /**
     * Required file autoload. File general
     * Database and funtion.
     */
    require_once __DIR__."/../../autoload/autoload.php";
    require_once __DIR__."/../../layouts/header.php";
    
    $category = $db->fetchAll('category');

?>
    
    <!-- Page Heading Content -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách danh mục
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Danh Mục
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
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Home</th>
                    <th>Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($category as $key => $value): ?>
                    <tr id="row-category-<?php echo $value['id'] ?>">
                        <td class="center-column"><?php echo $key +1 ?></td>
                        <td class="center-column"><?php echo $value['name'] ?></td>
                        <td class="center-column"><?php echo $value['slug'] ?></td>
                        <td class="center-column">
                            <a class="btn btn-xs <?php echo $value['home'] == 1 ? 'btn-info' : 'btn-warning' ?>" href="home.php?id=<?php echo $value['id'] ?>">
                                <?php echo $value['home'] == 1 ? 'Hiển thị' : 'Không'  ?>
                            </a>
                        </td>
                        <td class="center-column"><?php echo $value['created_at'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $value['id'] ?>"><button type="button" class="btn btn-xs btn-info"><i class="fa fa-edit"></i>Sửa</button></a>
                            <a class="click-delete" id="<?php echo $value['id'].'_'.$value['name'] ?>" ><button type="button" class="btn btn-xs btn-danger"><i class="fa fa-times"></i>Xóa</button></a>
                        </td>
                    </tr>
                <?php endforeach ?>

                <form action="export-csv.php" method="POST">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    <input type="submit" name="export-csv"  value="Export CSV" class="btn btn-sm btn-info" style="margin-bottom:5px">
                </form>
                <form action="export-csv.php" method="POST">
                    <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                    <input type="submit" name="export-xlsx"  value="Export Excel" class="btn btn-sm btn-success" style="margin-bottom:5px; margin-left:5px">
                </form>
                <form action="export-csv.php" method="POST">
                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                    <input type="submit" name="export-pdf"  value="Export Excel" class="btn btn-sm btn-warning" style="margin-bottom:5px; margin-left:5px">
                </form>
            </tbody>
        </table>
        <div class="pull-right">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                        <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                        <span class="sr-only">Next</span>
                        </a>
                    </li>
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
                    if (data != false) {
                        $("#row-category-"+id).remove();
                        $("#message").remove();
                        alert(data);
                    } else {
                        alert($message.DELETE_CATEGORY);
                    }
               }
            });
        }
    });

</script>