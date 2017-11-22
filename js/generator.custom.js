$(document).ready(function() {
    $("#generate").click(function() {
        var data = $("#qr_data").val();
        generate_qr(data);
    })
})

function generate_qr(data) {
    $("#qr").remove();
    var qr = '<img id="qr" style="display:none;" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' + data + '">';
    $("#qr_container").append(qr);
    $("#qr").fadeIn();
}