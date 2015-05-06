(function ($) { // passing Jquery $ into the function
    // Define variable for our overall function
    var classieVar = {
        // Define variables for the below function 

        // Initialising functions (Function written below)
        init: function(){
            this.classieFunction ();
        },

        // The function to show/hide sidebar blocks based on value in the select 
        classieFunction : function(){ 
                    // https://gist.github.com/edankwan/4389601
           // class helper functions from bonzo https://github.com/ded/bonzo

            function classReg( className ) {
              return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
            }

            // classList support for class management
            // altho to be fair, the api sucks because it won't accept multiple classes at once
            var hasClass, addClass, removeClass;

            if ( 'classList' in document.documentElement ) {
              hasClass = function( elem, c ) {
                return elem.classList.contains( c );
              };
              addClass = function( elem, c ) {
                elem.classList.add( c );
              };
              removeClass = function( elem, c ) {
                elem.classList.remove( c );
              };
            }
            else {
              hasClass = function( elem, c ) {
                return classReg( c ).test( elem.className );
              };
              addClass = function( elem, c ) {
                if ( !hasClass( elem, c ) ) {
                  elem.className = elem.className + ' ' + c;
                }
              };
              removeClass = function( elem, c ) {
                elem.className = elem.className.replace( classReg( c ), ' ' );
              };
            }

            function toggleClass( elem, c ) {
              var fn = hasClass( elem, c ) ? removeClass : addClass;
              fn( elem, c );
            }

            var classie = {
              // full names
              hasClass: hasClass,
              addClass: addClass,
              removeClass: removeClass,
              toggleClass: toggleClass,
              // short names
              has: hasClass,
              add: addClass,
              remove: removeClass,
              toggle: toggleClass
            };

            // transport
            if ( typeof define === 'function' && define.amd ) {
              // AMD
              define( classie );
            } else {
              // browser global
              window.classie = classie;
            }
        }

    };

    // Drupal Behavior the same as running on dom ready but also on ajax page change
    Drupal.behaviors.header = {
        attach: function (context, settings) { 
            classieVar.init(); // run our initial function
        }
    };

}(jQuery));
  




