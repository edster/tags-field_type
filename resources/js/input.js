(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('input[data-provides="anomaly.field_type.tags"]')
    );

    fields.forEach(function (field) {
        if (!$(field).attr('readonly')) {
            new Choices(field, {
                removeItemButton: true,
                duplicateItems: false,
            });
        }
    });
})(window, document);
