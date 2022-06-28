$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // // Submit order address and order details after payment
    // $('.pay-now').on('click',function(){
    //     console.log($('input[id=payment_error]').val());
    //     orderDetails();
    //     orderAddress();
    // });
    //
    // function orderAddress (){
    //     var fullname = $('input[name=fullname]').val();
    //     var email = $('input[name=email]').val();
    //     var mobile = $('input[name=mobile]').val();
    //     var country = $('input[name=country]').val();
    //     var city = $('input[name=city]').val();
    //     var zipcode = $('input[name=zipcode]').val();
    //     var aptnumber = $('input[name=aptnumber]').val();
    //     var landmark = $('input[name=landmark]').val();
    //     $.ajax({
    //         type: "POST",
    //         url: config.routes.orderAddress,
    //         data: {fullname: fullname, email: email, mobile: mobile, country: country, city: city, zipcode: zipcode, aptnumber: aptnumber, landmark: landmark},
    //         success: function () {
    //             $(".errors").empty();
    //             $(".alert-danger").hide();
    //         },
    //         error: function(response) { // handle the error
    //             $(".errors").empty();
    //             $.each(response.responseJSON.errors, function (key, message) {
    //                 $(".alert-danger").show();
    //                 $(".errors").append('<li>'+message+'</li>');
    //             });
    //         },
    //     });
    // }
    //
    // function orderDetails (){
    //     var productIdsArray = [];
    //     var discountArray = [];
    //     var qtyArray = [];
    //     var prArray = [];
    //     var paymentError = $('input[id=payment_error]').val();
    //
    //     $('input[name=checkout-product-id]').each(function (){
    //         productIdsArray.push(parseInt($(this).val()));
    //     })
    //
    //     $('input[name=checkout-item-price]').each(function (){
    //         prArray.push(parseInt($(this).val()));
    //     })
    //
    //     $('input[name=checkout-item-quantity]').each(function (){
    //         qtyArray.push(parseInt($(this).val()));
    //     })
    //
    //     $('input[name=checkout-item-discount]').each(function (){
    //         discountArray.push(parseInt($(this).val()));
    //     })
    //     $.ajax({
    //         type: "POST",
    //         url: config.routes.orderDetails,
    //         data: {product_ids: productIdsArray, price: prArray, quantity: qtyArray, discount: discountArray,  error: paymentError},
    //         success: function (response) {
    //             // return true;
    //
    //         },
    //     });
    // }

 // count total price with or without discount
    var array = [];
    var total = 0;
        $('input[name=checkout-item-price]').each(function (){
            array.push(parseInt($(this).val()));
        })
    // Sum of prices (total)
        $.each(array, function() {
            total += parseInt(this);
        });
        // Assign total price
    $('#checkout-total-price').html(total);

    // Increment price
    $('.plus').click(function (){
        var totalPrice = $('#checkout-total-price').text();
        var id = $(this).siblings("input[name=item-id]").val();
        var wrapper = $('#cart-item-wrapper-'+id);
        var price = wrapper.find("input[name=item-price]").val();

        // Disable plus button
        var qty = parseInt($(this).siblings('.quantity').html());
        qty++;
        if(qty > 10) {
            $(this).style.cursor('no-drop');
        }

        $(this).siblings('.quantity').html(qty);
        wrapper.find("input[name=checkout-item-quantity]").val(qty);
        $(this).siblings('input[name=item-quantity]').val(qty);
        var newPrice = price*qty;

        $('#checkout-price-'+id).html(newPrice);
        wrapper.find("input[name=checkout-item-price]").val(newPrice);
        var total = parseInt(totalPrice)+parseInt(price);
        $('#checkout-total-price').text(total);
        $("input[id=checkout-total-price]").val(total);
        $("span#checkout-total-price").text(total)
    });

    // Decrement price
    $('.minus').click(function (){
        var totalPrice = $('#checkout-total-price').text();
        var id = $(this).siblings("input[name=item-id]").val();
        var wrapper = $('#cart-item-wrapper-'+id);
        var price = wrapper.find("input[name=item-price]").val();
        var qty = parseInt($(this).siblings('.quantity').html());
        qty--;

        // Disable minus button
        if(qty === 0) {
            $(this).siblings('.minus').style.cursor('no-drop');
        }

        $(this).siblings('.quantity').html(qty);
        wrapper.find("input[name=checkout-item-quantity]").val(qty);
        var newPrice = price*qty;
        $('#checkout-price-'+id).html(newPrice);
        wrapper.find("input[name=checkout-item-price]").val(newPrice);
        var total = parseInt(totalPrice)-parseInt(price);
        $('#checkout-total-price').text(total);
        $("span#checkout-total-price").text(total)
    });

    // Remove cart item from checkout list
    $('.remove-wishlist').click(function (){
        var totalPrice = $('#checkout-total-price').text();
        var id = $(this).siblings("input[name=item-id]").val();
        var price = $('#checkout-price-'+id).text();
        var total = parseInt(totalPrice)-parseInt(price);
        $('#checkout-total-price').text(total);
    });
});
