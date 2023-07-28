<?php
include('authentication.php');
include('database.php');




?>


<?php

include('database.php');
?>
<!doctype html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="index1.css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e5823df915.js" crossorigin="anonymous"></script>
    <!--like and dislike added-->
    <script type="text/javascript">
        $(function() {
            $('.rating').barrating({
                theme: 'fontawesome-stars',
                onSelect: function(value, text, event) {

                    // Get element id by data-id attribute
                    var el = this;
                    var el_id = el.$elem.data('id');

                    // rating was selected by a user
                    if (typeof(event) !== 'undefined') {
                        
                        var split_id = el_id.split("_");

                        var placeid= split_id[1];  // postid

                        // AJAX Request
                        $.ajax({
                            url: 'rating_ajax.php',
                            type: 'post',
                            data: {placeid:placeid,rating:value},
                            dataType: 'json',
                            success: function(data){
                                // Update average
                                var average = data['averageRating'];
                                $('#avgrating_'+placeid).text(average);
                            }
                        });
                    }
                }
            });
        });
      </script>
    <style>
      body{
        overflow-x: hidden;
      
      }
      .navbar {
  		
 		background-image: url('Backg.png');
 		
  		
  		background-repeat:repeat;
  	
  		background-size:30%,auto;
  		
  	
      height:60PX; /* Adjust the height as needed */
      width:100%; /* Adjust the width as needed */
      /* Additional styling for the navbar brand */
  }
    </style>
</head>
    

       <!--navbar-->
       <nav class="navbar navbar-expand-lg navbar-dark text-dark   bg-dark text-center text-dark ">
            
        <div class="container-fluid">
          <a class="navbar-brand text-dark " href="index.php">D-N</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" style="color:#e2f59d; text-shadow: .1rem .1rem .5rem black;font-weight:700;font-size: 19px;" href="index.php">Home</a>
              </li>
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" style="color:#e2f59d; text-shadow: .1rem .1rem .5rem black;font-weight:700;font-size: 19px;" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Places
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php
                  /*Edit here the Popular places*/
                    $sql="SELECT * FROM catagories";
                    $sql_run=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($sql_run)>0){
                      foreach($sql_run as $row)
                      {
                      ?>
                      <li><a class="dropdown-item" href="catagories.php?cat_name=<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name'];?></a></li>
                   
                      <?php
                      }
                    }
                  ?>
                  

                  
                </ul>
                <li class="nav-item">
                    <a class="nav-link" style="color:#e2f59d; text-shadow: .1rem .1rem .5rem black;font-weight:700;font-size: 19px;" href="Placesaccording.php">Places</a>
                  </li>
              </li>
             
             
            </ul>
                   
            <ul class="navbar-nav ml-auto">
          <li class="nav-item ">
                <div class="dropdown">
           <a class="btn btn-secondary dropdown-toggle" href="#" id="dropdownMenuButton" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  
                <img src="profile.png"  alt="profile" style="height:30px;">
               
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <form action="code.php"method="POST">
                <div class="btn btn-secondary ">
            <a class="dropdown-item " href="Profile.php?users_id=<?php  echo $_SESSION['auth_user']['user_id'] ;  ?>">
            <?php
               if(isset($_SESSION['auth'])){
              echo $_SESSION['auth_user']['user_name'] ;
              }
              else{
                echo "Not logged IN";
              }
               
               ?>
               </a>
               </div>
              
              <a class="dropdown-item" name="ChangePassword" href="AddPlaces.php">Add Place</a>
              
              
              <a class="dropdown-item" name="ChangePassword" href="ChangePassword.php?users_id=<?php  echo $_SESSION['auth_user']['user_id'] ;  ?>">Change password</a>
             
                <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                    

              </form>
                  </div>
          </li>
</ul>




         <div class="d-flex">
              <input class="form-control me-2" id="Location_input" type="text"  placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" name="submitsearch"  onclick="displayLocationAndNearbyPlaces()">Search</button>
              </div>
            </div>
         
         </div>
            </nav>


            <body>
