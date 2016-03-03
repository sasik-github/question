/**
 * Created by sasik on 3/3/16.
 */

var preventSubmit = true;

$('#agree-with-rules-checkbox').change(function () {
    preventSubmit = !$(this).prop('checked');
    if (!preventSubmit) {
        $('#login-btn').removeClass('disabled')
    } else {
        $('#login-btn').addClass('disabled');
    }
});

$('#login-form').submit(function (event) {
    if (preventSubmit) {
        event.preventDefault();
    }
});

