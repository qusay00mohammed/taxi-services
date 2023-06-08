//javascript.js
//set map options

var myLatLng = { lat: 42.939652371937036, lng: -78.72953218355356 };
var mapOptions = {
    center: myLatLng,
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
};

//create map
var map = new google.maps.Map(document.getElementById("mile_map"), mapOptions);

//create a DirectionsService object to use the route method and get a result for our request
var directionsService = new google.maps.DirectionsService();

//create a DirectionsRenderer object which we will use to display the route
var directionsDisplay = new google.maps.DirectionsRenderer();

//bind the DirectionsRenderer to the map
directionsDisplay.setMap(map);


// -----------------------------------


//define calcRoute function
function calcRoute() {
    //create request
    var request = {
        origin: document.getElementById("mile_from").value,
        destination: document.getElementById("mile_to").value,
        travelMode: google.maps.TravelMode.DRIVING, //WALKING, BYCYCLING, TRANSIT
        unitSystem: google.maps.UnitSystem.IMPERIAL,
    };

    //pass the request to the route method
    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {

            //Get distance and time
            const mile_mile = document.querySelector("#mile_mile");
            var mile = result.routes[0].legs[0].distance.text;

            var replaceMile = mile.replace(',', '');
            var mile = parseFloat(replaceMile);


            const mile_price = document.querySelector("#mile_price");
            var mi = result.routes[0].legs[0].distance.text;
            var replaceMile = mi.replace(',', '');
            var amount = (parseFloat(replaceMile) * 3.5) + 5.3;
            
            const mile_endPrice = document.querySelector("#mile_endPrice");
            mile_endPrice.value = mile;
            console.log(mile);

            const two_way = document.getElementById('two_way');
            if(two_way.checked) {
                amount = amount * 2;
                mile = mile * 2;
            }

            mile_mile.value = mile + 'Mile';
            mile_price.value = amount;


            //display route
            directionsDisplay.setDirections(result);
        } else {
            //delete route from map
            directionsDisplay.setDirections({ routes: [] });
            //center map in London
            map.setCenter(myLatLng);

            //show error message
            output.innerHTML =
                "<div class='alert-danger'><i class='fas fa-exclamation-triangle'></i> Could not retrieve driving distance.</div>";
        }
    });
}

//create autocomplete objects for all inputs
var options = {
    types: ["(cities)"],
};

var input1 = document.getElementById("mile_from");
var autocomplete1 = new google.maps.places.Autocomplete(input1, options);

var input2 = document.getElementById("mile_to");
var autocomplete2 = new google.maps.places.Autocomplete(input2, options);


var input3 = document.getElementById("city_pickup");
var autocomplete3 = new google.maps.places.Autocomplete(input3, options);
