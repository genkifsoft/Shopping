<?php require_once __DIR__."/autoload/autoload.php"; ?>
<?php require_once __DIR__."/layouts/header.php"; ?>
    <div class="col-md-9 bor">
        <section class="box-main1">
            <h3 class="title-main"><a href="">Giỏ hàng</a> </h3>
            <table class="table table-hover" id="shopping-cart">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Tổng tiền</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="cart-items">
                    <?php $stt = 1; $totalPrice = 0; foreach ($_SESSION['cart'] as $key => $value) : ?>
                        <tr class="row-cart">
                            <td><?php echo $stt ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><img src="public/uploads/product/<?php echo $value['thunbar'] ?>" class="imge-cart"></td>
                            <!-- onblur=emptyInput(event)  -->
                            <td>
                                <input type="number" min="1" class="form-control input-qty" value="<?php echo $value['qty'] ?>">
                            </td>

                            <td class="price"><?php echo formatNumber($value['price']) ?></td>

                            <td class="total-item"><?php echo formatNumber($value['price'] * $value['qty']) ?></td>
                            <td>
                                <button class="btn btn-xs btn-danger"><i class="fa fa-remove"></i> Remove</button>
                                <button class="btn btn-xs btn-info"><i class="fa fa-refresh"></i> Update</button>
                            </td>
                        </tr>
                    <?php $stt++; $totalPrice += $value['price'] * $value['qty']; $_SESSION['tongtien'] = $totalPrice; endforeach; ?>
                </tbody>
            </table>
            <div class="col-md-5 pull-right">
                <ul class="list-group">
                    <li class="list-group-item">
                        <h3>Thông tin đơn hàng</h3>
                    </li>
                    <li class="list-group-item">
                        <span class="badge">
                            <?php echo  formatNumber($_SESSION['tongtien']) ?>
                        </span>Số tiền
                    </li>
                    <li class="list-group-item">
                        <span id="sale" class="badge">
                            <?php echo  sale($_SESSION['tongtien']) ?> %
                        </span>Giảm giá
                    </li>
                    <li class="list-group-item">
                        <span class="badge">10 %</span>Thuế VAT
                    </li>
                    <li class="list-group-item">
                        <span id="total-product">
                        <?php $_SESSION['total'] = $_SESSION['tongtien'] * 100 / 100; echo formatNumber($_SESSION['total']) ?>
                        </span> Tổng thanh toán
                    </li>
                </ul>
            </div>
        </section>
    </div>
<?php require_once __DIR__."/layouts/footer.php"; ?>

<!-- <script>
    $(document).ready(function() {
        if (document.readyState == 'loading') {
            document.addEventListener('DOMContentLoaded', ready)
        } else {
            loading();
        }

       // get all class of item
        $('.btn-danger').click(function() {
            var rowCart = document.getElementsByClassName('row-cart');
            $(this).parent().parent().remove();
            // get all item product after when deleted
            calculatorTotalPrice(rowCart);
        });

        // create variable and loop earch item. check earch item listen event click
        function calculatorTotalPrice(data) {
            var totalProduct = 0;
            // total product exits in card.
            for (var i = 0; i < data.length; i++) {
                let priceItem = document.getElementsByClassName('total-item')[i].innerHTML.replace(/,/g,'');//'/,/g' find all , repalce ''
                totalProduct += parseFloat(priceItem);
            }
            let formatTotal = formatter.format(totalProduct).toString();
            document.getElementById('total-product')
                .innerHTML = '<strong>Total</strong>:&nbsp<h5 style="color:#FF0000; float:right">'+ formatTotal +'</h5>';
        }

        function loading() {
            var quantityInputs = document.getElementsByClassName('input-qty');
            // duyet array item. Lang nghe su kien change earch item
            for(let i = 0; i < quantityInputs.length; i++) {
                let input = quantityInputs[i];
                input.addEventListener('change', quantityChanged);
            }

            console.log('quantity', quantityInputs)
        }

        function quantityChanged(event) {
            let data = event.target;
            if (isNaN(data.value || data.value < 0)) {
                data.value = 1;
            } else {
                var rowCart = document.getElementsByClassName('row-cart');
                calculatorTotalPrice(rowCart)
            }
        }
            
    })

    function emptyInput(event) {
        let dataInput = event.target.value;
        if (dataInput != '') {
            console.log(dataInput);
        } else {
            var data = document.getElementsByClassName('row-cart');
            for(let i = 0; i < data.length; i++) {
                let that = data[i];
                $(that).find('td').each(function(index, item) {
                    if (index == 3) {
                        // let thot = item;
                        console.log(item);
                      
                    }
                });
                
                // let item = data[i].document.getElementsByClassName('input-qty');
                // console.log('data', data[i].getAttribute('input-qty');
            }
        }
    }

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'VND',
        minimumFractionDigits: 0
    })
</script> -->

                