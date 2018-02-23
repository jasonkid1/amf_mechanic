// Toggle write a review
/*$(document).ready(function(){
    $("#switch-review").click(function(){
        $("#review-form").toggle(100);
    });
});*/

// Toggle hire now
$(document).ready(function(){
    $("#hire-now").click(function(){
        $("#show-contact").toggle(100);
    });
});

// Tooltip
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

 $.fn.stars = function() {
        return $(this).each(function() {

            var rating = $(this).data("rating");

            var numStars = $(this).data("numStars");

            var fullStar = new Array(Math.floor(rating + 1)).join('<i style="color:#FFD600" class="glyphicon glyphicon-star"></i>');

            var halfStar = ((rating%1) !== 0) ? '<i style="color:#FFD600" class="glyphicon glyphicon-star"></i>': '';

            var noStar = new Array(Math.floor(numStars + 1 - rating)).join('<i style="color:#FFD600" class="glyphicon glyphicon-star"></i>');

            $(this).html(fullStar + halfStar + noStar);

        });
    }

$('.stars').stars();