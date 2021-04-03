$(document).ready(function(){
    amount_items();

    $(".btn-add").click(function(){
        let product = $(this).attr('product-ID');
        let name = $(this).attr('product-name');
        let image = $(this).attr('product-img');
        let price  = $(this).attr('product-price');

        add_item(product, name, image, price);
    });
});



function amount_items() {
    let products = JSON.parse(localStorage.getItem('car'));
    
    if(products != null){
        $('#total_items').text(products.length);
	}
}

function add_item(product, name, image,price) {
    let products = JSON.parse(localStorage.getItem('car'));
    let item = [];


    if(products == null) {
        item.push({
            'product': product,
            'name': name,
            'img': image,
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
                'name': name,
                'img': image,
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

    /* if you use a table for show products then call function [show_car_items_table()] */
    show_car_items_card();
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

/** When use a table for show products */
function show_car_items_table() {
    let products = JSON.parse(localStorage.getItem('car'));

    $("#table-content").html("");
    let tr = '';

    if(products != null) {
        for(let i=0; i<products.length; i++){
            tr = `
                <tr>
                    <td scope="row">${products[i]['img']}</td>
                    <td>${products[i]['product']}</td>
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
                <td scope="row" colspan="5" class="text-warning"> No hay productos en el carrito</td>
            </tr>
        `;
        $("#table-content").append(tr)
    }

    total_car(products);
}

/** When use cards for show products */
function show_car_items_card() {
    let products = JSON.parse(localStorage.getItem('car'));

    $("#products-list").html("");
    let li = '';

    if(products != null) {
        for(let i=0; i<products.length; i++){
            li = `
				<li class="media">
                    <img class="mr-3 ml-3" src="/assets/img/${products[i]['img']}"  width="100px" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-3">${products[i]['name']}</h5>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <span class="mt-4">Precio: $${products[i]['price']} MXN </span>
                            </div>
                            <div class="col-12 col-md-6">
                                <span class="mt-4">Total: $${products[i]['total']} MXN </span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12 col-md-6">
                                <span class="mt-2">Cantidad <input class="amount_item text-center" type="number" value="${products[i]['amount']}" product = "${products[i]['product']}"> </span>
                            </div>
                            <div class="col-12 col-md-6 mb-2">
                                <span> <button class ="btn btn-outline-danger btn-delete" product = "${products[i]['product']}"><i class="far fa-trash-alt"></i></button> </span>
                            </div>
                        </div>
                    </div>
                </li>
            `;
            $("#products-list").append(li)
        }
    } else {
        let li = `
            <li class="media">
                <img class="mr-3 ml-3" src="/assets/img/carritoVacio.png"  width="100px" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-3 text-danger">No hay productos </h5>
                    <p>Por favor agregue productos a su carrito.</p>
                </div>
            </li>
        `;
        $("#products-list").append(li)
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
