$(document).ready(function (){
    $("#form_new_section").find('input').val('');
    new_section_modal.addEventListener('shown.bs.modal', function () {
        get_sections_list("#new_section_modal #parent_section");
    })
})

function get_sections_list(el_id, async= true){
    $.ajax({
        url:"/admin_catalog_sections/get_section_list/",
        type: "POST",
        dataType: 'html',
        async: async,
        success: function (html){
            $(el_id).empty();
            $(el_id).append('<option value="0" data-dept-level="-1">.</option>');
            $(el_id).append(html);
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

function show_modal_edit_section(id){
    $.ajax({
        data: {'id' : id},
        url:"/admin_catalog_sections/get_by_id/"+id+"/",
        dataType: "json",
        type: "post",
        success: function (json) {
            console.log(json);
            if (json.success){
                modal = $("#edit_section_modal");
                get_sections_list("#edit_section_modal #parent_section", false);
                modal.find("input[name='section_id']").val(json.section[0].id);
                modal.find("input[name='edit_id']").append(json.section[0].id);
                modal.find("input[name='section_name']").val(json.section[0].name);
                modal.find("input[name='section_code']").val(json.section[0].code);
                modal.find("#parent_section option").each(function (i, e){
                    if ($(e).val() == json.section[0].parent_id){
                        $(e).attr("selected", "selected");
                    }
                })
                modal.modal('show');
            }
        }
    })
}

function edit_section(){
    modal = $("#edit_section_modal");
    form = modal.find('form');
    if (form[0].checkValidity() === false) {
        form.addClass('was-validated');
    }else {
        data = form.serialize();
        dept_level = form.find('#parent_section option:selected').attr('data-dept-level');
        data = data + "&dept_level=" + dept_level;
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
                    modal.modal('hide');
                    get_sections_table();
                }
            }
        })
    }
}