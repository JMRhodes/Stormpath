/**
 *  Initialize formLabels
 */

var formLabels = (function ($) {

    var pub = {}; // public facing functions

    pub._init = function () {

        $('.float__input').each(function () {

            $(this).on('focus', function () {
                $(this).parent('.float').addClass('float--active');
            });

            $(this).on('blur', function () {
                if ($(this).val().length === 0) {
                    $(this).parent('.float').removeClass('float--active');
                }
            });

            if ($(this).val() !== '') {
                $(this).parent('.float').addClass('float--active');
            }

        });

    };

    return pub;

})(jQuery);