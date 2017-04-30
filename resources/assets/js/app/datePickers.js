/**
 *  Initialize datePickers
 */

var datePickers = (function ($) {

    var pub = {}; // public facing functions

    pub._init = function () {
        this._pickerDate();
        this._pickerTime();
    };

    pub._pickerDate = function () {
        $('.datepicker input[name="date_completed"]').pickadate({
            format: 'mmmm dd, yyyy',
            formatSubmit: 'yyyy-mm-dd',
            max: true
        });
    };

    pub._pickerTime = function () {
        $('.timepicker input[name="time_completed"]').pickatime({
            formatSubmit: 'H:i:00'
        });
    };

    return pub;

})(jQuery);