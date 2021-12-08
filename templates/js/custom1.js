  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','../templates/js/analytics.js','ga');

  ga('create', 'UA-43459544-1', '25.56.193.214');
  ga('send', 'pageview');
  
  function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
    return results == null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }  

  $(function() {
    updateNav(false);
    $('a[rel*=leanModal]').leanModal({ top : 200, closeButton: ".modal_close" });
    if ($.cookie("fb_pop") !=  '1') { setTimeout("fb_pop_component()", 4000); }  
    if (false && window.location.pathname == "/") {
        $("#loginInfo").trigger('click'); 
    } else if (getParameterByName("verification") == "success") {
        $("#verifyModal").trigger('click');     
    }
	
    $("#login").submit(function (i) {
        i.preventDefault();
        var f = $("#Username").val();
        var p = $("#Password").val();
        var g = "username=" + f +"&password=" + p;        
        var x = $("#login").children().eq(1).children().first().children().eq(1);
        x.text("{SERVER_MESSAGE}").css("color", "#444");
        $.ajax({
            type: "POST",
            url: "login.php",
            data: g,
            error: function (result) { $(".error").delay(1000).fadeIn(1000); console.log('Error: ' + result); },
            success: function (result) { console.log('Success: ' + result);          
                var obj = jQuery.parseJSON(result);
                if (obj.output == "success") {                   
                    updateNav(true);              
                    $(".modal_close").trigger('click');
                    if (window.location.pathname == "/") {          
                        var fv = obj.info;
                        $("object param[name='flashvars']").attr("value", fv);
                        $("embed").attr("flashvars", fv);

                        var flash = $("object");                        
                        $("object").remove();                        
                        $(".who").children().eq(1).html(flash);
                        
                        $(".progress-bar").children().eq(0).first().children().eq(0).text('Experiences ( '+obj.ExpPercentage+'% )');
                        $(".progress-bar").children().eq(0).first().children().eq(1).children().css("width", obj.ExpWidth + "px");
                        
                        $(".progress-bar").children().eq(1).first().children().eq(0).text('ClassPoints ( '+obj.CPPercentage+'% )');
                        $(".progress-bar").children().eq(1).first().children().eq(1).children().css("width", obj.CPWidth + "px");
                        
                        $(".choose").children().eq(1).first().children().eq(0).get(0).lastChild.nodeValue = "AdventureCoins: " + obj.Coins;
                        $(".choose").children().eq(1).first().children().eq(1).get(0).lastChild.nodeValue = "Golds: " + obj.Gold;
                        $(".choose").children().eq(1).first().children().eq(3).get(0).lastChild.nodeValue = "Total PvP Kills: " + obj.Kills;
                        $(".choose").children().eq(1).first().children().eq(3).get(0).lastChild.nodeValue = "Total PvP Deaths: " + obj.Deaths;
                        
                        $("#welcome").children().eq(2).slideDown();
                        $("#welcome").children().eq(3).slideDown();
                        $("#welcome").children().eq(4).slideDown();
                    }
					setTimeout("location.href='./?p=home'", 100);
                } else if (obj.output == "disabled") {    
                    x.html('Your account has been temporarily suspended.').css("color", "rgb(197, 74, 80)");
                } else {
                    x.html('The username and password you entered did not match. Please check the spelling and try again.').css("color", "rgb(197, 74, 80)");
                }     
            }
        });

        return false;
    });
  });
    
  function updateNav(bool) {
    if (bool) { $("#nav").children().eq(4).children().eq(1).html('<li><a href="/?forum=settings" id="menu_settings">Manage Settings</a></li><li><a href="/upgrade" id="menu_upgrade">Upgrade or Buy Coins</a></li><li><a href="/?logout" id="menu_access">Log Out</a></li>'); }
  }
       
  function fb_pop_component(){
    fb_pop_slide_in();

    $('#fb_box_check').click(function(){
        var fb_pop_check_status = $('#fb_pop_checked').is(':checked');
        if(fb_pop_check_status == true){    
            $.cookie('fb_pop', '1' ,{expires: 365});
        } else {
            $.cookie('fb_pop', '0');
        }
    })
    $('#fb_box_off').click(function(){
        var fb_pop_check_status = $('#fb_pop_checked').is(':checked');
        if(fb_pop_check_status == true){    
            fb_pop_slide_del();
        } else {
            fb_pop_slide_out();
        }
    })
  }

  function fb_pop_slide_out(){
    $('#fb_box_off_btn').css( 'opacity','0');
    $('#fb_pop').animate({ 'width': "0px", opacity: 1},700,'easeOutCubic');
    $('#fb_box').animate({ opacity: 0},700,'easeOutCubic');
  }

  function fb_pop_slide_del(){
    $('#fb_pop').animate({ 'width': "0px", opacity: 0},700,'easeOutCubic');
  }

  function fb_pop_slide_in(){
    $('#fb_pop').css( 'display','block').animate({ 'width':'100%', opacity: 1},700,'easeOutCubic');
    $('#fb_box').animate({ opacity: 1},700,'easeOutCubic');
    setTimeout(function() {
        $('#fb_box_off_btn').animate({ opacity: 1},700,'easeOutCubic');
    }, 700);
  }
  
