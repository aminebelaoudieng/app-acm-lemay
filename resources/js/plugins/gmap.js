// Prevent form submission on enter
$(document).on("keydown", "form", function(event) {
    return event.key != "Enter";
});

var autocomplete;

var componentFormToAutofill = {
    postal_code: "short_name",
    administrative_area_level_1: "short_name",
    street_number: "long_name",
    route: "short_name",
    locality: "long_name"
};

function initAutocomplete() {
    $(".googleLive").hide();
    // Create the autocomplete object, restricting the search predictions to
    // geographical location types.
    var input = document.getElementById("googleAutoComplete");
    input.addEventListener("change", e => {});
    autocomplete = new google.maps.places.Autocomplete(input, {
        types: ["address"]
    });

    // Avoid paying for data that you don't need by restricting the set of
    // place fields that are returned to just the address components.
    autocomplete.setFields(["address_component"]);

    // When the user selects an address from the drop-down, populate the
    // address fields in the form.
    autocomplete.addListener("place_changed", fillInAddress);
}

function fillInAddress() {
    // Get the place details from the autocomplete object.
    var place = autocomplete.getPlace();

    // Get each component of the address from the place details,
    // and then fill-in the corresponding field on the form.

    for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (addressType == "postal_code_prefix") {
            addressType = "postal_code";
        }

        if (componentFormToAutofill[addressType]) {
            var val =
                place.address_components[i][
                    componentFormToAutofill[addressType]
                ];

            document.getElementById(addressType).value = val;
        }
    }

    geolocate();
}

function geolocate() {
    var geocoder = new google.maps.Geocoder();
    var input = document.getElementById("googleAutoComplete");
    var address = input.value;

    geocoder.geocode({ address: address }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var geolocation = {
                lat: results[0].geometry.location.lat(),
                lng: results[0].geometry.location.lng(),
                name: results[0].formatted_address
            };

            $(".googleImg").hide();
            $(".googleLive").show();

            initializeStreetView(geolocation.lat, geolocation.lng);
            initializeMap(geolocation.lat, geolocation.lng);
        }
    });
}

function initializeMap(lat, lng, zoom = 12) {
    var center = new google.maps.LatLng(lat, lng);

    map = new google.maps.Map(document.getElementById("liveMap"), {
        zoom: zoom,
        center: center
    });

    var marker = new google.maps.Marker({
        position: center,
        map: map
    });

    updateMap(map);

    map.addListener("center_changed", function() {
        updateMap(map);
    });
    map.addListener("zoom_changed", function() {
        updateMap(map);
    });
}

function initializeStreetView(
    lat,
    lng,
    street_heading = null,
    street_pitch = null,
    street_zoom = 90
) {
    var center = new google.maps.LatLng(lat, lng);
    var panoramaOptions = {
        position: center,
        pov: {
            heading: street_heading,
            pitch: street_pitch,
            zoom: street_zoom
        }
    };
    var streetView = new google.maps.StreetViewPanorama(
        document.getElementById("liveStreet"),
        panoramaOptions
    );
    streetView.setVisible(true);

    streetView.addListener("pov_changed", function() {
        updateStreetView(streetView);
    });

    streetView.addListener("position_changed", function() {
        updateStreetView(streetView);
    });
}
function updateStreetView(streetView) {
    $("#street_heading").val(streetView.getPov().heading);
    $("#street_pitch").val(streetView.getPov().pitch);
    $("#street_zoom").val(streetView.getPov().zoom);
    $("#street_lat").val(streetView.getPosition().lat());
    $("#street_lng").val(streetView.getPosition().lng());
}
function updateMap(map) {
    $("#map_lat").val(map.getCenter().lat());
    $("#map_lng").val(map.getCenter().lng());
    $("#map_zoom").val(map.getZoom());
}
if ($("#googleAutoComplete").length) {
    initAutocomplete();
}
if ($("#editLiveStreet")) {
    $("#editLiveStreet").click(function(e) {
        e.preventDefault();
        initializeStreetView(
            street_lat,
            street_lng,
            street_heading,
            street_pitch,
            street_zoom
        );
        $("#frameStreet").hide();
        $("#update_streetView").val(1);
        $("#imgStreet").hide();
        $("#liveStreet").show();
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $("#frameStreet").show();
            $("#liveStreet").hide();
            reader.onload = function(e) {
                $("#frameStreet").css(
                    "backgroundImage",
                    "url(" + e.target.result + ")"
                );
                $("#imgStreet").remove();
            };

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#photo_custom").change(function() {
        readURL(this);
    });
}
if ($("#editLiveMap")) {
    $("#editLiveMap").click(function(e) {
        e.preventDefault();
        initializeMap(map_lat, map_lng, map_zoom);
        $("#imgMap").hide();
        $("#liveMap").show();
    });
}
