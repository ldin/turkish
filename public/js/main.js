$(document).ready(function(){

	jQuery(function(){

	jQuery(".gallery").jCarouselLite({
			btnNext: ".next",
			btnPrev: ".prev",
			mouseWheel: true
		});

	});

   // menu
    var $menu = $("#menu");
    var $header = $('.js-header-block');

    $(window).scroll(function(){
        var height = $header.height();
        if ( $(this).scrollTop() > height ){
            $menu.addClass("fixed");
        } else if($(this).scrollTop() <= height && $menu.hasClass("fixed")) {
            $menu.removeClass("fixed");
        }
    });	

    //loc link
    $('.loc').on('click', function() {
        // console.log($(this).data('link'));
        document.location.replace($(this).data('link') );
    });

    $('#menu ul li ul li.active');
     // console.log($('#menu ul li ul li.active').parent().addClass('active'))

    function openForm(that){
    	//console.log(55, that);
    }

});	