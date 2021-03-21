$(document).ready(function (){
    new_section_modal.addEventListener('shown.bs.modal', function () {
        get_sections_list();
    })
})

function get_sections_list(){
    $.ajax({
        url:"/admin_catalog_sections/get_section_list/",
        type: "POST",
        dataType: 'text',
        success: function (html){
            $("#parent_section").append(html);
        }
    })

}

function add_new_section() {
    // console.log(123);
    form = $("#form_new_section");

    if (form[0].checkValidity() === false) {
        form.addClass('was-validated');
    }else {
        data = form.serialize();
        data.dept_level = form.find('#parent_section option:selected').attr('data-dept-level');
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