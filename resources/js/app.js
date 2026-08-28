require("./bootstrap");
require("./plugins/croppie");
require("./plugins/spectrum");
require("./plugins/datepicker");
require("./plugins/mask");
require("./plugins/gmap");

$(".datepicker").datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true,
    language: 'fr',
    weekStart: 1, // Commencer la semaine le lundi
    todayBtn: "linked"
});
if (
    window.location.hash &&
    $('.nav-tabs a[href="' + window.location.hash + '"]')
) {
    $('.nav-tabs a[href="' + window.location.hash + '"]').tab("show");
} else if ($(".nav-tabs").length && !$(".nav-tabs .nav-link.active").length) {
    $(".nav-tabs .nav-link")
        .eq(0)
        .tab("show");
}
$(".money").mask("00 000 000 000", { reverse: true });
$(".tel").mask("(000) 000-0000");

$("#color-picker").spectrum({
    preferredFormat: "hex",
    showInput: true
});

$(".delete-img-btn").on("click", function(e) {
    e.preventDefault();
    $(this)
        .parent()
        .find("img")
        .remove();
    $("#" + $(this).attr("id") + "_old").val("delete");
    $(this).remove();
    console.log("DELTE", $(this).attr("id"));
});

if ($("select[name='type_copropriete']").length) {
    $("select[name='type_copropriete']").on("change", function() {
        if ($(this).val() == "divise") {
            $(".field-evaluation-municipale").removeClass("d-none");
        } else {
            $(".field-evaluation-municipale").addClass("d-none");
        }
    });

    if ($("select[name='type_copropriete']").val() == "indivise") {
        $(".field-evaluation-municipale").addClass("d-none");
    } else {
        $(".field-evaluation-municipale").removeClass("d-none");
    }
}
