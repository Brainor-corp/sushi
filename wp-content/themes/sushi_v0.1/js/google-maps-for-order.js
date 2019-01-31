$(document).ready(function () {
    let defaultCenter = {lat: 55.753179, lng: 37.622465};
    let markers = [];

    function updateInputCoords(coords) {
        $('#google_map_coords').val(coords.lat + ', ' + coords.lng);
        console.log($('#google_map_coords').val());
    }

    updateInputCoords(defaultCenter);

    function placeMarkerAndPanTo(latLng, map) {
        let marker = new google.maps.Marker({
            position: latLng,
            map: map
        });
        // map.panTo(latLng);
        // Clear out the old markers.
        markers.forEach(function (mark) {
            mark.setMap(null);
        });
        markers.push(marker);

        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;
        geocodeLatLng(geocoder, map, infowindow, latLng.toJSON());

        updateInputCoords(latLng.toJSON());
    }

    function geocodeLatLng(geocoder, map, infowindow, coords) {
        var latlng = {lat: parseFloat(coords.lat), lng: parseFloat(coords.lng)};
        geocoder.geocode({'location': latlng}, function(results, status) {
            if (status === 'OK') {
                if (results[0]) {
                    $('#pac-input').val(results[0].formatted_address);
                } else {
                    $('#pac-input').val('');
                }
            } else {
                console.log('Geocoder failed due to: ' + status);
            }
        });
    }

    function initAutocomplete() {
        let map = new google.maps.Map(document.getElementById('map'), {
            center: defaultCenter,
            zoom: 13,
            mapTypeId: 'roadmap'
        });

        map.addListener('click', function (e) {
            placeMarkerAndPanTo(e.latLng, map);
        });

        // Create the search box and link it to the UI element.
        let input = document.getElementById('pac-input');
        let searchBox = new google.maps.places.SearchBox(input);
        // map.controls[google.maps.ControlPosition.TOP_RIGHT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function () {
            searchBox.setBounds(map.getBounds());
        });

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function () {
            let places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function (marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            let bounds = new google.maps.LatLngBounds();
            places.forEach(function (place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    title: place.name,
                    position: place.geometry.location
                }));

                updateInputCoords(place.geometry.location.toJSON());

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

    initAutocomplete();
});
