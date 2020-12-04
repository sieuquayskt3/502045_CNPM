// shopping cart
function convertPrice(n){
    //TODO tiếp tục
    if(n<100000){
        return n;
    }
    let result = '';
    let num = n.toString();
    console.log(num[-3]);
    while (n > 9999) {
        result += '.'+(n%10000); // 101854221 => .221 => .854.221
        //console.log(result);

        n = Math.floor(n/10000);
    }
    result = n+result;    // .854.221 => 101.854.221
    return result+'đ';
}
function changePrice(o){
    let inputID = o.id;
    let priceID = 'price'+inputID;
    let value = $('#'+inputID).val();
    let result = value*300000;
    $('#'+priceID).html(result);
    // cập nhật tổng số tiền
    // let totalPrice = value + $('#'+totalPrice).html
    // $('#'+totalPrice).html(result);
}
// custom voucher
function createVoucher(){
    console.log("createVoucher run");
}