$(function () {

    let txtbox = $("#text-quantity");

    $("#button-quantity-minus").click(function () {
        if(parseInt(txtbox.val())>1){
            txtbox.val(parseInt(txtbox.val())-1);
        } else{
            txtbox.val(1);
        }
    });

    $("#button-quantity-plus").click(function () {
        txtbox.val(parseInt(txtbox.val())+1);
        console.log(txtbox.val());
    });

});