$(document).ready(function(){
    amount_items();

    $(".btn-add").click(function(){
        let product = $(this).attr('product-ID');
        let price  = $(this).attr('product-price');

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
    
    ohSnap('Producto agregado', {color: 'green', duration:'2000',icon:'fas fa-check-circle'});

}


function update_car(product, amount) {
    let products = JSON.parse(localStorage.getItem('car'));
    let index_product = exist_item(products, product);

    if(index_product) {
        products[index_product]['amount'] = amount;
        products[index_product]['total'] = parseFloat(products[index_product]['price']) * parseFloat(amount) 
        
        window.localStorage.setItem('car', JSON.stringify(products));
    }

    show_car_items();
}

function delete_product(product) {
    let products = JSON.parse(localStorage.getItem('car'));
    let index_product = exist_item(products, product);

    if(index_product) {

        let product_deleted = products.splice(index_product, 1);  

        if(products.length == 0){
            localStorage.removeItem('car');
        } else {
            window.localStorage.setItem('car', JSON.stringify(products));
        }
        
        return true;
    } else {
        return false;
    }

}

function show_car_items() {
    let products = JSON.parse(localStorage.getItem('car'));

    $("#table-content").html("");
    let tr = '';

    if(products != null) {
        for(let i=0; i<products.length; i++){
            tr = `
                <tr>
                    <td scope="row">${products[i]['product']}</td>
                    <td><input class="amount_item" type="number" value = "${products[i]['amount']}" product = "${products[i]['product']}"> </td>
                    <td>${products[i]['price']}</td>
                    <td>${products[i]['total']}</td>
                    <td> <button class ="btn btn-outline-danger btn-delete" product = "${products[i]['product']}"><i class="far fa-trash-alt"></i></button>  </td>
                </tr>
            `;
            $("#table-content").append(tr)
        }
    } else {
        let tr = `
            <tr>
                <td scope="row" colspan="5" class="text-primary"> No hay productos en el carrito</td>
            </tr>
        `;
        $("#table-content").append(tr)
    }

    total_car(products);
}



function exist_item(products, product) {
    for (let index in products) 
    {
        if(products[index]['product'] == product) {
            return index
        }
    }
}

function total_car(products){
    let total = 0;

    for(let i in products){
        total = parseFloat(products[i]['total']) + parseFloat(total) 
    }

    localStorage.setItem('total_car', total);

    let total_car = $("#total_car");
    total_car.text("$"+localStorage.getItem('total_car'));


}
