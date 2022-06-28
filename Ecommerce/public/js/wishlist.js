$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.wishlist-count-badge').hide();

    // Show default empty wishlist image
    function showEmptyWishlist(){
        $('.empty-wishlist').html('' +
            '<div class="col-8 offset-2">\n' +
            '   <img class=" rounded mr-1 d-block mx-auto" src="/cart-media/wishlist.png" alt="donuts" width="510px" height="530px">\n' +
            '   <div class="text-center"><h1 class="mt-2 text-danger">Your Wishlist Is Empty</h1></div>\n' +
            '</div>');
    }

    $.ajax({
        type: "GET",
        url: config.routes.getWishlists,
        success: function (response) {
            if(response.wishlists > 0){
                $('.empty-wishlist').empty();  // Hide default navbar wishlists content
                $('.wishlist-count-badge').show(); // Show item counter badge
                $('.wishlist-count-badge').html(response.wishlists); // Set length of wishlist items
            } else {
                showEmptyWishlist();
            }
        },
    })

    // Add to wishlists
    $( "form[id=add-item-to-wishlist]" ).on( "submit", function(e) {
        e.preventDefault();
        var url = $(this).attr('action');
        var form = $(this);
        $.ajax({
            type: "POST",
            url: url,
            data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                form.find('#wishlist').replaceWith('<button type="submit" class="btn btn-light" id="wishlist"> <i class="mr-1 wishlist-exists" data-feather="heart"></i>Product added</button>');
                form.find('.wishlist-exists').addClass('text-danger');
                $('.wishlist-count-badge').show(); // Show item counter badge
                var wishlistCount = parseInt($('.wishlist-count-badge').html());
                $('.wishlist-count-badge').html(wishlistCount+1);
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "100",
                    "hideDuration": "100",
                    "timeOut": "2000",
                    "extendedTimeOut": "200",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "show",
                    "hideMethod": "hide"
                };  // Display success toastr message at the top right of the page
                toastr.success(response.message);
                feather.replace();
            },
        });
    });

    // Delete item from cart
    $( "form[id=wishlist-remove]" ).on( "submit", function(e) {
        e.preventDefault();
        var removedItemWrapperDiv = $(this).parents('.wishlist-remove');  // Get the closest div element of the cart item
        var url = $(this).attr('action');
        $.ajax({
            type: "DELETE",
            url: url,
            cache: false,
            success: function (response) {
                removedItemWrapperDiv.remove();
                // Decrement wishlist count badge
                var wishlistCount = parseInt($('.wishlist-count-badge').html());
                $('.wishlist-count-badge').html(wishlistCount-1);
                // Hide wishlist badge
                if($('.wishlist-count-badge').html() < 1) {
                    showEmptyWishlist();
                    $('.wishlist-count-badge').hide();
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
});
