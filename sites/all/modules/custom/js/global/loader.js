(function ($) { // passing Jquery $ into the function
    // Define variable for our overall function
    var Loader = {
        // Define variables for the below function 

        // Initialising functions (Function written below)
        init: function(){
            this.siteLoader();
        },


        // The function to show/hide sidebar blocks based on value in the select 
        siteLoader: function(){ 
            $(window).load(function() {
                // Animate loader off screen
                $("#loader").animate({top: -200});
            }); 
        }
    };

    // Drupal Behavior the same as running on dom ready but also on ajax page change
    Drupal.behaviors.loader = {
        attach: function (context, settings) { 
            Loader.init(); // run our initial function
        }
    };

}(jQuery));
 




