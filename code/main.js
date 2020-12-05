// shopping cart
function convertPrice(n){
    if(n<999){
        return n;
    }
    let result = n.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g,'$1.');
    return result+'đ';
}

function changePrice(o){
    let inputID = o.id;
    let priceID = 'price'+inputID;
    let value = $('#'+inputID).val();

    let result = value*300000;
    let vnd = convertPrice(result);
    $('#'+priceID).html(vnd);
    // cập nhật tổng số tiền
    // let totalPrice = value + $('#'+totalPrice).html
    // $('#'+totalPrice).html(result);
}
// custom voucher
function generateVoucher(n){
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < n; i++ ) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

function createVoucher(){
    let number = $('#number').val();
    for (let i = 0; i<number; i++){
        let container = document.getElementById("voucherList");
        let node = document.createElement("li");
        let voucher = document.createTextNode(generateVoucher(8));
        node.appendChild(voucher);
        container.appendChild(node);
    }
}