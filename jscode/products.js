const data = {
    userId: $('#userId').val()
};
var productList = new Map();
var vendorsList = new Map();
var uproductId = null; //for updation
var details = {};
const loadProducts = () => {
    $.ajax({
        url: url + 'getProducts.php',
        type: 'POST',
        dataType: 'json',
        data: data,
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    productList.set(response.Data[i].productId, response.Data[i]);
                }
                showProducts(productList);
            }
        }
    });
}

const showProducts = productList => {
    var tblData = '';
    for (let k of productList.keys()) {
        let products = productList.get(k);
        tblData += '<tr><td>' + products.productTitle + '</td>';
        tblData += '<td><img src="img/users/1.jpg" class="table-user-thumb" alt=""></td>';
        tblData += '<td>' + products.price + '</td>';
        tblData += '<td>' + products.GST + '</td>';
        tblData += '<td>' + products.videoUrl + '</td>';
        tblData += '<td>' + products.details + '</td>';
        tblData += '<td><div class="table-actions">';
        tblData += '<a href="#" onclick="editProduct(' + (k) + ')"><i class="ik ik-edit-2"></i></a>';
        tblData += '<a href="#" class="list-delete" onclick="removeProduct(' + (k) + ')"><i class="ik ik-trash-2"></i></a>';
        tblData += '</div></td></tr>';
    }
    $('.productsData').html(tblData);
    $('.products').dataTable({
        searching: true,
        retrieve: true,
        bPaginate: $('tbody tr').length > 10,
        order: [],
        columnDefs: [{ orderable: false, targets: [0, 1, 2, 3, 4, 5, 6] }],
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'excel', 'pdf'],
        destroy: true
    });
}
loadProducts();

const loadVendors = () => {
    $.ajax({
        url: url + 'getAllVendors.php',
        type: 'POST',
        dataType: 'json',
        success: function(response) {
            if (response.Data != null) {
                const count = response.Data.length;
                for (var i = 0; i < count; i++) {
                    vendorsList.set(response.Data[i].userId, response.Data[i]);
                }
            }
        }
    });
}
loadVendors(); //for dropdown list
const editProduct = productId => {
    productId = productId.toString();
    if (productList.has(productId)) {
        $('.productlist').hide();
        $('#newproduct').load('edit_product.php');
        const product = productList.get(productId);
        uproductId = productId;
        details = product;
    }
}

const removeProduct = productId => {
    productId = productId.toString();
    if (productList.has(productId)) {


    }
}

function addProduct() {
    $('.productlist').hide();
    $('#newproduct').load('add_product.php');
}

function goback() {
    $('#newproduct').empty();
    $('.productlist').show();
}