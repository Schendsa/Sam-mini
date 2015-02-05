function initialize() {
    var marker = new google.maps.Marker({});
    var answered = false;
    var guessed = false;
    var map;
    var Score = 0;

        var mapOptions = {
            zoom: 4,
            center: new google.maps.LatLng(51, 5)
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
                        var newResult = result.split("/");
                        var LatLon = new google.maps.LatLng(newResult[0], newResult[1]);
                        $('#answer').hide();

                        var answerMarker = new google.maps.Marker({
                            position: LatLon,
                            map: map
                        });

                        var userMarkerCoordinates = marker.getPosition(); 
                        var answerMarkerCoordinates = answerMarker.getPosition();
                        var distance = google.maps.geometry.spherical.computeDistanceBetween(userMarkerCoordinates, answerMarkerCoordinates) / 1000;
                        Score = 10000 - Math.round(distance);
                        if (Score < 0 ) {
                            Score = 0 
                        };
                        window.alert(Score + " Points");

                        })
                    .fail(function() {
                        window.alert("something went wrong.");
                    })
            } else {
                window.alert("You havent placed a marker yet.")
            };
        });
    }

    if ($('#save').length !== 0) {
        $('#save').on('click', function(){
            if (answered) {
                window.location.href = url + "game/score/" + gamephoto_id + "/" + Score;
            } else {
                window.alert("You havent played the game yet.")
            };
        });
    }
}

google.maps.event.addDomListener(window, 'load', initialize);