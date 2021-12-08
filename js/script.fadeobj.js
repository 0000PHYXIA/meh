var ROOT = '/';
var FILE = '/';
var SHOW_DIALOG = false;
var SHOW_REDIRECT = false;

$(document).ready(function() {
  $("#forcetoregister").hide().slideDown(1000).delay(15000).slideUp(1000);;

  if ($("#fadeobject").length > 0) {
    if ((FILE == '/EquinoxIsTheBest/' || FILE == '/play.php') && !SHOW_REDIRECT)
      return;
    else
      $("#fadeobject").hide().fadeIn(4000);
  }
    }
 );