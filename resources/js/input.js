$(function () {

    // Initialize tag inputs.
    $('.tags-field-type input').each(function () {

        var source = $(this).data('source');
        var options = $(this).data('options').split(',');

        $(this).tagsinput({
            typeahead: {
                minLength: 0,
                displayText: function (item) {
                    return item;
                },
                source: options ? options : source
            },
            freeInput: $(this).data('allow_creating_tags')
        });
    });
});
