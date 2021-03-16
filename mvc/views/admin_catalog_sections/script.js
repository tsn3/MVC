
function add_new_section() {
    // console.log(123);
    form = $("#form_new_section");
    console.log(form);

    if (form.checkValidity() === false) {
        form.addClass('was-validated');
    }else {

    }

}

//
// $("#form_new_section").on('submit',function(){
//     event.preventDefault();
//     form = $(this);
//     return false;
// })