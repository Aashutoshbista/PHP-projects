<?php
include('authentication.php');
include('database.php');
include('header.php');




?>






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
                        <!--Section: Block Content-->
          
                        <div class="container">
                               <div class="row" style="height: 700px;">
                              
                                <div class=" " id="map" style="height:100%;width=100%" ></div>
          
                              <script >
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
                                      
                                    }
                                </script>
                                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCtbzarTMw_16HlOy-duoMrIaB2DYqWzRQ&callback=initMap">

                                </script><?php
                                 if(isset($_POST['submitsearch'])){
                                        $search=mysqli_real_escape_string($conn,$_POST['searchinput']);
                                        $query="SELECT *  FROM places WHERE p_name LIKE '%$search%' OR p_prov LIKE '%$search%' OR p_catagory LIKE '%$search%' OR p_type LIKE '%$search%'";
                                        $result=mysqli_query($conn,$query);
                                        $queryResult=mysqli_num_rows($result);
                                        if($queryResult > 0){
                                            while($row=mysqli_fetch_assoc($result)){?>
                                            <script>
                                             var longitude=$row["p_longitude"];
                                              var latitude=$row["p_latitude"];



                                              function initMap(){
                                                    var location={latitude,longitude};
                                                    var map=new google.maps.Map(document.getElementById("map"){
                                                      zoom:10,
                                                      center:location
                                                    });
                                                    var marker=new google.maps.Marker({
                                                      position:location,
                                                      map:map
                                                    });
                                                  }


                                              </script>




<?php
                                             
                                        }
                                               

                                      }}
                                      ?>
                                

                               


                              </div>
                        </div>


                       



</main>

<!--footer section-->
<?php
include('footer.php');
?>