$(document).ready(function() {
    $("#book_now").click(function(e) {
        e.preventDefault();
        bookticket();
    })
    $("#refby").select2();
    $("#no_tick").select2();
    checkcount();
    $("#number").keypress(function(e) {
        if (this.value.length > 9 || (e.keyCode < 48 || e.keyCode > 57)) {
            $("#number_label").css('color', 'red');
            window.setTimeout(function() {
                $("#number_label").css('color', '');
            }, 200);
            return false;
        }
        $("#number_label").css('color', '');
    })
    $("#number").keyup(function(e) {
        if (this.value.length == 10) {
            checkifnoexists();
        }
    })
    $("#mail").keyup(function(e) {
        var regexmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/;
        if (!regexmail.test(this.value)) {

        } else {
            checkifmailexists();
        }
    })
    $("#gb").click(function(e) {
        $("#main").slideDown();
        $("#thankyou").slideUp();
        $("#no_tick").val('').trigger("change");
        $("#refby").val('').trigger("change");
    })
})

function checkifnoexists() {
    var number = $('[name="number"]').val();
    $.ajax({
        url: "checknumber.php",
        type: "GET",
        contenttype: "JSON",
        data: { number: number },
        timeout: 10000,
        success: function(r) {
            if (r == 1) {
                $("#no_exists").show();
                $("#book_now").addClass('disabled');
            } else {
                $("#no_exists").hide();
                $("#book_now").removeClass('disabled');
            }
        },
        error: function(x, t, m) {
            if (t === "timeout") {
                alert("got timeout");
            } else {
                alert(t);
            }
        }
    })
}

function checkifmailexists() {
    var mail = $('[name="mail"]').val();
    $.ajax({
        url: "checkmail.php",
        type: "GET",
        contenttype: "JSON",
        data: { mail: mail },
        timeout: 10000,
        success: function(r) {
            if (r == 1) {
                $("#mail_exists").show();
                $("#book_now").addClass('disabled');
            } else {
                $("#mail_exists").hide();
                $("#book_now").removeClass('disabled');
            }
        },
        error: function(x, t, m) {
            if (t === "timeout") {
                alert("got timeout");
            } else {
                alert(t);
            }
        }
    })
}

function generate_qr(data) {
    $("#qr").remove();
    var qr = '<img id="qr" style="display:none;" src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=' + data + '">';
    $("#qr_container").append(qr);
    $("#qr").fadeIn();
}

function checkcount() {
    $.ajax({
        url: "checkcount.php",
        type: "POST",
        timeout: 6000,
        success: function(result) {
            var remaining = 250 - result;
            $("#rem").text(remaining);
        },
        error: function() {

        }
    })
}

function bookticket() {
    var name = $('[name="name"]').val();
    var age = $('[name="age"]').val();
    var mail = $('[name="mail"]').val();
    var number = $('[name="number"]').val();
    var ref_det = $('[name="ref_det"]').val();
    var no_tick = $("#no_tick").val();
    var refby = $("#refby").val();
    var error = false;
    var regexmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,5})+$/;
    if (!regexmail.test(mail)) {
        error = true;
        $('[name="mail"]').css("border-color", "#D8000C");
    } else {
        $('[name="mail"]').css("border-color", "#666");
    }
    if (number.length !== 10) {
        error = true;
        $('[name="number"]').css("border-color", "#D8000C");
    } else {
        $('[name="number"]').css("border-color", "#666");
    }
    if (name.length == 0) {
        error = true;
        $('[name="name"]').css("border-color", "#D8000C");
    } else {
        $('[name="name"]').css("border-color", "#666");
    }
    if (age.length == 0) {
        error = true;
        $('[name="age"]').css("border-color", "#D8000C");
        errorline = "15"
    } else {
        $('[name="age"]').css("border-color", "#666");
    }
    if (ref_det.length == 0) {
        error = true;
        $('[name="ref_det"]').css("border-color", "#D8000C");
    } else {
        $('[name="ref_det"]').css("border-color", "#666");
    }
    if (no_tick == "" || refby == "") {
        error = true;
    }
    if (error == true) {
        alert("Please fill all the fields");
    } else {
        $.ajax({
            url: "bookticket.php",
            type: "GET",
            contenttype: "JSON",
            data: { name: name, age: age, mail: mail, number: number, ref_det: ref_det, no_tick: no_tick, refby: refby },
            timeout: 10000,
            success: function(r) {
                if (r == "1") {
                    $("#main").slideUp();
                    $("#thankyou").slideDown();
                    $("#thankyou").css('min-height', $(window).height);
                    window.setTimeout(function() {
                        $("#thankyou").delay(2000).css('padding-top', (($(window).height() - $("#ty_body").height()) / 2));
                    }, 1000);
                } else {
                    alert('Something went wrong. Please try again after some time');
                }
            },
            error: function(x, t, m) {
                if (t === "timeout") {
                    alert("got timeout");
                } else {
                    alert(t);
                }
            }
        })
    }
}
x