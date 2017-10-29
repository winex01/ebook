// flash laracast
$('div.alert').not('.alert-important').delay(3000).fadeOut(350);


// ------------------------------------------------------------------------------
// csrf
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
    }
});
// ------------------------------------------------------------------------------
// refresh table
function dataTableRefresh(tble){
    // add new row dummy data just to complete the number of colum
    // just to refresh the table
    var newRow = '<tr><td>Winnie & Reyvelyn</td><td>Winnie & Reyvelyn</td><td>Winnie & Reyvelyn</td><td>Winnie & Reyvelyn</td></tr>';
    $(tble).DataTable().row.add($(newRow)).draw();
}
// ------------------------------------------------------------------------------
// flash message default is hide
function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
    $(".print-error-msg").fadeTo(9000, 500).slideUp(500, function(){
        $(".print-error-msg").slideUp(500);
    });
}
// ------------------------------------------------------------------------------
// flash success
$('#flash-success').hide();
$('#flash-success').removeClass('hidden');//see partials flash success
$('#flash-success-x').click(function(event) {
    /* Act on the event */
    $('#flash-success').fadeOut('slow');
});
function printSuccessMsg(msg, type){
    $('#flash-success-body').text(msg + ' is ' + type + ' Successfully.');
    $('#flash-success').show();
    $("#flash-success").fadeTo(4000, 500).slideUp(500, function(){
        $("#flash-success").slideUp(500);
    });
}
// ------------------------------------------------------------------------------
