$(document).ready(function() {

// Проверка пароля
    $('#pass_2').on('input',function (){
        // console.log($(this).val());
        pass_1 = $('#pass_1').val();
            pass_2 = $(this).val();
            if (pass_1 == pass_2) {
                $(this).addClass('complet_input');
                $(this).removeClass('error_input');
            }else {
                $(this).addClass('error_input');
                $(this).removeClass('complet_input');
            }
    })

    // отправка формы
    $('#form_registr').on('submit', function (){
        event.preventDefault();
        form = $(this);
        data = {};
    //     // console.log(form);
    //     data_form = form.serializeArray();
        $.each(form.serializeArray(), function (i,e){
            data[e.name] = e.value;
        });

        if (data.pass_1 != pass_2 ){
            $('.block_error, .pass_error').show();
            return false;
        }else {
            $('.block_error, .pass_error').hide();
        }


        console.log(form.attr('action'))
        $.ajax({
            url: '/login/reg',
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(json){
                alert ("done");
            }
        });


    })
})