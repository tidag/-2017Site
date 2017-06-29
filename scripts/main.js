$(document).ready(function(){
$('body').addClass('bfToggle');
var $menu = $('#menu'),
$menulink = $('.menuLink');

$menulink.click(function(){
	$menulink.toggleClass('active');
	$menu.toggleClass('active');
	return false;
});
// what happens when a menu link is clicked
$('#menu li a').click(function(evt){
	//  remove current from all links then add it to the selected link after 50 ms
	$('#menu li a').removeClass('currentNav');
	mytimer= setTimeout(function(){}, 50);
		$(this).addClass('currentNav');

// remove class to collapse menu once one item has been clicked
	$menu.removeClass('active');
	$menulink.removeClass('active');

	// smooth scroll to anchor + offset
		evt.preventDefault();
		var dest = $(this).attr('href');
		var finalPos=$(dest).offset().top;
		console.log(dest);
		$('html,body,a').animate({ scrollTop: finalPos-87 }, 'slow');

}); //closes click for li
// dynamic to Top button
         var offset = 20;
            var duration = 500;
            $(window).scroll(function() {
                if ($(this).scrollTop() > offset) {
                    $('.dynTop').fadeIn(duration);
                } else {
                    $('.dynTop').fadeOut(duration);
                }
            });
            $('.dynTop').click(function(evt) {
                evt.preventDefault();
                $('html, body').animate({scrollTop: 0}, duration);
               return false;
            });

						// accordian external
						$('.acc-title').click(function(evt){
						  evt.preventDefault();
							$(this).toggleClass('open');
						  $(this)
								.next('ol')
						    .not(':animated')
						    .slideToggle();
						});

						// accordian internal
						$('.acc-control').click(function(evt){
						  evt.preventDefault();
							$(this).toggleClass('open');
						  $(this)
						    .next('.panel')
						    .not(':animated')
						    .slideToggle();
						});

						// smooth scroll for all links
						// $('a').click(function(){
						// 	$(this).animate(scroll, duration);
						//}); click closing

						// validation tests
						$('#signup').validate(
		            {
		                // validate on focus out
		                onfocusout: function(element) {
		                    $(element).valid();
		                },

		                rules:{
		                    name:'required',
		                    email:{
		                        required:true,
		                        email:true
		                    },
												message:'required'
		                }, //closes rules

		                messages:{
		                    name:{
		                        required:"Please enter your First Last name "
		                    },//closes name message
		                    email:{
		                        required:"please enter your email",
		                        email:"this is not a valid email"
		                    }, //closes email message
		                    message:{
		                        required:"please write a short message"

		                    }
		                },//closes messages
		                errorPlacement:function(error,element){
		                    if(element.is(":radio")||element.is(":checkbox")){
		                        error.appendTo(element.parent());
		                    }else{
		                        error.insertAfter(element);
		                    }
		                }//end of error placement
		            });//end of validate

});//closes doc ready
