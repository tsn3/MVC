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
        data [];
        // console.log(form);
        data = form.serializeArray();
        console.log(data);

    })
})