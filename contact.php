<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Hotel Mariott de Constanine">
    <meta name="author" content="HACHANI Ala eddinenenenene">
    <meta name="keywords" content="Hotel, 5 stars, Algérie, Constantine, ville des ponts suspondus, capitale de la culture">

    <title>Hôtel Mariott de Constantine</title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" media="all and (max-device-width: 480px)" href="css/styleMobile.css"/>
   
    <script src="js/jquery-2.0.0.js"></script>
    
        <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
#map {
        width: 900px; 
    height: 500px;
    margin-left: 35%; 
    margin-top: 10%; 
    margin-bottom: 10%;
      }
#floating-panel {
  position: absolute;
  top: 500px;
  left: 2%;
  z-index: 5;
  background-color: #fff;
  padding: 5px;
  text-align: center;
  font-family: 'Roboto','sans-serif';
  line-height: 30px;
  padding-left: 10px;
}

    </style>
    
    
    <script>
var mariott = {lat: 36.348122, lng: 6.617400};
var map;
var infowindow;

function initMap() {
  
 var directionsService = new google.maps.DirectionsService;
  var directionsDisplay = new google.maps.DirectionsRenderer;
    
  map = new google.maps.Map(document.getElementById('map'), {
    center: mariott,
    zoom: 15
  });

  infowindow = new google.maps.InfoWindow();

 var marker=new google.maps.Marker({
  position:new google.maps.LatLng(36.348122, 6.617400),
  animation:google.maps.Animation.BOUNCE,
    title : 'ecole national ESI'
  } );
    marker.setMap(map);
    
 directionsDisplay.setMap(map);

  var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay);
  };
  document.getElementById('start').addEventListener('change', onChangeHandler);
 
}
function foodSearch()
{
             var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: mariott,
    radius: 1000,
    types: ['food']
  }, callback);
        }
function mallSearch()
        {
             var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: mariott,
    radius: 1000,
    types: ['shopping_mall']
  }, callback2);
        }
function StadiumSearch()
        {
var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: mariott,
    radius: 1000,
    types: ['stadium']
  }, callback3);
        }
        
function DoctorSearch()
        {
var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: mariott,
    radius: 1000,
    types: ['health']
  }, callback4);
        }        

function GasStationSearch()
        {
var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: mariott,
    radius: 1000,
    types: ['gas_station']
  }, callback5);
        }     

function SchoolSearch()
        {
var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: mariott,
    radius: 1000,
    types: ['school']
  }, callback6);
        } 

function BankSearch()
        {
var service = new google.maps.places.PlacesService(map);
  service.nearbySearch({
    location: mariott,
    radius: 1000,
    types: ['bank']
  }, callback7);
        } 

        
        
function callback7(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker7(results[i]);
    }
  }
} 
                
function callback6(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker6(results[i]);
    }
  }
} 
                
function callback5(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker5(results[i]);
    }
  }
} 
        
        
function callback4(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker4(results[i]);
    }
  }
}        
        
function callback3(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker3(results[i]);
    }
  }
} 
        
function callback2(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker2(results[i]);
    }
  }
}       

function callback(results, status) {
  if (status === google.maps.places.PlacesServiceStatus.OK) {
    for (var i = 0; i < results.length; i++) {
      createMarker(results[i]);
    }
  }
}

function createMarker(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
         "icon": 'images/restaurant-71.png',
    position: place.geometry.location
  });


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}

function createMarker2(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
         "icon": 'images/shopping-71.png',
    position: place.geometry.location
  });


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}
        
        
function createMarker3(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
         "icon": 'images/stadium-71.png',
    position: place.geometry.location
  });


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}
        
function createMarker4(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
         "icon": 'images/doctor-71.png',
    position: place.geometry.location
  });


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}        
  
        
function createMarker5(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
         "icon": 'images/gas_station-71.png',
    position: place.geometry.location
  });


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}
        
        
function createMarker6(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
         "icon": 'images/school-71.png',
    position: place.geometry.location
  });


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}
        
function createMarker7(place) {
  var placeLoc = place.geometry.location;
  var marker = new google.maps.Marker({
    map: map,
         "icon": 'images/villa.png',
    position: place.geometry.location
  });


  google.maps.event.addListener(marker, 'click', function() {
    infowindow.setContent(place.name);
    infowindow.open(map, this);
  });
}
        
function calculateAndDisplayRoute(directionsService, directionsDisplay) {
  directionsService.route({
    origin: document.getElementById('start').value,
    destination: "36.347136, 6.616989",
    travelMode: google.maps.TravelMode.DRIVING
  }, function(response, status) {
    if (status === google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    } else {
      window.alert('Directions request failed due to ' + status);
    }
  });
}

    </script>
  </head>
    

<body>
                
    <div class="headerRooms">
						<div id="menu">
                            <ul>
                            <li><a href="index.php">🏠 Accueil</a></li>
                            <li><a href="HotelChambres.php">🏩 Chambres</a> </li>
                            <li><a href="Restaurants.php">🍴 Restaurants</a></li>
                            <li><a href="GymSpa.php">💆 Spa & Gym </a></li>
                            <li><a href="contact.php">☎ Contact</a></li>                                
                            <li><a href="ReservationChambre.php"> 📧 Réservation</a></li>
                            </ul>
                        </div>
    </div>
   <div style="width:100%; background:#eee; padding-top:20px;  height:25%;">  <h1 style="text-align: center; color:#000; 2%">  📍 Trouvez le chemin vers nous </h1>
     <br/>   <br/> </div>
    <div class="ContenuPage">
    
     <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places&callback=initMap" async defer></script>
 
    
    </div>
    
    
     <div id="floating-panel">
         <h1 style="color: black; font-size:30px;"> Tracer l'itinéraire vers nous : </h1>
    <b>Depuis: </b>
    <select id="start" onchange="calcRoute();">
      <option value="Rue Ernesto Che Guevara, Constantine, Algeria">Mosquée</option>
      <option value="N79, Hamma Bouziane, Constantine, Algeria">Hamma</option>
      <option value="36.260214, 6.580575">Coupole Mall</option>
    </select>
              <br/>   <br/>
         
          <h1 style="color: black; font-size:30px;"> A proximité de l'hôtel : </h1>
          <form style="color:black" class="formulaire">
        
    <input style="color:black" class="check" type="checkbox" name="proche[]" value="Restaurant" onchange="foodSearch()" /> Restaurant <br/>
    <input style="color:black" class="check" type="checkbox" name="proche[]" value="Attraction" onchange="mallSearch()"/> Mall  <br/>
    <input style="color:black" class="check" type="checkbox" name="proche[]" value="Attraction" onchange="DoctorSearch()"/> Santé  <br/>
    <input style="color:black" class="check" type="checkbox" name="proche[]" value="Attraction" onchange="StadiumSearch()" /> Stade  <br/>
    <input style="color:black, float:left" class="check" type="checkbox" name="proche[]" value="Attraction" onchange="GasStationSearch()" /> Station de service  <br/>
    <input style="color:black,float:left" class="check" type="checkbox" name="proche[]" value="Attraction" onchange="SchoolSearch()" /> Ecole  <br/>
    <input style="color:black" class="check" type="checkbox" name="proche[]" value="Attraction" onchange="BankSearch()" /> Banque  <br/>
    
    </form>
    </div>
    
   
   
   
    
    <div class="footer-section">
						<div class="container">
							<div class="footer-top">
								<p>&copy; 2016 Mariott Hotel, Constantine. Tous droits réservés | Réalisé par :  HACHANI Ala eddine  </p>
				        </div>
						
				</div>
       </div>
    
        
</body>
</html>
    