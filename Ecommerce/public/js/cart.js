$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.default-cart-content').hide();
    $('.add-second').hide();

    // calculate discount if the product has
    function price(price, discount=0)
    {
        return price - (price*discount/100);
    }
    // Get cart items
    $.ajax({
        type: "GET",
        url: config.routes.getCarts,
        success: function (response) {
            if (response.carts.length !== 0) {
                // Update cart count
                $('.cart-items-length').text(response.carts.length);
                $('.cart-item-count-badge').text(response.carts.length);
                // Display cart items
                $.each(response.carts, function (key, cart) {
                    $.each(cart.products, function (key, product) {
                        $.each(product.media, function (key, media){
                            $('.cart-media-list').prepend('\
                                    <div class="media align-items-center" id="grandparent" data-id="cart_'+cart.id+'">' +
                                    '<img class="d-block rounded mr-1 cart-item-image" src=\"'+media.original_url+'\" alt="donuts" width="62">\
                                    <div class="media-body"  id="parent">\
                                        <form method="post" action="'+ config.routes.destroy + "/" + cart.id + '"' + ' id="delete-item">\
                                           <input type="hidden" name="cart-item-price" value="'+(cart.discount > 0 ? price(cart.price, cart.discount):cart.price)+'" />\
                                           <input type="hidden" name="cart-product-id" value="'+cart.product_id+'" />\
                                            <i class="ficon cart-item-remove" id="remove-cart-item" data-feather="trash"></i>\
                                        </form>\
                                        <div class="media-heading">\
                                            <h6 class="cart-item-title"><a class="text-body" href="'+ config.routes.details + "/" + cart.product_id+'"> '+product.name+'</a></h6><small class="cart-item-by">By E-Commerce</small>\
                                        </div>\
                                        <h5>$<span class="cart-item-price">'+(cart.discount > 0 ? price(cart.price, cart.discount):cart.price)+'</span></h5>\
                                    </div>\
                                </div>\
                            ');
                        })
                    })
                });
            } else {
                $('.cart-item-count-badge').hide();
                $('.cart-items-length').text(0);
                $('.default-cart-content').show();
            }
        }
    });

    // Total price counter
    var array = [];
    var total = 0;
    setTimeout(function(){
        $('.cart-item-price').each(function (){
            array.push(parseInt($(this).text(), 10));
        })

        $.each(array, function() {
            total += parseInt(this, 10);
        });

        $('.total-price').html(total);
    }, 500);

    // Add to cart
    $( "form[id=add-item-to-cart]" ).on( "submit", function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        $(this).children('.add-second').show();
        $(this).children('.add-first').hide();
        $.ajax({
            type: "POST",
            url: url,
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                $.each(response.medias, function (key, media) {
                    $('.cart-media-list').prepend('\
                            <div class="media align-items-center" id="grandparent" data-id="cart_'+response.cart.id+'">' +
                            '<img class="d-block rounded mr-1 cart-item-image" src=\"'+media.original_url+'\" alt="donuts" width="62">\
                            <div class="media-body"  id="parent">\
                                <form method="post" action="'+config.routes.destroy + "/" + response.cart.id + '"' + ' id="delete-item">\
                                    <input type="hidden" name="cart-item-price" value="'+(response.cart.discount > 0 ? price(response.cart.price, response.cart.discount):response.cart.price)+'" />\
                                    <input type="hidden" name="cart-product-id" value="'+response.cart.product_id+'" />\
                                    <i class="ficon cart-item-remove" id="remove-cart-item" data-feather="trash"></i>\
                                </form>\
                                <div class="media-heading">\
                                    <h6 class="cart-item-title"><a class="text-body" href="'+ config.routes.details + "/" + response.cart.product_id+'">'+response.cart.products[0].name+'</a></h6>\
                                    <small class="cart-item-by">By E-Commerce</small>\
                                </div>\
                                <h5>$<span class="cart-item-price">'+(response.cart.discount > 0 ? price(response.cart.price, response.cart.discount):response.cart.price)+'</span></h5>\
                            </div>\
                        </div>\
                    ');
                });
                feather.replace();
                $('.cart-item-count-badge').show(); // Show item counter badge
                $('.default-cart-content').hide();  // Hide default cart content
                cartItemIncrement(); // Increase items' counter
                $('.total-price').html(parseInt($('.total-price').html(), 10)+parseInt(response.cart.price), 10); // Increase total counter
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "100",
                    "hideDuration": "200",
                    "timeOut": "1000",
                    "extendedTimeOut": "200",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "hide"
                };  // Display success toastr message at the top right of the page
                toastr.success(response.message);
                // console.log($('.cart-items-length').html());
            },
        });
    });

    // Delete item from cart
    $('.cart-media-list').on("click", "#delete-item", function(e) {
        e.preventDefault();
        var grandparent = $(this).closest('#grandparent');  // Get the closest div element of the cart item
        var removedItemPrice = $(this).find("input[name='cart-item-price']").val();
        var url = $(this).attr('action');
        $.ajax({
            type: "DELETE",
            url: url,
            cache: false,
            success: function (response) {
                grandparent.remove();   // Remove cart item's grandparent div element
                cartItemDecrement();    // Cart items counter
                $('.total-price').html($('.total-price').html()-removedItemPrice);  // Decrement total price
                // Show default cart content and hide item counter badge
                if( $('.cart-items-length').html() < 1){
                    $('.default-cart-content').show();
                    $('.cart-item-count-badge').hide();
                }
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "100",
                    "hideDuration": "200",
                    "timeOut": "1000",
                    "extendedTimeOut": "200",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "hide"
                };   // Display success toastr message at the top right of the page
                toastr.success(response.message);
            }
        });
    });

    function cartItemIncrement()
    {
        var cartCount = parseInt($('.cart-items-length').html());
        $('.cart-items-length').html(cartCount+1);
        $('.cart-item-count-badge').html(cartCount+1);
    }

    function cartItemDecrement()
    {
        var cartCount = parseInt($('.cart-items-length').html());
        $('.cart-items-length').html(cartCount-1);
        $('.cart-item-count-badge').html(cartCount-1);
    }
});
