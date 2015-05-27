(function ($) { // passing Jquery $ into the function
    // Define variable for our overall function
    var Line = {
        // Define variables for the below function 

        // Initialising functions (Function written below)
        init: function(){
            this.line();
        },

        // The function to show/hide sidebar blocks based on value in the select 
        line: function(){ 
            // Magic line function
            
            if(!$('body').hasClass('front')) {
                var $el, leftPos, newWidth,
                $mainNav = $(".header .menu");
            
                $mainNav.append("<li id='line'></li>");
                var $line = $("#line");
                console.log('cuntiflaps');
                $line
                    .width($(".header .active-trail").width())
                    .css("left", $("li.active-trail a").position().left)
                    .data("origLeft", $line.position().left)
                    .data("origWidth", $line.width());
                    
                $(".header ul.menu li a").hover(function() {
                    $el = $(this);
                    leftPos = $el.position().left;
                    newWidth = $el.parent().width();
                    $line.stop().animate({
                        left: leftPos,
                        width: newWidth
                    }); 
                }, function() { 
                    $line.stop().animate({
                        left: $line.data("origLeft"),
                        width: $line.data("origWidth")
                    });    
                });
            }    
        }
    };

    // Drupal Behavior the same as running on dom ready but also on ajax page change
    Drupal.behaviors.header = {
        attach: function (context, settings) { 
            Line.init(); // run our initial function
        }
    };

}(jQuery));
  




