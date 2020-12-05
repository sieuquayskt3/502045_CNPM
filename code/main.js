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
function createVoucher(){
    console.log("createVoucher run");
}