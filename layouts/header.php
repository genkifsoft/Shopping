<?php
    require_once __DIR__."/../autoload/autoload.php";

    $sql = "SELECT * FROM product WHERE 1 ORDER BY id DESC LIMIT 3";
    $newProduct = $db->fetchsql($sql);
    $sqlPay = "SELECT * FROM `product` WHERE 1 ORDER BY pay DESC LIMIT 3";
    $productPay = $db->fetchsql($sqlPay);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Shopping</title>
        <!-- <meta charset="utf-8"> -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/bootstrap.min.css">
        <script  src="<?php echo base_url() ?>public/frontend/js/jquery-3.2.1.min.js"></script>
        <script  src="<?php echo base_url() ?>public/frontend/js/bootstrap.min.js"></script>
        <!---->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/slick-theme.css"/>
        <!--slide-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/frontend/css/style.css">
        <script src="<?php echo base_url() ?>public/backend/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <div id="wrapper">
        <!--HEADER-->
        <div id="header">
            <div id="header-top">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-6" id="header-text">
                            <a>Quy Dang</a><b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do </b>
                        </div>
                        <div class="col-md-6">
                            <nav id="header-nav-top">
                                <ul class="list-inline pull-right" id="headermenu">
                                    <?php if(!isset($_SESSION['name'])): ?>
                                        <li>
                                            <a href="dang-ky.php"><i class="fa fa-unlock"></i> Đăng ký</a>
                                        </li>
                                        <li>
                                            <a href="dang-nhap.php"><i class="fa fa-lock"></i> Đăng nhập</a>
                                        </li>
                                    <?php else : ?>
                                        <li style="color:red">Xin chào: <?php echo $_SESSION['name'] ?></li>
                                        <li>
                                            <a href=""><i class="fa fa-user"></i> Tài khoản <i class="fa fa-caret-down"></i></a>
                                            <ul id="header-submenu">
                                                <li><a href="">Contact</a></li>
                                                <li><a href="">Cart</a></li>
                                                <li><a href="../session.php"><i class="fa fa-share-square-o"></i> Thoát</a></li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row" id="header-main">
                    <div class="col-md-5">
                        <form class="form-inline">
                            <div class="form-group">
                                <label>
                                    <select name="category" class="form-control">
                                        <option> All Category</option>
                                        <option> Dell </option>
                                        <option> Hp </option>
                                        <option> Asuc </option>
                                        <option> Apper </option>
                                    </select>
                                </label>
                                <input type="text" name="keywork" placeholder=" input keywork" class="form-control">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a href="">
                        <img src="images/logo-default.png">
                        </a>
                    </div>
                    <div class="col-md-3" id="header-right">
                        <div class="pull-right">
                            <div class="pull-left">
                                <i class="glyphicon glyphicon-phone-alt"></i>
                            </div>
                            <div class="pull-right">
                                <p id="hotline">HOTLINE</p>
                                <p>0986420994</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--END HEADER-->
        <!--MENUNAV-->
        <div id="menunav">
            <div class="container">
                <nav>
                    <div class="home pull-left">
                        <a href="index.php">Trang chủ</a>
                    </div>
                    <!--menu main-->
                    <ul id="menu-main">
                        <li>
                            <a href="">Shop</a>
                        </li>
                        <li>
                            <a href="">Mobile</a>
                        </li>
                        <li>
                            <a href="">Contac</a>
                        </li>
                        <li>
                            <a href="">Blog</a>
                        </li>
                        <li>
                            <a href="">About us</a>
                        </li>
                    </ul>
                    <!-- end menu main-->
                    <!--Shopping-->
                    <ul class="pull-right" id="main-shopping">
                        <li>
                            <a href="<?php echo base_url()?>gio-hang.php"><i class="fa fa-shopping-basket"></i> My Cart </a>
                        </li>
                    </ul>
                    <!--end Shopping-->
                </nav>
            </div>
        </div>
        <!--ENDMENUNAV-->
        <div id="maincontent">
        <div class="container">
        <div class="col-md-3  fixside" >
            <div class="box-left box-menu" >
                <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                <!-- <ul>
                    <li>
                        <a href="">Máy tính  <span class="badge pull-right">14</span></a>
                        <ul>
                            <li><a href=""> Sonny 1</a></li>
                            <li><a href=""> Sonny 2</a></li>
                            <li><a href=""> Sonny 3</a></li>
                            <li><a href=""> Sonny 4</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Máy giặt  <span class="badge pull-right">14</span></a>
                        <ul>
                            <li><a href=""> Sonny 1</a></li>
                            <li><a href=""> Sonny 2</a></li>
                            <li><a href=""> Sonny 3</a></li>
                            <li><a href=""> Sonny 4</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="">Đồ điện  <span class="badge pull-right">14</span></a>
                    </li>
                    <li>
                        <a href=""> Thiết bị văn phòng  <span class="badge pull-right">14</span> </a>
                        <ul>
                            <li><a href=""> Sonny 1</a></li>
                            <li><a href=""> Sonny 2</a></li>
                            <li><a href=""> Sonny 3</a></li>
                            <li><a href=""> Sonny 4</a></li>
                        </ul>
                    </li>
                </ul> -->
                <ul>
                    <?php foreach($category as $item): ?>
                        <li><a href="/danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo strtoupper($item['name']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="box-left box-menu">
                <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mới </h3>
                <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                <!-- <ul>
                    <li class="clearfix">
                        <a href="">
                            <img src="images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                            </div>
                        </a>
                    </li>
                    <li class="clearfix">
                        <a href="">
                            <img src="images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>                                            
                            </div>
                        </a>
                    </li>
                    <li class="clearfix">
                        <a href="">
                            <img src="images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                            </div>
                        </a>
                    </li>
                    <li class="clearfix">
                        <a href="">
                            <img src="images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                            </div>
                        </a>
                    </li>
                </ul> -->
                <ul>
                    <?php foreach ($newProduct as $key => $value) : ?>
                        <li class="clearfix">
                            <a href="">
                                <img src="public/uploads/product/<?php echo $value['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                <div class="info pull-right">
                                    <p class="name"><?php echo $value['name'] ?></p >
                                    <b class="price"><?php echo $value['price'] ?></b><br>
                                    <b class="sale"><?php echo $value['sale'] ?></b><br>
                                    <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    
                </ul>
                <!-- </marquee> -->
            </div>
            <div class="box-left box-menu">
                <h3 class="box-title"><i class="fa fa-warning"></i>  Sản phẩm mua nhiều nhất </h3>
                <!--  <marquee direction="down" onmouseover="this.stop()" onmouseout="this.start()"  > -->
                <ul>
                    <?php foreach($productPay as $item): ?>
                    <li class="clearfix">
                        <a href="/chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                            <img src="public/uploads/product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"> <?php echo $item['name'] ?></p >
                                <b class="price"><?php echo $item['price'] ?></b><br>
                                <b class="sale"><?php echo $item['sale'] ?>%</b><br>
                                <span class="view"><i class="fa fa-eye">&nbsp;</i><?php echo $item['view'] ?>&nbsp;

                                <i id="<?php echo $item['id'] ?>" class="fa fa-heart-o like-buy-most">&nbsp;</i><?php echo $item['like'] ?></span>
                            </div>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    <!-- <li class="clearfix">
                        <a href="">
                            <img src="images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>                                            
                            </div>
                        </a>
                    </li>
                    <li class="clearfix">
                        <a href="">
                            <img src="images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                            </div>
                        </a>
                    </li>
                    <li class="clearfix">
                        <a href="">
                            <img src="images/16-270x270.png" class="img-responsive pull-left" width="80" height="80">
                            <div class="info pull-right">
                                <p class="name"> Loa  mới nhất 2016  Loa  mới nhất 2016 Loa  mới nhất 2016</p >
                                <b class="price">Giảm giá: 6.090.000 đ</b><br>
                                <b class="sale">Giá gốc: 7.000.000 đ</b><br>
                                <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                            </div>
                        </a>
                    </li> -->
                </ul>
                <!-- </marquee> -->
            </div>
        </div>
<script>
    var itemLike = document.getElementsByClassName('like-buy-most');
    console.log(itemLike);
    for (let i = 0; i < itemLike.length; i++) {
        $item = itemLike[i];
        $item.addEventListener('click', function(e) {
            e.preventDefault();
            $attributeID = $item.attributes[0].value;

            console.log('cutString',$attributeID);
        })
    }
    
</script>