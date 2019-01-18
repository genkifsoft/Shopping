if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

// get cart
function ready() {
    var removeContainer = document.getElementsByClassName('btn-danger');
    for(let i = 0; i < removeContainer.length; i++) {
        let itemRemove = removeContainer[i];
        itemRemove.addEventListener('click', removeCart)
        updateCart();
    }
    changed();
}

function removeCart(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
}

function changed() {
    var itemData = document.getElementsByClassName('row-cart');
    for(let i = 0; i < itemData.length; i++) {
        let item = itemData[i];
        item.addEventListener('change', changeInput);
    }
}

function changeInput(event) {
    let input = event.target;
    if (isNaN(input.value) || input.value < 1 || input.value > 1000) {
        input.value = 1;
    } else {
        updateCart();
    }
}

// update cart
function updateCart() {
    var cartData = document.getElementsByClassName('cart-items')[0];
    var itemData = cartData.getElementsByClassName('row-cart');
    let sale = document.getElementById('sale').innerText.replace('%', '');
    
    let totalPrice = 0;
    if (itemData.length > 0) {
        for(let i = 0; i < itemData.length; i++) {
            let item = itemData[i];
            let price = item.getElementsByClassName('price')[0].innerText.replace(/,/g, '');
            let quantity = item.getElementsByClassName('input-qty')[0].value;
            let totalItem = parseInt(quantity) * parseFloat(price);
            item.getElementsByClassName('total-item')[0].innerHTML = totalItem.toLocaleString('de-DE');

            let vat = totalItem * 10 / 100;
            totalPrice += totalItem - (totalItem * parseInt(sale) / 100) - vat;
    
            let formatTotal = formatter.format(totalPrice).toString();
                document.getElementById('total-product')
                    .innerHTML = '<h5 style="color:#FF0000; float:right">'+ formatTotal +'</h5>';
        }
    } else {
            document.getElementById('total-product')
                .innerHTML = '<h5 style="color:#FF0000; float:right">0 đ</h5>';
    }
}


const formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'VND',
    minimumFractionDigits: 0
})
