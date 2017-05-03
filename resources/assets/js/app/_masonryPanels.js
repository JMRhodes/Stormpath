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
            itemSelector: '.panel__item',
            columnWidth: '.panel__item',
            percentPosition: true,
        });

        // layout Masonry after each image loads
        panelItems.imagesLoaded().progress(function () {
            panelItems.masonry('layout');
        });
    };

    return pub;

})(jQuery);