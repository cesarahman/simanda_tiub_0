$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
});

$(document).ready(function() {
    $("#show_hide_password-2 a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password-2 input').attr("type") == "text"){
            $('#show_hide_password-2 input').attr('type', 'password');
            $('#show_hide_password-2 i').addClass( "fa-eye-slash" );
            $('#show_hide_password-2 i').removeClass( "fa-eye" );
        }else if($('#show_hide_password-2 input').attr("type") == "password"){
            $('#show_hide_password-2 input').attr('type', 'text');
            $('#show_hide_password-2 i').removeClass( "fa-eye-slash" );
            $('#show_hide_password-2 i').addClass( "fa-eye" );
        }
    });
});

$(document).ready(function() {
    $("#show_hide_password-3 a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password-3 input').attr("type") == "text"){
            $('#show_hide_password-3 input').attr('type', 'password');
            $('#show_hide_password-3 i').addClass( "fa-eye-slash" );
            $('#show_hide_password-3 i').removeClass( "fa-eye" );
        }else if($('#show_hide_password-3 input').attr("type") == "password"){
            $('#show_hide_password-3 input').attr('type', 'text');
            $('#show_hide_password-3 i').removeClass( "fa-eye-slash" );
            $('#show_hide_password-3 i').addClass( "fa-eye" );
        }
    });
});