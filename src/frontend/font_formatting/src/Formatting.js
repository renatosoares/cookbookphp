function clear () {
    $('#paragraph').removeClass('smaller')
        .removeClass('medium')
        .removeClass('bigger')
}

function action () {
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
}

function defaultAction () {
    $('#paragraph').addClass('medium');
}

export default {
    clear: clear(),
    action: action(),
    defaultAction: defaultAction(),
}
