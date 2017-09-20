/**
 * @package Autocomplete search
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */
/* global Gplcart, jQuery */
(function (Gplcart, $) {

    "use strict";

    /**
     * Setup autocomplete search
     * @returns {undefined}
     */
    Gplcart.onload.moduleAutocompleteSearch = function () {

        var params, input = $(Gplcart.settings.autocomplete_search.selector);

        if (input.length === 0) {
            return;
        }

        input.autocomplete({
            minLength: Gplcart.settings.autocomplete_search.min_length,
            source: function (request, response) {
                params = {term: request.term, token: Gplcart.settings.token};
                $.post(Gplcart.settings.base + 'autocomplete-search', params, function (data) {
                    response($.map(data, function (value, key) {
                        return {suggestion: value.rendered};
                    }));
                });
            },
            select: function () {
                return false;
            },
            open: function (e) {
                $('.module-autocomplete-search.ui-autocomplete').css('width', $(e.target).outerWidth());
            },
            classes: {
                "ui-autocomplete": "module-autocomplete-search"
            }
        }).autocomplete('instance')._renderItem = function (ul, item) {
            return $('<li>').append(item.suggestion).appendTo(ul);
        };

        input.focus(function () {
            if ($(this).val()) {
                $(this).autocomplete('search');
            }
        });
    };

})(Gplcart, jQuery);
