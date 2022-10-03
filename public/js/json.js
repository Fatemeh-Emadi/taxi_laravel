var taxi;
async function read_data(file){
    let x=await fetch(file);
    let y=await x.text();
    taxi=JSON.parse(y);
    console.log(taxi);        
}
read_data("https://raw.githubusercontent.com/Fatemeh-Emadi/web19/main/snapp.json");
var lat1;
var lat2;
var lat3;
var lng1;
var lng2;
var lng3;
function display(){
    
    lat1=taxi[0].lat;
    lng1=taxi[0].lng;
    lat2=taxi[1].lat;
    lng2=taxi[1].lng;
    lat3=taxi[2].lat;
    lng3=taxi[2].lng;
    var myCenter1=new google.maps.LatLng(lat1,lng1);
    map.setCenter(myCenter1);
    var marker3 = new google.maps.Marker({   
        position: myCenter1,
        draggable:false,
        icon:'images/car.png',
        animation:google.maps.Animation.BOUNCE
    });

    marker3.setMap(map);

    var myCenter2=new google.maps.LatLng(lat2,lng2);
    map.setCenter(myCenter2);
    var marker4 = new google.maps.Marker({   
    position: myCenter2,
    draggable:false,
    icon:'images/car.png',
    animation:google.maps.Animation.BOUNCE
});

marker4.setMap(map);

var myCenter3=new google.maps.LatLng(lat3,lng3);
    map.setCenter(myCenter3);
    var marker5 = new google.maps.Marker({   
    position: myCenter3,
    draggable:false,
    icon:'images/car.png',
    animation:google.maps.Animation.BOUNCE
});

marker5.setMap(map);

}


    



    
    




