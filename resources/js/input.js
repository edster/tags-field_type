(function (window, document) {

    let fields = Array.from(
        document.querySelectorAll('input[data-provides="anomaly.field_type.tags"]')
    );

    fields.forEach(function (field) {
        new Choices(field, {
            removeItemButton: true,
            duplicateItems: false,
            disabled: field.hasAttribute('readonly') || field.hasAttribute('disabled')
        });
    });
    
})(window, document);
