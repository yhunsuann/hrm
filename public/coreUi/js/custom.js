$(document).ready(function() {
    $('#submit-button').click(function() {
        $(this).closest('form').submit();
    });
    $('select').selectize({
        sortField: 'text'
    });

    $('#summernote').summernote({
        tabsize: 2,
        height: 100
    });
    $('.datepicker').datepicker({
        language: "es",
        autoclose: true,
        format: "yyyy-mm-dd"
    });

    $('.open-modal').click(function() {
        var id = $(this).data('id');
        let type = $(this).attr('m-type');
        url = '';
        if (id !== undefined) {
            var url = "/admin/" + type + "/delete/" + id;
        }
        $('#btn-delete-modal').attr("href", url);
    });

    $('#btn-delete-modal').on('click', function() {
        if ($(this).attr('href') == '') {
            $('#form-delete').submit();

            return false;
        }
    });

    changeInput();
});

function changeInput() {
    var value = $('#select-filter').val();
    var html = "";
    if (value === "date") {
        html = "<div class='datepicker date d-flex mt-0 mx-auto'>" +
            "<div class='input-group'>" +
            "<input name='dateFrom' type='text' value='26-06-2023' placeholder='From date' class='form-control date-picker'>" +
            "<div class='input-group-append'>" +
            "<span class='input-group-text h-100'><i class='fa fa-calendar'></i></span>" +
            "</div>" +
            "</div>" +
            "</div>";

    } else if (value === "month") {
        html = "<div class='datepicker date d-flex mt-0 mx-auto'>" +
            "<div class='input-group'>" +
            "<input name='dateFrom' type='text'  value='June 2023' placeholder='From date' class='form-control date-picker'>" +
            "<div class='input-group-append'>" +
            "<span class='input-group-text h-100'><i class='fa fa-calendar'></i></span>" +
            "</div>" +
            "</div>" +
            "</div>";

    } else {
        html = "<div class='datepicker date d-flex mt-0 mx-auto'>" +
            "<div class='input-group'>" +
            "<input name='dateFrom' type='text' value='2023' placeholder='From date' class='form-control date-picker'>" +
            "<div class='input-group-append'>" +
            "<span class='input-group-text h-100'><i class='fa fa-calendar'></i></span>" +
            "</div>" +
            "</div>" +
            "</div>";

    }
    $('.value-select').html(html);

    if (value === "date") {
        $('.datepicker').datepicker({
            language: "es",
            autoclose: true,
            format: "dd-mm-yyyy"
        });
    } else if (value === "month") {
        $('.datepicker').datepicker({
            format: "MM yyyy",
            viewMode: "months",
            minViewMode: "months",
        });
    } else {
        $('.datepicker').datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
        });
    }
}