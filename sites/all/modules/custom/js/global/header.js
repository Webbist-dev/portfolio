(function ($) { // passing Jquery $ into the function
    // Define variable for our overall function
    var Header = {
        // Define variables for the below function 

        // Initialising functions (Function written below)
        init: function(){
            this.headerHeight();
        },

        // The function to show/hide sidebar blocks based on value in the select 
        headerHeight: function(){ 
            
        }
    };

    // Drupal Behavior the same as running on dom ready but also on ajax page change
    Drupal.behaviors.header = {
        attach: function (context, settings) { 
            Header.init(); // run our initial function
        }
    };

}(jQuery));
  




