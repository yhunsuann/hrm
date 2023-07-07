$(document).ready(function() {
    $('#submit-button').click(function() {
        $(this).closest('form').submit();
    });

    $('input:reset').click(function() {
        $(this).closest('form').find('input:text').attr('value', '');
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

    $('.datepicker-month').datepicker({
        format: "MM yyyy",
        viewMode: "months",
        minViewMode: "months",
    });

    $('#btn-delete-modal').on('click', function() {
        if ($(this).attr('href') == '') {
            $('#form-delete').submit();

            return false;
        }
    });

    $('#role-member').change(function() {
        var roleId = $(this).val().trim();
        var pathArray = window.location.pathname.split('/');
        var segment4 = pathArray[4];
        $.ajax({
            url: 'get-employees/' + segment4,
            type: 'GET',
            data: { id: roleId }
        }).done(function(response) {
            var options = [];
            if (Array.isArray(response)) {
                response.forEach(function(employee) {
                    options.push({ value: employee.id, text: employee.full_name });
                });
            } else {
                options.push({ value: response.id, text: response.full_name });
            }
            var selectize = $('#member-select')[0].selectize;

            selectize.clearOptions();

            selectize.addOption(options);

            selectize.refreshItems();
        }).fail(function(xhr, status, error) {
            console.error(error);
        });
    });

    changeInput();

    getCurrentTime();
    setInterval(getCurrentTime, 1000);
});

function getCurrentTime() {
    var currentTime = new Date();
    var formattedTime = currentTime.getDate() + "-" + (currentTime.getMonth() + 1) + "-" + currentTime.getFullYear() + " " + currentTime.getHours() + ":" + currentTime.getMinutes() + ":" + currentTime.getSeconds();
    $('#current-time').text(formattedTime);
}

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