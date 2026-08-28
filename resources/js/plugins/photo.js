alert("tload");

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    });
    var resize = $("#upload-demo").croppie({
        enableExif: true,
        enableOrientation: true,
        viewport: {
            // Default { width: 100, height: 100, type: 'square' }
            width: 200,
            height: 200,
            type: "circle" //square
        },
        url:
            "{{ (isset($user->photo))? asset('uploads/users/'.$user->photo):''}}",
        boundary: {
            width: 200,
            height: 200
        }
    });
    $("#image_file").on("change", function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            resize
                .croppie("bind", {
                    url: e.target.result
                })
                .then(function() {
                    console.log("jQuery bind complete");
                });
        };
        reader.readAsDataURL(this.files[0]);
        setTimeout(function() {
            $(".upload-image").removeClass("d-none");
            //   $(".upload-image").trigger('click');
        }, 500);
    });
    $(".upload-image").on("click", function(ev) {
        ev.preventDefault();

        resize
            .croppie("result", {
                type: "canvas",
                size: "viewport",
                size: {
                    width: 600,
                    height: 600
                }
            })
            .then(function(img) {
                $("#upload-success").html("Photo mise à jour.");
                $("#upload-success").show();
                data = {
                    image: img
                };

                if ($("#user_id")) {
                    data.user_id = $("#user_id").val();
                }
                $.ajax({
                    url: "{{route('croppie.upload-image')}}",
                    type: "POST",
                    data: data,
                    success: function(data) {
                        $("input[name='photo']").val(data.file);

                        console.log($("input[name='photo']").val());
                    }
                });
            });
    });
});
