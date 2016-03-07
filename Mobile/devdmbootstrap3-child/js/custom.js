jQuery(document).ready(function($){

$('#nav').affix({
      offset: {
        top: $('header').height()
        
      }
});	


/************************/

        //only enable drop down hover when the mobile menu isn't displayed
        var $window = $(window);

        function checkWidth() {
            var windowsize = $window.width();
            if (windowsize > 767) {

      
            
            
             $(".dropdown").hover(            
            function() {
               // $('.dropdown-menu', this).stop( true, true ).fadeIn("fast");
                $(this).toggleClass('open');
                $('span', this).toggleClass("caret caret-up");                
            },
            function() {
               // $('.dropdown-menu', this).stop( true, true ).fadeOut("fast");
                $(this).toggleClass('open');
                $('span', this).toggleClass("caret caret-up");                
            });
            
            
            }
        }
        // Execute on load
        checkWidth();
        // Bind event listener
        $(window).resize(checkWidth);

/* ================================================ */

$('#myDate').datepicker({
        dateFormat : 'dd.mm.yy',
        changeMonth: true,
		changeYear: true,
		yearRange: "1920:2016"
    });

/* ================================================ */

/*! jQuery script to hide certain form fields */

	//Hide the field initially
	$("#hide1").hide();

	//Show the text field only when the third option is chosen - this doesn't
	
	//$("input[name='radio-70']:checked").on('change',function()) {
		
			//if($("input:radio[data-name='sollen abgebucht werden']").is(":checked")) {
			
			//if($("input[name='radio-70']:checked").val('sollen abgebucht werden')) 
			

$('input[type=radio][name=radio-70]').change(function() {
        if (this.value == 'sollen abgebucht werden') {
            //alert("abbuchen");
             $("#hide1").show();
        }
        else if (this.value == 'werde ich auf das folgende Konto überweisen') {
             $("#hide1").hide();
        }
    });



  /* ================ Portfolio Filterable IsoTope. ================ */
	
		var $container = $('#grid').isotope({
			layoutMode: 'fitRows'
		});
				
		
		$('#filters').on( 'click', 'button', function(e) {
			e.preventDefault();
			var filterValue = $(this).attr('data-filter');
			$container.isotope({ filter: filterValue });
			var $this = $(this);
			if ( $this.parent().hasClass('active') ) {
				return false;
			}
			var $optionSet = $this.parents('#filters');
			$optionSet.find('.active').removeClass('active');
			$this.parent().addClass('active');
		});

    // My coding
   


 
 
// filter items when filter link is clicked
$('#filters a').click(function()
{
$('#filters a.active').removeClass('active');
var selector = $(this).attr('data-filter');
$container.isotope({ filter: selector, animationEngine : "css" });
$(this).addClass('active');
return false;
 
});

$('#filters-select').on( 'change', function() 
{
$('#filters-select option.active').removeClass('active');
var selector = this.value;

$container.isotope({ filter: selector, animationEngine : "css" });

$('option:selected').addClass('active');
return false;
 
});



////////////////////NEEUUUUUUUUUUU
/* */
 var $container = $('#grid');
    $container.isotope({
        filter: '*',
        animationOptions: {
            duration: 750,
            easing: 'linear',
            queue: false
        }
    });

    $('#filters').on( 'click', 'button', function(e) {
			e.preventDefault();
        $('#filters .current').removeClass('current');
        $(this).addClass('current');

        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'linear',
                queue: false
            }
         });
         return false;
        }); 
  

//============================================

$('body').scrollspy({ target: '#navbar-ex' })


$(window).scroll(function() {
  if ($(document).scrollTop() > 22) {
    $('nav#topnav').addClass('shrink');
    
    $('.scroll-to-content').fadeOut("slow");
  } else {
    $('nav#topnav').removeClass('shrink');
     $('.scroll-to-content').fadeIn("slow");
  }
});


/**/
// Smooth scrolling anchor links
	function ea_scroll( hash ) {
		var target = $( hash );
		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		if (target.length) {
			var top_offset = 0;
			if ( $('#nav.affix').css('position') == 'fixed' ) {
				top_offset = $('#nav').height();
			}
			if( $('body').hasClass('admin-bar') ) {
				top_offset = top_offset + $('#wpadminbar').height();
			}
			 $('html,body').animate({
				 scrollTop: target.offset().top - 35
			}, 1000);
			return false;
		}
	}
	// -- Smooth scroll on pageload
	if( window.location.hash ) {
		ea_scroll( window.location.hash );
	}
	// -- Smooth scroll on click
	$('a[href*=#]:not([href=#]):not(.no-scroll)').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') || location.hostname == this.hostname) {
			ea_scroll( this.hash );
		}
	});




$(".scroll-to-content").on('click', function(e) {
   e.preventDefault();
   $('html, body').animate({
        scrollTop: $("#scrolltarget").offset().top-200
     }, 600);
     
   
});


//==============================


  /*
   $('.rueden-slider').slick();  
   
     jquery('#rueden-slider').owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
*/
	
/*+++++++++++++++++++++++++++++++++++++++*/	



});



	
   