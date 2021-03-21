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
    form = $("#form_new_section");

    if (form[0].checkValidity() === false) {
        form.addClass('was-validated');
    }else {
        data = form.serialize();
        dept_level = form.find('#parent_section option:selected').attr('data-dept-level');
        data = data + "&dept_level=" + dept_level;
        console.log(data)
        $.ajax({
            url: form.attr('action'),
            type: form.attr('method'),
            dataType: 'json',
            data: data,
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

function section_del(id){
    console.log(123);

    $.ajax({
        data: {'id' : id},
        url:"/admin_catalog_sections/del/"+id+"/",
        dataType: "json",
        type: "post",
        success: function (json) {
            if (json.success){
                $('#table_sections_list tr[data-id="'+id+'"]').remove();
            }
        }
    })
}
