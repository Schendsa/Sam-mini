function initialize() {
    var marker = new google.maps.Marker({});
    var userAnswer = 0;
    var answered = false;
    var guessed = false;
    var map;

        var mapOptions = {
            zoom: 4,
            center: new google.maps.LatLng(-34.397, 150.644)
        };
        map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        google.maps.event.addListener(map, 'click', function(event) {
            if (answered) {} else {
                marker.setMap(null);
                marker = null;
                placeMarker(event.latLng);
                guessed = true;
            }
        });

        function placeMarker(location) {
            userAnswer = location;
            marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }

    if ($('#answer').length !== 0) {
        $('#answer').on('click', function(){
            if (guessed) {
                answered = true;
                $.ajax(url + "game/getLatLon/" + gamephoto_id)
                    .done(function(result) {
                        var latlong = result.split(',');
                        var latilongi = new google.maps.LatLng(latlong[0], latlong[1]);
                        window.alert(latilongi);
                        $('#answer').hide();

                        /*var answerMarker = new google.maps.Marker({
                            position: latLon,
                            map: map
                        });*/
                    })
                    .fail(function() {
                        window.alert("something went wrong.");
                    })
                    .always(function() {
                    });
            } else {
                window.alert("You havent guessed yet.")
            };
        });
    }
}

google.maps.event.addDomListener(window, 'load', initialize);

