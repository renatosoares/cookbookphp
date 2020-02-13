$(document).ready(function () {
    function clear () {
        $('#paragraph').removeClass('smaller')
            .removeClass('medium')
            .removeClass('bigger')
    }

    $('#button-smaller').click(function () {
        clear();
        $('#paragraph').addClass('smaller');
    });

    $('#button-medium').click(function () {
        clear();
        $('#paragraph').addClass('medium');
    });

    $('#button-bigger').click(function () {
        clear();
        $('#paragraph').addClass('bigger');
    });

    $('#paragraph').addClass('medium');
});
