$(document).ready(function (){
    var activeImages = $('.active');
    $('.thumbnail').on('mouseover', function(){
        if (activeImages.length > 0){
            activeImages[0].removeClass('active');
        }

        $(this).addClass('.active');
        $('#main-image').attr("src", $(this).attr('src'));
    })

    var buttonRight = $('#slideRight');
    var buttonLeft = $('#slideLeft');

    buttonLeft.click(function(){
        $('#slider').animate( { scrollLeft: '-=180' }, 1000, "swing" );
    });

    buttonRight.click(function(){
        $('#slider').animate( { scrollLeft: '+=180' }, 1000, "swing" );
    });
});
