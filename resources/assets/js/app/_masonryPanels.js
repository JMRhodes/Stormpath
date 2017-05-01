/**
 *  Initialize masonryPanels
 */

var masonryPanels = (function ($) {

    var pub = {}; // public facing functions
    var panelItems = $('.panels');

    pub._init = function () {
        pub._masonryInit();
    };

    pub._masonryInit = function () {
        panelItems.masonry({
            itemSelector: '.panel--sm',
            columnWidth: 320,
            fitWidth: true,
            gutter: 30
        });
    };

    return pub;

})(jQuery);