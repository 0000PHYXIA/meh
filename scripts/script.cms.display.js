var CMS_ROOT = '/';
var CMS_FILE = '/';
var CMS_SHOW_DIALOG = false;
var CMS_SHOW_GAME = false;

function showDialog(id) {
  var maskHeight = $(document).height();
  var maskWidth = $(window).width();

  $('#mask').css({'width':maskWidth,'height':maskHeight});

  $('#mask').fadeIn(1000);  
  $('#mask').fadeTo("slow",0.8);  

  var winH = $(window).height();
  var winW = $(window).width();

  $(id).css('top',  winH/2-$(id).height()/2);
  $(id).css('left', winW/2-$(id).width()/2);

  $(id).fadeIn(2000);
}

function hideDialog() {    
  $('#mask').hide();
  $('.window').hide();
}
 
function stickyPopup(message) {
  $("#stickynote").html(message + '<br /><input type="button" value="Close it" class="close" onclick="hideDialog();" />');
  showDialog("#stickynote");
}

function handleLogin() {  
  $.post(CMS_ROOT + 'manage.php?jsonlogin', { txtUsername: $("#stickyuser").val(), txtPassword: $("#stickypass").val() },
  function(data) {
    try {
      var obj = jQuery.parseJSON(data);
      if (obj.output == "success") {
        stickyPopup('Welcome to Project Untitled! Enjoy playing hero, and this be your best memory of all times... adventuring with your best buddies from every country all around the globe.<br /><br />Project Untitled Staff.');
      } else { 
        stickyPopup('Authentication failed! Please check your username and/or password then try again.<br /><br />If you continue to have problems please contact the <a href="mailto:{SERVER_OWNER_EMAIL}"><i>server administrator or webmaster</i></a>.');
      }
    } catch (exception) {
      stickyPopup('Server Error!');
    }
  });
}


	
$(document).ready(function() {
  $("#forcetoregister").hide().slideDown(1000).delay(10000000).slideUp(1000);;

  if ($("#fadeobj").length > 0) {
    if ((CMS_FILE == '/playme/' || CMS_FILE == '/playme/index.php') && !CMS_SHOW_GAME)
      return;
    else
      $("#fadeobj").hide().fadeIn(8000);
  }

  if ($("#header").length > 0)
    $('#header').stickyheader();

  setInterval(function() {
    $.post(CMS_ROOT, { newdata: true },    
    function(data) {
      var obj = jQuery.parseJSON(data);
        var out = obj.output + ' USERS ONLINE';
        if ($("#usersonline").html() != out)
            $("#usersonline").slideUp().html(obj.output + ' USERS ONLINE').slideDown();
    });
  }, 10000);
});