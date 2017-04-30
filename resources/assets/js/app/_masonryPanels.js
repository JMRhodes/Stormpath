/**
 *  Initialize masonryPanels
 */

var masonryPanels = (function ($) {

    var pub = {}; // public facing functions
    var panelItems = $('.panels');

    pub._init = function () {
        // pub._masonryInit();
    };

    pub._masonryInit = function () {
        panelItems.masonry({
            columnWidth: '.col-sm-6',
            itemSelector: '.panel--sm',
            percentPosition: true
        });
    };

    return pub;

})(jQuery);