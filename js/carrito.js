$(document).ready(function(){
    amount_items();

    $(".btn-add").click(function(){
        let product = $(this).attr('idProducto');
        let price  = $(this).attr('precioProducto');

        add_item(product, price);
    });
});



function amount_items() {
    let products = JSON.parse(localStorage.getItem('car'));
    
    if(products != null){
        $('#total_items').text(products.length);
	}
}

function add_item(product, price) {
    let products = JSON.parse(localStorage.getItem('car'));
    let item = [];


    if(products == null) {
        item.push({
            'product': product,
            'amount': 1,
            'price': price,
            'total': price
            });
           
        products = item;
    } else {
           
        let index_item = exist_item(products, product);

        if(index_item) {
            products[index_item]['amount'] = products[index_item]['amount'] + 1;
            products[index_item]['total'] = parseFloat(products[index_item]['price']) * parseFloat(products[index_item]['amount']) 
        } else {
            item = {
                'product': product,
                'amount': 1,
                'price': price,
                'total': price
            };

            products.push(item);
        }
    }

    window.localStorage.setItem('car', JSON.stringify(products));

    amount_items();
    
    alert("Producto agregado")


}


function exist_item(products, product) {
    for (let index in products) 
    {
        if(products[index]['product'] == product) {
            return index
        }
    }
}
