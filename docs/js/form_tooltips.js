/**
 * Created with JetBrains PhpStorm.
 * User: jsilvia
 * Date: 1/8/13
 * Time: 12:27 PM
 * To change this template use File | Settings | File Templates.
 */
// select all desired input fields and attach tooltips to them
$("#myform :input").tooltip({

    // place tooltip on the right edge
    position: "center right",

    // a little tweaking of the position
    offset: [-2, 10],

    // use the built-in fadeIn/fadeOut effect
    effect: "fade",

    // custom opacity setting
    opacity: 0.7

});


