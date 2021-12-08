chrome.extension.sendRequest({localstorage: "url"}, function(response) {

    var url = response.value;
        
    $("body.fbIndex").ready( function(){ 
    
        $("body.fbIndex").css({
                        'backgroundImage': 'url('+ url +')',
        });
    
      $('body.fbIndex').animate({
    
    opacity: '1.0'
    
  }, 2000, function() {
    // Animation complete.
  });
  
      $("body.fbIndex i.fb_logo").hide();

        $("body.fbIndex tbody tr:first").append("<td><a target='_blank' id='settingsLink' href='chrome-extension://bdlfdaajmclngiomogmleihllaejcnni/options.html'><img style='width: 16px; height: 16px;' src='chrome-extension://bdlfdaajmclngiomogmleihllaejcnni/cog2.png'/></a></td>");
        
        if (navigator.userAgent.toLowerCase().indexOf("chrome") >= 0) {
$(window).load(function(){
    $('input:-webkit-autofill').each(function(){
        var text = $(this).val();
        var name = $(this).attr('name');
        $(this).after(this.outerHTML).remove();
        $('input[name=' + name + ']').val(text);
    });
});}
        
                          
    



    });

});


chrome.extension.sendRequest({localstorage: "bgSize"}, function(response) {

    var bgSize = response.value;
        
    $("body.fbIndex").ready( function(){ $
    
    
        ("body.fbIndex").css({
                        'backgroundSize': ' '+ bgSize +' '
        });
        
                          
    });

});


chrome.extension.sendRequest({localstorage: "logo"}, function(response) {

    var logo = response.value;
        
    $("body.fbIndex").ready( function(){ 
    
    
    if (logo == "true") {
    
      $("body.fbIndex .lfloat").append("<img class='fb_logo' src='chrome-extension://bdlfdaajmclngiomogmleihllaejcnni/facebook_logo_black.png' />");

    } else if (logo == "false") {
    
          $("body.fbIndex .lfloat").append("<img class='fb_logo' src='chrome-extension://bdlfdaajmclngiomogmleihllaejcnni/facebook_logo_white.png' />");

    }
                          
    });

});


chrome.extension.sendRequest({localstorage: "boxColor"}, function(response) {

    var boxColor = response.value;
        
    $("body.fbIndex").ready( function(){ $
    
    
        ("body.fbIndex div.menu_login_container").css({
                        'background-color': ' '+ boxColor +' '
        });
        
                          
    });

});

chrome.extension.sendRequest({localstorage: "labelColor"}, function(response) {

    var labelColor = response.value;
        
    $("body.fbIndex").ready( function(){ $
    
    
        ("body.fbIndex .menu_login_container label, body.fbIndex .menu_login_container a").css({
                        'color': ' #'+ labelColor +' '
        });
        
                          
    });

});

chrome.extension.sendRequest({localstorage: "bgRepeat"}, function(response) {

    var bgRepeat = response.value;
        
    $("body.fbIndex").ready( function(){ $


        ("body.fbIndex").css({
                        'backgroundRepeat': ''+ bgRepeat +''
        });
        
                          
    });

});

chrome.extension.sendRequest({localstorage: "repeatX"}, function(response) {

    var repeatX = response.value;
        
    $("body.fbIndex").ready( function(){ $


        ("body.fbIndex").css({
                        'backgroundRepeat': ''+ repeatXa +''
        });
        
                          
    });

});

