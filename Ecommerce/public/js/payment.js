$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let stripe = Stripe(config.routes.stripe)
let elements = stripe.elements()
let style = config.routes.style
let card = elements.create('card', {style: style, hidePostalCode: true});
card.mount('#card-element');
let paymentMethod = null;
$('.card-form').on('submit', function () {
    $(this).find('.pay-now').attr('disabled', true)
    if (paymentMethod) {
        return true
    }
    stripe.confirmCardSetup(
        config.routes.intent,
        {
            payment_method: {
                card: card,
                billing_details: {
                    email: 'my@gmail.com',
                    name: $('.card_holder_name').val(),
                    phone: '+995555324234',
                    address: {
                        city: 'Tbilisi',
                        state: 'Saburtalo',
                        country: 'GE',
                        postal_code: '1232',
                    }
                }
            }
        }
    ).then(function (result) {
        if (result.error) {
            $('#card-errors').text(result.error.message)
            $('button.pay-now').removeAttr('disabled')
        } else {
            paymentMethod = result.setupIntent.payment_method
            $('.payment-method').val(paymentMethod)
            Swal.fire({
                title: 'Payment was successful!!',
                text: 'Thanks for your purchase!',
                icon: 'success',
                showConfirmButton: false,
                timer: 5000,
            })
            orderDetails();
            orderAddress();
            $('.card-form').submit();
        }
    })
    return false
});

function orderAddress (){
    var fullname = $('input[name=fullname]').val();
    var email = $('input[name=email]').val();
    var mobile = $('input[name=mobile]').val();
    var country = $('input[name=country]').val();
    var city = $('input[name=city]').val();
    var zipcode = $('input[name=zipcode]').val();
    var aptnumber = $('input[name=aptnumber]').val();
    var landmark = $('input[name=landmark]').val();
    $.ajax({
        type: "POST",
        url: config.routes.orderAddress,
        data: {fullname: fullname, email: email, mobile: mobile, country: country, city: city, zipcode: zipcode, aptnumber: aptnumber, landmark: landmark},
    });
}

function orderDetails (){
    var productIdsArray = [];
    var discountArray = [];
    var qtyArray = [];
    var prArray = [];

    $('input[name=checkout-product-id]').each(function (){
        productIdsArray.push(parseInt($(this).val()));
    })

    $('input[name=checkout-item-price]').each(function (){
        prArray.push(parseInt($(this).val()));
    })

    $('input[name=checkout-item-quantity]').each(function (){
        qtyArray.push(parseInt($(this).val()));
    })

    $('input[name=checkout-item-discount]').each(function (){
        discountArray.push(parseInt($(this).val()));
    })
    $.ajax({
        type: "POST",
        url: config.routes.orderDetails,
        data: {product_ids: productIdsArray, price: prArray, quantity: qtyArray, discount: discountArray},
        success: function (response) {
            // return true;
        },
    });
}