$(document).ready(function(){
ddsmoothmenu.init({
	mainmenuid: "menu", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'navigation', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})
					   
});

$(document).ready(function(){
    $("input:checkbox, input:radio, input:file").uniform();
});

// add js class to html tag
$('html').addClass('js');

// Responsive Navigation Menu by SelectNav
jQuery(document).ready(function () {
  selectnav('nav', {
  label: '- Navigation Menu - ',
  nested: true,
  indent: '-'
});
});

// UItoTop plugin 
$(document).ready(function() {		
$().UItoTop({ easingType: 'easeOutQuart' });
});

// Flex Slider
(function($) {
  $(window).ready(function() {
  $('.flexslider').flexslider({
	animation: 'fade',
	animationLoop: true,             //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
	slideshow: true,                //Boolean: Animate slider automatically
	slideshowSpeed: 4500,           //Integer: Set the speed of the slideshow cycling, in milliseconds
	animationSpeed: 700,             //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
	pauseOnHover: true, 
	pauseOnAction:false,
	controlNav: true,
	directionNav: false,
	controlsContainer: '.flex-container'
		});
  
  $('.flexslider2').flexslider({
	animation: 'slide',
	animationLoop: true,             //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
	slideshow: true,                //Boolean: Animate slider automatically
	slideshowSpeed: 4500,           //Integer: Set the speed of the slideshow cycling, in milliseconds
	animationSpeed: 700,             //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
	pauseOnHover: true, 
	pauseOnAction:false,
	controlNav: false,
	directionNav: true,
	controlsContainer: '.flex-container'
		});
  
  $('.flexslider3').flexslider({
	animation: 'slide',
	animationLoop: true,             //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
	slideshow: false,                //Boolean: Animate slider automatically
	slideshowSpeed: 4500,           //Integer: Set the speed of the slideshow cycling, in milliseconds
	animationSpeed: 700,             //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
	pauseOnHover: true, 
	pauseOnAction:false,
	controlNav: false,
	directionNav: true,
	controlsContainer: '.flex-container'
		});
  
  
	});
})(jQuery)

// Carousel Slider

// Sliding Text and Icon Menu Style
$(function() {
	$('#sti-menu').iconmenu();
});

// Accordion
$(document).ready(function() {
    $("#accordion").accordion({
	   autoHeight: false,
	   icons: { "header": "plus", "headerSelected": "minus" }
	});
});

// Progress Bar
$(function() {
$(".meter > span").each(function() {
$(this)
	.data("origWidth", $(this).width())
	.width(0)
	.animate({
		width: $(this).data("origWidth")
	}, 1200);
});
});

// Alert Boxes
$(document).ready(function() {
// Closing notifications 
// this is the class that we will target
$(".hideit").click(function() {
//fades the notification out	
  $(this).fadeOut(600);});
});	

// Tooltips
$(document).ready(function(){

	/* Adding a colortip to any tag with a title attribute: */

	$('[data]').colorTip({color:'yellow'});

});

