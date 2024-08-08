$(document).on("click", ".togglePassword", function() {
    $(this).find('i').toggleClass('fa-eye fa-eye-slash');
    var input = $(this).closest('.input-group').find('input.password');
    if($(this).find('i').hasClass('fa-eye')) {
        input.attr('type', 'text');
    } else {
        input.attr('type', 'password');
    }
});
