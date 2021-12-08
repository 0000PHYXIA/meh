var ROOT = '/';
var FILE = '/';
var SHOW_DIALOG = false;
var SHOW_SIDEBAR = false;

$(document).ready(function() {
  $("#forcetoregister").hide().slideDown(1000).delay(15000).slideUp(1000);;

  if ($("#fadeobj").length > 0) {
    if ((FILE == '/EquinoxForthesakeIsTheBest/' || FILE == '/EquinoxForthesakeIsTheBest/index.php') && !SHOW_SIDEBAR)
      return;
    else
      $("#fadeobj").hide().fadeIn(5000);
  }
    }
 );