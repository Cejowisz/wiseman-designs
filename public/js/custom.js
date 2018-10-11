
    jQuery(function($) {

        $(document).ready( function() {
            new WOW().init();

            $('.nav').affix({offset: {top: 150} });

        });

        $('.button-collapse').sideNav({
                menuWidth: 200, // Default is 300
                edge: 'left', // Choose the horizontal origin
                closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
                draggable: true // Choose whether you can drag to open on touch screens
            }
        );

        $('.pushpinn').pushpin({
            top: 300,
            bottom: 90000,
            offset: 0,
            transition: "background 800ms ease-in-out"
        });
    });

