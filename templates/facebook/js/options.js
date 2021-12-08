/**
 * Options page for FB Refresh
 * 
 * Design © 2011 Ansel Santosa
 * Licensed under GNU GPL v3
 **/

var last;

/* === NAVIGATION HANDLER === */
function addNavHandler() {
	last = "cus";
	$(".nav, nav li a:not(.noNav)").live("click", function() {
		navigate($(this).attr("href").substr(1));
	});
	var hash = window.location.hash.substr(1);
	if (hash === "abo") {
		$("#n_abo, #p_abo").addClass("current");
		last = "abo";
	} else if (hash == null || hash === "" || hash === "opt" || hash === "edi" || hash.indexOf("new") != -1) {
		$("#n_cus, #p_cus").addClass("current");
	} else {
		$("#n_" + hash + ", #p_" + hash).addClass("current");			
		last = hash;
	}


}
function navigate(tag) {
	$("#p_" + last + ", #n_" + last).removeClass("current");
	$("#p_" + tag + ", #n_" + tag).addClass("current");
	last = tag;
}
/* === END NAVIGATION HANDLER === */

