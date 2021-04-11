$(document).ready(function() {

// Проверка пароля
    $('#pass_2').on('input',function (){
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

    // // отправка формы
    $('#form_registr').on('submit', function (){
        event.preventDefault();
        form = $(this);
        data = {};

        $.each(form.serializeArray(), function (i,e){

            data[e.name] = e.value;
        });

        if (data.pass_1 != pass_2 ){
            $('.block_error, .pass_error').show();
            return false;
        }else {
            $('.block_error, .pass_error').hide();
        }

        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            dataType: 'json',
            data: data,
            success: function(json){
                if (json.error === true){
                    if (json.login === false){
                        $('.block_error, .login_error').show();
                    }
                    if (json.pass === false){
                        $('.block_error, .pass_error').show();
                    }
                }
                if (json.success === true){
                    location.href = '/account/new_user/';
                }
            }
        });
    })
})