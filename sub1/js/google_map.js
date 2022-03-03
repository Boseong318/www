// JavaScript Document

 function initialize() {
  var myLatlng = new google.maps.LatLng(37.49663538364643, 127.03069826839784);
  var myOptions = {
   zoom: 15,
   center: myLatlng

  }
  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
 
  var marker = new google.maps.Marker({
   position: myLatlng, 
   map: map, 
   title:"(주)우리집"
  });   
  
 
  var infowindow = new google.maps.InfoWindow({
   content: "(주)우리집구석"
  });
 
  infowindow.open(map,marker);
 }
 
 
 window.onload=function(){
  initialize();
 }