<main>
    <div class="container-fluid p-0">
    <div class="nav pt-1">
      
    </div>
        <div class="row">
        <div class="col-md-12">
          <?php
          include("admin/message.php");
          ?>
        </div>
          <!--  <div class="row">
                                    <div class="col-md-8" id="imageHolder"></div>
                                <div class="col-md-4" id="nameHolder">
                                <p>Here holds the name</p>
                            </div>
                              </div>
                              <div class="row" id="infoRow">
                                  <div class="col-md-12" id="infoHolder">
                                      <p>This holds information</p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <button class="btn btn-primary" id="viewMoreButton">View more</button>
                                  </div>
                                  -->
                        <!--Section: Block Content-->
        
                      <div class="container">
                               <div class="row" style="height: 700px;">
                              
                                <div class="col" id="map" style="display: block;"   ></div>
<!--Places detail start-->
                                <div id="info"class="col-md-6" style="display: none;" >
                            <div class="container bg-dark rounded-9 text-light py-4">
                              <div class="row">
                                <div class="col-md-4">
                          <article class="postcard dark yellow" id="imageHolder">
                               
                                 
                                
                                </div>
                                <div class="col-md-8">
                                <div class="postcard__text" >
                                  
                                  <h4 class="postcard__title yellow" id="nameHolder"></h4>
                                  <div class="postcard__subtitle small">
                                    
                                  </div>
                                  <div class="postcard__bar"></div>
                                  <div class="postcard__preview-txt" id="discription">One of the holiest Hindu shrines in Nepal, the Pashupatinath Temple is stretched across both the banks of the beautiful and sacred Bagmati River on the eastern fringes of the capital city of Kathmandu. The magnificent sanctum devoted to Lord Shiva draws in thousands of devotees who come to offer their prayers and seek blessings from him. Sprawled over a large area with temples and ashrams, it is believed that the Jyotirlinga housed in the Pashupatinath temple is the head of the body which is made up of the twelve Jyotirlinga in India. In 1979, the magnificent temple was declared a UNESCO World Heritage Site.</div>
                                  <ul class="postcard__tagbox">
                                    <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
                                    <li class="tag__item"><i class="fas fa-clock mr-2"></i>55 mins.</li>
                                    <!--rating the post-->
                                    <div class="post-action">
                                                <!-- Rating -->
                                                <!-- <select class='rating' id='rating_<?php/* echo $placeid; */?>' data-id='rating_<?php/* echo $placeid;*/ ?>'>
                                                        <option value="1" >1</option>
                                                        <option value="2" >2</option>
                                                        <option value="3" >3</option>
                                                        <option value="4" >4</option>
                                                        <option value="5" >5</option>
                                                    </select>-->
                                               <div class='rating' id='rating_<?php echo $placeid; ?>' data-id='rating_<?php echo $placeid; ?>'>
                                                <span class="fa fa-star checked" value="1"></span>
                                                    <span class="fa fa-star checked" value="2"></span>
                                                    <span class="fa fa-star checked" value="3"></span>
                                                    <span class="fa fa-star" value="4"></span>
                                                    <span class="fa fa-star" value="5"></span>
                                                </div>
                                                <div style='clear: both;'></div>
                                                Average Rating :<!-- <span id='avgrating_<?php  /*echo $placeid;*/ ?>'><?php /*echo $averageRating; */?></span>-->

                                                <!-- Set rating -->
                                                <script type='text/javascript'>
                                                $(document).ready(function(){
                                                    $('#rating_<?php echo $placeid; ?>').barrating('set',<?php echo $rating; ?>);
                                                });
                                                
                                                </script>
                                     </div>
                                    <!--rating the post-->
                                    </div>
                                    </div>
                                    <div class="row" id="demo">
                                    

                                  
                                  <div class="col-md-2">   <button type="button" class="btn btn-success" ng-click="incrementLikes(technology)"><span class="glyphicon glyphicon-thumbs-up"></span> Likes</button></div>
                                  <div class="col-md-2">  <button type="button" class="btn btn-danger" ng-click="incrementDislikes(technology)"> <span class="glyphicon glyphicon-thumbs-up"></span>Dislikes</button></div>
                                  <div class="col-md-5"></div>
                                  <div class="col-md-3">  <button type="button" class="btn btn-primary"> <span ></span>Comment</button></div>
                
                                        

                                      </div>
                          </div>
                                      
                                    </li>
                                  </ul>
                                </div>
                              </article>
                            
                            
                          
            
	

	</div>
