<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Hotel Mariott de Constanine">
    <meta name="author" content="HACHANI Ala eddine">
    <meta name="keywords" content="Hotel, 5 stars, Algérie, Constantine, ville des ponts suspondus, capitale de la culture">

    <title>Hôtel Mariott de Constantine</title>

    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" media="all and (max-device-width: 480px)" href="css/styleMobile.css"/>
   
    <script src="js/jquery-2.0.0.js"></script>
      
      <?php
        $numRoute = $_POST['NumRoute'];
        ?>
      
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    <script>
    function initialize() {
    var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(36.348122, 6.617400),
    mapTypeId: google.maps.MapTypeId.ROADMAP
    };
        var marker=new google.maps.Marker({
  position:new google.maps.LatLng(36.348122, 6.617400),
  animation:google.maps.Animation.BOUNCE,
    title : 'Hotel Mariott de Constantine'
  } );
   


    var map = new google.maps.Map(document.getElementById('googleMap'),
      mapOptions);

    var flightPlanCoordinates = [
    <?php
    //If konesi.php outputs ANYTHING, the map will fail to load. However, you should
   
        $bdd = new PDO('mysql:host=localhost;dbname=hoteldb','hachani','H6bfqd7O');
		
        $query=$bdd->prepare(' SELECT lat, long1, lat2, long2 FROM user_location where id=?');
        $query->execute(array($numRoute));
        $row = $query->fetch();
        $lat = $row['lat'];
        $lon = $row['long1'];
        $lat2 = $row['lat2'];
        $lon2 = $row['long2'];


    //Echo out the users start location
        echo 'new google.maps.LatLng('.$lat.', '.$lon.'),';
        
        $query=$bdd->prepare(' SELECT lat, lng FROM route where name=?');
        $query->execute(array($numRoute));

    while($row = $query->fetch()){
        $lat = $row['lat'];
        $lon = $row['lng'];
        echo 'new google.maps.LatLng('.$lat.', '.$lon.'),';
    }

	/*$connection = mysqli_connect("localhost","root","","hoteldb");
    
  
    //switch to correct database
    mysqli_select_db($connection,"hoteldb");

    //Query the user for start and ending location. Store locations in variables
    $query = mysqli_query($connection,"SELECT lat, long1, lat2, long2 FROM user_location LIMIT 1");
    $row = mysqli_fetch_assoc($query);
    $lat = $row['lat'];
    $lon = $row['long1'];
    $lat2 = $row['lat2'];
    $lon2 = $row['long2'];*/


    //Assuming route that lat and long coordinates are in multiple records and not in a array within a single record
    //Loop through all records and echo out the positions
    

    //echo users ending position
    echo 'new google.maps.LatLng('.$lat2.', '.$lon2.')';

    ?>

    ];

    var flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates,
        geodesic: true,
        strokeColor: '#e97f0e',
        strokeOpacity: 1.0,
        strokeWeight: 4
    });
    flightPath.setMap(map);
        marker.setMap(map);
    }
    
    google.maps.event.addDomListener(window, 'load', initialize);
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
                            </ul>
                        </div>
    </div>
   <div style="width:100%; background:#eee; padding-top:20px;  height:3%;">  <h1 style="text-align: center; color:#000; 2%"> ☎ Trouvez le chemin vers nous </h1>
     <br/>   <br/> </div>
    <div class="ContenuPage">
    
    <div id="googleMap"></div>
    
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