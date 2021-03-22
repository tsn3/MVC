$(document).ready(function (){
    $("#form_new_section").find('input').val('');
    new_section_modal.addEventListener('shown.bs.modal', function () {
        get_sections_list();
    })
})

function get_sections_list(){
    $.ajax({
        url:"/admin_catalog_sections/get_section_list/",
        type: "POST",
        dataType: 'html',
        success: function (html){
            $("#parent_section").empty();
            $("#parent_section").append('<option value="0" data-dept-level="-1">.</option>');
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
                    get_sections_table();
                }
            }
        })
    }
}

function section_del(id){
    $.ajax({
        data: {'id' : id},
        url:"/admin_catalog_sections/del/"+id+"/",
        dataType: "json",
        type: "post",
        success: function (json) {
            if (json.success){
                get_sections_table();
            }
        }
    })
}

function get_sections_table(){
    $.ajax({
        url:"/admin_catalog_sections/get_sections_table/",
        data: {"ajax_call":'y'},
        dataType: 'html',
        success: function (html) {
            $('#table_sections_list').remove();
            $('#container_table_sections_list').append(html);
        }
    })
}


// "ajax_call":'y'