// Tabs
$(document).ready(function(){
$("#horizontal-tabs").tytabs({
  tabinit:"1",
  fadespeed:"fast"
  });
$("#horizontal-tabs.a").tytabs({
  tabinit:"1",
  prefixtabs:"taba",
  prefixcontent:"contenta",
  fadespeed:"fast"
  });
$("#horizontal-tabs.b").tytabs({
  tabinit:"1",
  prefixtabs:"tabb",
  prefixcontent:"contentb",
  fadespeed:"fast"
  });
$("#horizontal-tabs.c").tytabs({
  tabinit:"1",
  prefixtabs:"tabc",
  prefixcontent:"contentc",
  fadespeed:"fast"
  });

$("#vertical-tabs").tytabs({
  prefixtabs:"tabz",
  prefixcontent:"contentz"
  });
$("#vertical-tabs.a").tytabs({
  prefixtabs:"taba",
  prefixcontent:"contenta"
  });
$("#vertical-tabs.b").tytabs({
  prefixtabs:"tabb",
  prefixcontent:"contentb"
  });
$("#vertical-tabs.c").tytabs({
  prefixtabs:"tabc",
  prefixcontent:"contentc"
  });
});

// Toggle
$(document).ready(function () {
	
$('#toggle-view li').click(function () {

var text = $(this).children('div.panel');

if (text.is(':hidden')) {
	text.slideDown('200');
	$(this).children('span').html('-');		
} else {
	text.slideUp('200');
	$(this).children('span').html('+');		
}

});

});

// Carousel slider
$(document).ready(function() {
$('.slidewrap').carousel({
	slider: '.slider',
	slide: '.slide',
	slideHed: '.slidehed',
	nextSlide : '.next',
	prevSlide : '.prev',
	addPagination: false,
	addNav : false,
	speed: 500 // ms.
});

$('.slidewrap2').carousel({ 
namespace: "carousel2" // Defaults to “carousel”.
})

$('.slidewrap3').carousel({ 
namespace: "carousel3" // Defaults to “carousel”.
})

});

// jQuery Prettyphoto Lightbox
$(document).ready(function(){
	$("area[rel^='prettyPhoto']").prettyPhoto();
	
	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',theme:'pp_default',slideshow:4000, opacity: 0.50, deeplinking: false, overlay_gallery: false, autoplay_slideshow: false});
	
});

// Isotope Filtering
$(function(){
      
var $container = $('#contain');

// initialize Isotope
  $container.isotope({
	// options...
	resizable: false, // disable normal resizing
	// set columnWidth to a percentage of container width
	masonry: { columnWidth: $container.width() / 12 }
  });

  // update columnWidth on window resize
  $(window).smartresize(function(){
	$container.isotope({
	  // update columnWidth to a percentage of container width
	  masonry: { columnWidth: $container.width() / 12 }
	});
  });
  

$container.isotope({
  itemSelector : '.item',
   animationOptions: {
     duration: 750,
     easing: 'linear',
     queue: true
   }
});


var $optionSets = $('#options .option-set'),
	$optionLinks = $optionSets.find('a');

$optionLinks.click(function(){
  var $this = $(this);
  // don't proceed if already selected
  if ( $this.hasClass('selected') ) {
	return false;
  }
  var $optionSet = $this.parents('.option-set');
  $optionSet.find('.selected').removeClass('selected');
  $this.addClass('selected');

  // make option object dynamically, i.e. { filter: '.my-filter-class' }
  var options = {},
	  key = $optionSet.attr('data-option-key'),
	  value = $this.attr('data-option-value');
  // parse 'false' as false boolean
  value = value === 'false' ? false : value;
  options[ key ] = value;
  if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
	// changes in layout modes need extra logic
	changeLayoutMode( $this, options )
  } else {
	// otherwise, apply new options
	$container.isotope( options );
  }
  
  return false;
});


});

// Elastic Slider
$(function() {
  $('#ei-slider').eislideshow({
	  animation			: 'center',
	  autoplay			: true,
	  slideshow_interval	: 3000,
	  thumbMaxWidth       : 188,
	  titlesFactor		: 0
  });
});

