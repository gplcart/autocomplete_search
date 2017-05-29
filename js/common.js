/**
 * @package Autocomplete search
 * @author Iurii Makukh <gplcart.software@gmail.com>
 * @copyright Copyright (c) 2017, Iurii Makukh <gplcart.software@gmail.com>
 * @license https://www.gnu.org/licenses/gpl-3.0.en.html GPL-3.0+
 */
/* global GplCart, jQuery */
(function (GplCart, $) {

    "use strict";

    /**
     * Setup autocomplete search
     * @returns {undefined}
     */
    GplCart.onload.moduleAutocompleteSearch = function () {

        var params, input = $(GplCart.settings.autocomplete_search.selector);

        if (input.length === 0) {
            return;
        }

        input.autocomplete({
            minLength: GplCart.settings.autocomplete_search.min_length,
            source: function (request, response) {
                params = {term: request.term, token: GplCart.settings.token};
                $.post(GplCart.settings.base + 'autocomplete-search', params, function (data) {
                    response($.map(data, function (value, key) {
                        return {suggestion: value.rendered};
                    }));
                });
            },
            select: function () {
                return false;
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

})(GplCart, jQuery);
