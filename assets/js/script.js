$(document).ready(function() {
	$('.menu-toggle').on('click', function(){
		$('.nav').toggleClass('showing');
		$('.nav ul').toggleClass('showing');
	});



	$('.post-wrapper').slick({
  		slidesToShow: 3,
  		slidesToScroll: 1,
  		autoplay: true,
  		autoplaySpeed: 2000,
  		nextArrow: $('.next'),
  		prevArrow: $('.prev'),

  		responsive: [
  			{
      			breakpoint: 5000,
      			settings: {
        			slidesToShow: 4,
        			slidesToScroll: 4,
        			infinite: true,
        			dots: true
      			}
    		},
    		{
      			breakpoint: 1360,
      			settings: {
        			slidesToShow: 3,
        			slidesToScroll: 3,
        			infinite: true,
        			dots: true
      			}
    		},
    		{
      		breakpoint: 750,
      			settings: {
        			slidesToShow: 2,
        			slidesToScroll: 2
      			}
    		},
    		{
      			breakpoint: 560,
      			settings: {
        			slidesToShow: 1,
        			slidesToScroll: 1
      			}
    		}
  		]
	});
});


