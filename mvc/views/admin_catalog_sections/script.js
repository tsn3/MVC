
function add_new_section() {
    // console.log(123);
    form = $("#form_new_section");

    if (form[0].checkValidity() === false) {
        form.addClass('was-validated');
    }else {
        console.log();
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            dataType: 'json',
            data: form.serialize(),
            success: function (json) {
                if(json.error){
                    $('error_danger').removeClass('d-none');
                }
                if (json.success){
                    $('#new_section_modal').modal('hide');
                }
            }
        })
    }
}