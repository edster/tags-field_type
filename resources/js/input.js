$(function () {

    // Initialize tag inputs.
    $('select[data-provides="anomaly.field_type.tags"]').each(function () {
        $(this).select2();
    });
});