</section>
                              </div>
                              <!--Places detail end-->

                                    <!--<div class="row">
                                                    <div class="col-md-4"></div>
                                                
                                                    <p>here holds the image</p>
                                                  </div>
                                                    <div class="col-md-4">
                                                      <p>Here holds the name</p>


                                                  </div>
                                     </div>
                                  <div  class="row">
                                    <p>this hold information</P>

                                </div>

                                <div class="row">
                                  <button class="btn btn-primary"> view more</button>
                                </div>
            </div>-->
            <!--End of to show-->

                              <script >
                                /*
                                  function initMap(){
                                    var x=navigator.geolocation;
                                    x.getCurrentPosition(sucess,failure);
                                    function sucess(position){
                                      var mylat=position.coords.latitude;
                                      var mylong=position.coords.longitude;
                                      var location=new google.maps.LatLng(mylat,mylong);

                                      var map=new google.maps.Map(document.getElementById("map")
                                      ,{
                                          zoom:10,
                                          center:location
                                        });
                                        var marker=new google.maps.Marker({
                                          position:location,
                                          map:map
                                        });
                                      }
                                    }
                                    function failure(){
                                      
                                    }*/
                                </script>
                               
                    




                                

                               


                              </div>
                        </div>


                       


</main>

</body>
<script>
  $(function () {
  $('[data-toggle="popover"]').popover()
})
              
              var map;
              var markers = [];
              var infoWindow;
              var userLocationMarker;
              //var userMarkerIcon = 'user_marker_icon.png';
              var userMarkerIcon;
              
              function initMap() {
                  var center = { lat: 0, lng: 0 };
                  map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 10,
                      center: center
                  });
                  infoWindow = new google.maps.InfoWindow();
              
                  // Add a click event listener to the map
                  map.addListener('click', function() {
                      infoWindow.close();
                  });
                  userMarkerIcon = {
              path: google.maps.SymbolPath.CIRCLE,
              fillColor: 'blue',
              fillOpacity: 1,
              strokeWeight: 0,
              scale: 8,
              };
              
                  getUserLocation();
              }
              
              function getUserLocation() {
                  if (navigator.geolocation) {
                      navigator.geolocation.getCurrentPosition(
                          function(position) {
                              var userLocation = {
                                  lat: position.coords.latitude,
                                  lng: position.coords.longitude
                              };
              
                              // Add a marker for the user's location
                              userLocationMarker = addMarker(userLocation,null,true);
                              fetchCoordinatesFromNumber(userLocation);
              
                              // Center the map on the user's location
                              map.setCenter(userLocation);
                              //console.log(userLocation);
              
                          },
                          function(error) {
                              console.error('Error getting user location: ', error);
                          }
                      );
                  } else {
                      console.error('Geolocation is not supported by this browser.');
                  }
              }
              
              function displayLocationAndNearbyPlaces() {
                  var locationInput;
                  locationInput = document.getElementById("Location_input").value;
                  console.log(locationInput);
              
                  //fetchCoordinatesFromPlaceName(locationInput);
                      // If both latitude and longitude are provided and valid, proceed with displaying nearby places
                      //if (!isNaN(locationInput)) {
                         // var numericValue = parseFloat(locationInput);
                         // if (!isNaN(numericValue)) {
                          //        fetchCoordinatesFromNumber(numericValue);
                         // } else {
                          //         console.log("Invalid numeric input.");
                         // }
                          //fetchCoordinatesFromNumber(locationInput);
              
                     // }else{
                          // If latitude and longitude are not provided or invalid, assume it's a place name
                          fetchCoordinatesFromPlaceName(locationInput);
                      //} //else{
                      //console.error("Please enter a valid place name or latitude and longitude.");
                  //}
              }
              
              function fetchCoordinatesFromNumber(locationInput) {
              // Check if locationInput is an object with lat and lng properties
              if (typeof locationInput === 'object' && locationInput.hasOwnProperty('lat') && locationInput.hasOwnProperty('lng')) {
              var latitude = parseFloat(locationInput.lat);
              var longitude = parseFloat(locationInput.lng);
            
              
              // Check if the parsed latitude and longitude are valid numbers
              if (!isNaN(latitude) && !isNaN(longitude)) {
                  // Create a LatLng object with the parsed coordinates
                  var location = new google.maps.LatLng(latitude, longitude);
              
                  // Clear any existing markers on the map
                  clearMarkers();
              
                  // Add a marker for the specified location
                  addMarker(location);
              
                  // Fetch the top 5 places with the shortest distance from the specified location
                  fetchNearbyPlaces(location);
              } else {
                  console.error("Invalid latitude and longitude number");
              }
              //console.log("Latitude: " + latitude);
              //console.log("Longitude: " + longitude);
              } else {
              console.error("Invalid locationInput format. Expected an object with 'lat' and 'lng' properties.");
              }
              }
              
              
              // Function to fetch coordinates from the database based on the place name
              function fetchCoordinatesFromPlaceName(placeName) {
              var xhr = new XMLHttpRequest();
              xhr.open('GET', 'fetch_coordinates.php?placeName=' + encodeURIComponent(placeName), true);
              xhr.onload = function() {
              //console.log(xhr.responseText); 
              if (xhr.status === 200) {
                  var response = JSON.parse(xhr.responseText);
                  if (Array.isArray(response)) {
                      for (var i = 0; i < response.length; i++) {
                          var location = response[i];
                          var latitude = parseFloat(location.latitude);
                          var longitude = parseFloat(location.longitude);
                          var name =location.name;
                          var discription=location.discription;
                          var imgUrl = location.imageUrl;
              
                          //console.log("Location " + i + ": Latitude:", latitude);
                          //console.log("Location " + i + ": Longitude:", longitude);
                          //console.log("Location " + i + ": imgUrl:", imgUrl);
              
                          if (!isNaN(latitude) && !isNaN(longitude) ) {
                              var locationCoords = new google.maps.LatLng(latitude, longitude);
                              //console.log(locationCoords);
                              clearMarkers();
                              addMarker(locationCoords,imgUrl);
                              fetchNearbyPlaces(locationCoords); // Call fetchNearbyPlaces with the user's location
                          } else {
                              console.error("Invalid latitude and longitude for Location " + i);
                          }
                      }
                  } else {
                      console.error("Invalid response format: Expected an array");
                  }
              } else {
                  console.error("Error fetching place coordinates");
              }
              };
              xhr.send();
              }
              
              
              function clearMarkers() {
                   for (var i = 0; i < markers.length; i++) {
              // Check if the current marker is not the user location marker
              if (markers[i] !== userLocationMarker) {
                  markers[i].setMap(null); // Remove the marker from the map
              }
              }
              markers = [userLocationMarker]; // Reset the markers array to only include the user location marker
              }
              
              function addMarker(location,imgUrl,isUserLocation = false) {
                  var marker;
                  if (isUserLocation) {
                      marker = new google.maps.Marker({
                      position: location,
                      map: map,
                      icon: userMarkerIcon, // Use the custom blue circle icon for the user's location
                  });
                  } else {
                      marker = new google.maps.Marker({
                      position: location,
                      map: map,
                    
                  //icon: imgUrl, // Use the respective image for other nearby places
                  });
                  }
                  markers.push(marker);
                  marker.addListener('click', function() {
                      displayLocationInfo(marker);
                      displayLocationInfo1(marker,imgUrl,name,discription);
              
                  });
              }
              
              function fetchNearbyPlaces(userLocation) {
                  // Clear any existing markers
                   clearMarkersExceptUserLocation();
              
              // Add the user's location marker
              userLocationMarker = addMarker(userLocation, null, true);
                  
                  // AJAX request to fetch the top 5 places with the shortest distance
                  var xhr = new XMLHttpRequest();
                  xhr.open('GET', 'fetch_coordinates.php?latitude=' + userLocation.lat() + '&longitude=' + userLocation.lng(), true);
              
                  xhr.onload = function() {
                      //console.log(xhr.responseText); 
                      if (xhr.status === 200) {
                          var places = JSON.parse(xhr.responseText);
                          console.log(places);
                          displayNearbyPlaces(places);
                          displayNearbyPlaces1(places);
                      } else {
                          console.error("Error fetching nearby places");
                      }
                  };
                  xhr.send();
              }
              
              function clearMarkersExceptUserLocation() {
              for (var i = 0; i < markers.length; i++) {
              if (markers[i] !== userLocationMarker) {
                  markers[i].setMap(null);
              }
              }
              markers = [userLocationMarker];
              }
              
              function displayNearbyPlaces(places) {
                  for (var i = 0; i < places.length; i++) {
                      var location = new google.maps.LatLng(places[i].latitude, places[i].longitude);
                      var imageUrl = places[i].imageUrl; // Assuming the place data contains an 'imageUrl' field
                      //console.log(imageUrl);
                      addMarker(location, imageUrl);
                      
                  }
              }
              
              /*function displayNearbyPlaces1(places) {
              var infoContent = '';
              
              if (places.length === 0) {
              infoContent = '<div>No nearby places found.</div>';
              } else {
              for (var i = 0; i < places.length; i++) {
              var location = new google.maps.LatLng(places[i].latitude, places[i].longitude);
              var imageUrl = places[i].imageUrl;
              
              infoContent += '<div><strong>Place ' + (i + 1) + '</strong></div>';
              infoContent += '<div>Latitude: ' + places[i].latitude + '</div>';
              infoContent += '<div>Longitude: ' + places[i].longitude + '</div>';
              
              if (imageUrl) {
              infoContent += '<div><img src="' + imageUrl + '" width="200" height="150" alt="Location Image"></div>';
              }
              }
              }
              
              // Set the content in the <div id="info">
              document.getElementById('nerby').innerHTML = infoContent;
              }*/
              
              
              
              
              function displayLocationInfo(marker, imgUrl) {
    // Fetch additional information about the location from your database or an external API
    var location = marker.getPosition();

    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ location: location }, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                var locationInfo = results[0].formatted_address;
                var nameInfo = results[0].formatted_address;

                // Create an HTML content string for the info window
                var infoWindowContent = '';
                if (imgUrl) {
                    infoWindowContent += '<div class="row">';
                    infoWindowContent += '<div class="col-md-4"></div>';
                    infoWindowContent += '<img src="' + imgUrl + '" width="200" height="150" alt="Location Image">';
                    infoWindowContent += '</div>';
                    infoWindowContent += '<div class="col-md-4">';
                    infoWindowContent += '<p>Here holds the name</p>';
                    infoWindowContent += '</div>';
                }
                infoWindowContent += '</div>';
                infoWindowContent += '<div class="row">';
                infoWindowContent += '<p>' + locationInfo + '</p>';
                infoWindowContent += '</div>';

                infoWindow.setContent(infoWindowContent);
                infoWindow.open(map, marker);
            } else {
                console.error("No results found for the location.");
            }
        } else {
            console.error("Geocoder failed due to: " + status);
        }
    });
}

              
function displayLocationInfo1(marker, imgUrl,name,discription) {
    var location = marker.getPosition();

    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({ location: location }, function (results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                var locationInfo = results[0].formatted_address;
     

                // Update the content of the specified elements
                if (imgUrl) {
                    document.getElementById("imageHolder").innerHTML = '<img src="' + imgUrl + '" width="200" height="150" alt="Location Image">';
                    document.getElementById("nameHolder").innerHTML = name; // Replace with actual name
                }
                document.getElementById("infoHolder").innerHTML = 
                
              document.getElementById("info").style.display = "block";
  
                // Show the view more button (if necessary)
                document.getElementById("viewMoreButton").style.display = "block";
            } else {
                console.error("No results found for the location.");
            }
        } else {
            console.error("Geocoder failed due to: " + status);
        }
    });
}

              
              
              
              </script>                     
              <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0M-UwBtxishqPfQVym_g369dW3MQk3Ys&callback=initMap">
              
              </script>

<!--footer section-->
<?php
include('footer.php');
?>