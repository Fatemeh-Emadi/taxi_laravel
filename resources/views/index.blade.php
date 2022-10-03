<html>
<head>
 <link type="text/css" href="css/bootstrap.rtl.css" rel="stylesheet">
</head>
<body dir="rtl" >
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand " >
        <img src="images/snappTextLogo.svg">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
         
          <li class="nav-item">
            <a class="nav-link active" href="/register">ثبت نام رانندگان</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">پنل سازمانی</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">درباره ما</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">تماس با ما</a>
          </li>
          
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <div class="container mt-5">
    
    <div class="alert alert-warning" role="alert" id="message">
      آدرس مبدا را انتخاب کن
    </div>
    <div id="googleMap" class="rounded-3" style="width:100%;height:400px;"></div>
   <!-- <p id="lat"></p>
    <p id="lng"></p>
    <p id="lat2"></p>
    <p id="lng2"></p>
   -->
  </div>
    <script>
     var lat=32.4279;
     var lng=53.6880;
     var map;
     var distance;
     var flag=false;
     function getDistance(start,end){
       x1=start.lat();
       y1=start.lng();
       x2=end.lat();
       y2=end.lng();
       distance=Math.sqrt((x1-x2)**2+(y1-y2)**2);
       return distance;

     }

    function myMap() {
    var mapProp= {
      center:new google.maps.LatLng(lat,lng),
      zoom:10,
    };
    map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
}

    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position){
        lat=position.coords.latitude;
        lng=position.coords.longitude;
        
        var myCenter=new google.maps.LatLng(lat,lng);
        map.setCenter(myCenter);

    var marker = new google.maps.Marker({   
        position: myCenter,
        draggable:true,
        icon:'images/icon1.png',
        animation:google.maps.Animation.BOUNCE
    });

    marker.setMap(map);

google.maps.event.addListener(marker, 'click',function(){
    
  //var tag_p_lat=document.getElementById("lat");
  //var tag_p_lng=document.getElementById("lng");

  var selected_location=marker.getPosition();

 // tag_p_lat.innerHTML=selected_location.lat();
 // tag_p_lng.innerHTML=selected_location.lng();
  if(flag==false){
    flag=true;
    document.getElementById("message").innerHTML="آدرس مقصد را انتخاب کن";
  var marker2 = new google.maps.Marker({   
        position: myCenter,
        draggable:true,
        icon:'images/icon2.png',
        animation:google.maps.Animation.BOUNCE
    });

    marker2.setMap(map);

    google.maps.event.addListener(marker2, 'click',function(){
    
   // var tag_p_lat=document.getElementById("lat2");
   // var tag_p_lng=document.getElementById("lng2");
  
    var selected_location2=marker2.getPosition();
  
   // tag_p_lat.innerHTML=selected_location2.lat();
   // tag_p_lng.innerHTML=selected_location2.lng();

    distance=getDistance(selected_location,selected_location2);
    var price=Math.round(distance*2000);
   var message=document.getElementById("message");
   message .innerHTML="درخواست سفر پذیرفته شد. هزینه سفر " +price +" تومان";
   message.classList.remove("alert-warning");
   message.classList.add("alert-success");
   showNotification();
   display();
  });
}
});
    
});
  } else {
    alert = "Geolocation is not supported by this browser.";
  }
 
   getDistance(selected_location,selected_location2);

    </script>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbMng7uNFZaBNuhiXClQbAA8fueE2USG4&callback=myMap"></script>
    <script src="js/notification.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/json.js"></script>
    </body>




</html>