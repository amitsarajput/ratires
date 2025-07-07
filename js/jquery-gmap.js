//var stores='js';
//console.log(stores);
//console.log(redpartneruri);

var citycords={
    'arizona':{lat:34.3316884,lng:-112.1184496},
    'california':{lat:37.5772598,lng:-119.1115786},
    'montata':{lat:47.3504144,lng:-109.3037463},
    'nevada':{lat:39.1960897,lng:-116.5125423},
    'new mexico':{lat:34.5654424,lng:-106.3391112},
    'texas':{lat:31.4570713,lng:-99.2896222},
    'utah':{lat:39.5078714,lng:-111.7033542},
  };
  
var side_bar_html = ""; 

var gmarkers = [];
var gicons = [];
var map = null;
var pincodesar=[]
var infoWindow;
var initialcity='arizona';
var circle = null;
var autocomplete;
var userslatlang;

var geocoder;
var map_wrapper=document.getElementsByClassName('dealer-map');
if (map_wrapper.length) {
    var dealer_map__search=document.getElementsByClassName('dealer-map--search');
    var dealer_map__map=document.getElementsByClassName('dealer-map--map');
    var dealer_map__location=document.getElementsByClassName('dealer-map--location');
    var dealer_map__dealerform=document.getElementById("dealerform");
}

function show__dealerform(element) {
    element.classList.remove("hide");
}
function hide__dealerform(element) {
    element.classList.add("hide");
}


function get_dealerform_status() {
    var myResponse;
    myResponse=$.ajax({
        type : 'GET',
        url : "session/omnidata.dealerform_open/get",
        dataType: 'json',
        async: false,
        success: function(data) {
            return data;
          }
      }).responseText;
      return myResponse;
}

function set_dealerform_status(data) {
    var myResponse;
    myResponse=$.ajax({
        type : 'POST',
        url : "session/omnidata.dealerform_open/set",
        data:{
            'formdata':data
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'json',
        async: false,
        success: function(data) {
            return data;
          }
      }).responseText;
      return myResponse;
}
//set_dealerform_status();
if (get_dealerform_status()==1) {
    //console.log('Show inside condition', get_dealerform_status());
    show__dealerform(document.getElementById("dealerform")); 
} else {
    //console.log('Hide inside condition', get_dealerform_status());
    hide__dealerform(document.getElementById("dealerform")); 
}
//var st=get_dealerform_status('locale')
//console.log(st);

function initMap() {
    var locations={eu:{lat:53.2443649,lng:-2.4459033},apac:{lat:53.2443649,lng:-2.4459033},us:{lat:19.7872722,lng:-92.0931484}};
    var myOptions = {
        zoom: 3,
        center: new google.maps.LatLng(locations['us']),//"53.2443649","-2.4459033"
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    map = new google.maps.Map(document.getElementById("map"), myOptions);
    google.maps.event.addListener(map, 'click', function() {
        infoWindow.close();
    });
    infoWindow = new google.maps.InfoWindow();
    geocoder= new google.maps.Geocoder();

    downloadUrl(stores);

    // Create the autocomplete object, restricting the search predictions to
    // geographical location types.
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("autocomplete"), { types: ['(regions)'] }
    );
    // Avoid paying for data that you don't need by restricting the set of
    // place fields that are returned to just the address components.
    autocomplete.setFields(['address_component']);
    // When the user selects an address from the drop-down, populate the
    // address fields in the form.
    autocomplete.addListener('place_changed', codeAddress());

    geolocate();

}

function loadDoc() {

}

// Read the data
// function downloadUrl() {
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//         var stores=JSON.parse(this.responseText);
//         //console.log(stores);
//         stores.forEach(function(store) {
//             // obtain the attribues of each marker
//             var lat = parseFloat(store.lat);
//             var lng = parseFloat(store.lng);
//             var point = new google.maps.LatLng(lat,lng);
//             var address = store.address;
//             store.city=typeof(store.city)==='undefined'?'':store.city;
//                 address =address+", "+store.city;
//             store.state=typeof(store.state)==='undefined'?'':store.state;
//                 address =address+", "+store.state;
//             store.postal=typeof(store.postal)==='undefined'?'':store.postal;
//                 address =address+" "+store.postal;
//             store.country=typeof(store.country)==='undefined'?'':store.country;
//                 address =address+" "+store.country;
//             var direction = 'https://www.google.com/maps/dir/Current+Location/'+  address;
//             var distance = store.distance;
//                 distance=getdistancestring(distance);
//             var phone = store.phone;
//             var tel = phone.replace(/\D/g, '');
//             var name = store.name;
//             var html = "<h4 class='color ls-0 ' >"+name+"</h4>";
//                 html +="<div class='info-row-withicon phone'><i class='fa fa-fw fa-phone'></i> <a href='tel:"+tel+"'>"+phone+"</a></div>";
//                 html +="<div class='info-row-withicon address'><i class='fa fa-fw fa-map-marker'></i> "+address+"</div>";
//                 html +="<div class='info-row-withicon direction-row'><a class='direction-link' href='"+direction+"' target='_blank'>Directions</a> <div class='direction-distance'>"+distance+"</div></div>";
//             var category = store.category;
//             // create the marker
//             var marker = createMarker(point,name,html,category,store);
//         });
//         }
//     };
//     xhttp.open("GET", "js/stores-uk.js", true);
//     xhttp.send();
// }

// Read the data without xhttp request
function downloadUrl(stores) {
    //var stores=JSON.parse(stores);
        //console.log(stores);
        stores.forEach(function(store) {
            // obtain the attribues of each marker
            var lat = parseFloat(store.lat);
            var lng = parseFloat(store.lng);
            var point = new google.maps.LatLng(lat,lng);
            var address = store.address;
            store.city=typeof(store.city)==='undefined'?'':store.city;
                //address =address+", "+store.city;
            store.state=typeof(store.state)==='undefined'?'':store.state;
                //address =address+", "+store.state;
            store.postal=typeof(store.postal)==='undefined'?'':store.postal;
                //address =address+" "+store.postal;
            store.country=typeof(store.country)==='undefined'?'':store.country;
            store.phone=(store.phone!==null && store.phone.trim()!=="-")?store.phone:null
                //address =address+" "+store.country;
            store.addresspreview=typeof(store.addresspreview)==='undefined'?'':store.addresspreview;
                address=store.addresspreview;
                address=address.replace(/, ,/g, ",");
                address=address.replace(/,,/g, ",");
            var direction = 'https://www.google.com/maps/dir/Current+Location/'+  address;
            var distance = store.distance;
                distance=getdistancestring(distance);
            var phone = store.phone!==null?store.phone:null;
            var tel = phone!=null?phone.replace(/\D/g, ''):null;
            var name = store.name;
            var html = "<h4 class='color ls-0 ' >"+name+"</h4>";
                html +=phone!=null?"<div class='info-row-withicon phone'><i class='omniicon-phone'></i> <a href='tel:"+tel+"'>"+phone+"</a></div>": "";
                html +="<div class='info-row-withicon address'><i class='omniicon-location-pin-2'></i> "+address+"</div>";
                html +="<div class='info-row-withicon direction-row'><a class='direction-link' href='"+direction+"' target='_blank'><i class='omniicon-direction-arrow'></i> Directions</a> <div class='direction-distance'>"+distance+"</div></div>";
            var category = store.category;
            // create the marker
            console.log(store);
            var marker = createMarker(point,name,html,category,store);
        });
}

// A function to create the marker and set up the event window
function createMarker(latlng,name,html,category,store ) {
    var image = {
        url: 'https://www.omni-united.com/assets/img/icons/map-icon-red.png',
        size: new google.maps.Size(32, 39),
        origin: new google.maps.Point(0, 0),
        anchor: new google.maps.Point(0, 32)
    };
    var contentString = html;
    var marker = new google.maps.Marker({
        position: latlng,
        icon: image,
        map: map,
        title: name,
        zIndex: Math.round(latlng.lat()*-100000)<<5,
        });

    //Store the category and name info as a marker properties
    //if(store.state.toLowerCase()!=initialcity){ marker.setVisible(false);} 
    // add data with setValues
    marker.setValues({
      mycategory: category,
      myname: name, 
      myphone: store.phone,
      myphone2: store.phone2,
      myemail: store.email,
      myaddress: store.address,
      myaddresspreview: store.addresspreview,
      mypostal: store.postal,
      mycity: store.city,
      mystate: store.state,
      mycountry: store.country,
      myfeatured: store.featured,
    });
    marker.setVisible(false); //true to show all markers initailly

    gmarkers.push(marker);
    //console.log(marker.get("mydistance"));
    google.maps.event.addListener(marker, 'click', function() {
        var distance,string;
            distance=marker.get("mydistance");
            distance=getdistancestring(distance);
            string=updatestring(contentString,distance);
            infoWindow.setContent(string);
            infoWindow.setOptions({maxWidth:250}); 
            infoWindow.open(map,marker);
            map.panTo(marker.getPosition());
    });
//makeSidebar();
}

function updatestring(s ,value){
    var newstr="<div class='direction-distance'>"+value+"</div>";
        new_s=s.replace(/<div class='direction-distance'>[A-Za-z0-9_]*<\/div>/g, newstr);
    return new_s
}
function getdistancestring(distance){
    var distance_unit="km";
    if(typeof distance !== "undefined" && distance > 0){
        if(distance === 1){distance_unit="km";}
        distance = distance+" "+distance_unit;
    }else{
      distance="";
    }
    return distance;
}


function formsubmission(eve, ele){
    eve.preventDefault();
    codeAddress();
}

function myclick(i) {
    google.maps.event.trigger(gmarkers[i],"click");
}


//rebuilds the sidebar to match the markers currently displayed
function makeSidebar(markers=null) {

    var sidebar=document.getElementById("side_bar");
    var html = "";
    if(markers===null){ markers=gmarkers}
    if (!markers.length) {
        //console.log('Show makeSidebar');
        set_dealerform_status(1);
        show__dealerform(document.getElementById("dealerform"));
    } else {
        //console.log('Hide makeSidebar');
        set_dealerform_status(0);
        hide__dealerform(document.getElementById("dealerform"));
        for (var i=0; i<markers.length; i++) {
            if (markers[i].getVisible()) {
                console.log(markers[i]);
            var distance=markers[i].mydistance;
                distance=getdistancestring(distance);
            var tel=typeof(store.myphone)==='undefined'?markers[i].myphone.replace(/\D/g, ''):null;
            //var address=markers[i].myaddress+", "+markers[i].mycity+", "+markers[i].mystate+" "+markers[i].mypostal+" "+markers[i].mycountry;
            var address=markers[i].myaddresspreview;            
                address=address.replace(/, ,/g, ",");
                address=address.replace(/,,/g, ",");
            var direction = 'https://www.google.com/maps/dir/Current+Location/'+  address;
            var featuredclass=markers[i].myfeatured!=0?'featured':'';
            var redpartner=markers[i].myfeatured!=0?"<a class='redpartner-unit' href='"+redpartneruri+"'>Radar Elite Dealer</a>":"";
            html += "<div class='main-add "+featuredclass+"'>";
            html +="<div class='main-add--row'><div class='distance'>"+distance+"</div> "+redpartner+"</div>";
            html += "<h5 class='color' >"+markers[i].myname+"</h5>";
            html +=typeof(store.myphone)==='undefined'?"<div class='info-row-withicon phone'><i class='omniicon-phone'></i> <a href='tel:"+tel+"'>"+markers[i].myphone+"</a></div>":"";
            html +="<div class='info-row-withicon address'><i class='omniicon-location-pin-2'></i> "+address+"</div>";
            html +="<div class='info-row-withicon direction-row'><i class='omniicon-direction-arrow'></i> <a class='direction-link' href='"+direction+"' target='_blank'>Directions</a></div>";
            //html +="<div class='info-row-withicon link-onmap-row'><a href=javascript:myclick(" + i + ")>Show on Map</a></div>";
            html +="</div>";
            }
        }        
    }
    if (html!=="") {
        sidebar.classList.add("dealer-map--location-fill");
        sidebar.innerHTML = html
    } else {
        sidebar.classList.remove("dealer-map--location-fill");
        sidebar.innerHTML=''
    }
}

//Search results working
function codeAddress(address=null) {
    infoWindow.close();
    var address = address!==null?address:document.getElementById('autocomplete').value;
    var radius = parseFloat(document.getElementById('selectcity').value,10)*1609.34;
    geocoder.geocode( { 'address': address}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
        side_bar_html = "";
        map.setCenter(results[0].geometry.location);
        var searchCenter = results[0].geometry.location;

        if (circle) circle.setMap(null);
        circle = new google.maps.Circle({center:searchCenter,
            radius: radius,
            strokeColor: "#FF0000",
            strokeOpacity: 0,
            fillOpacity: 0.03,
            fillColor: "#FF0000",
            map: map});
        var bounds = new google.maps.LatLngBounds();
        for (var i=0; i<gmarkers.length;i++) {
            var distance_meter=google.maps.geometry.spherical.computeDistanceBetween(gmarkers[i].getPosition(),searchCenter);
            var distance_kms=distance_meter/1000;
                distance_kms=distance_kms.toFixed(2);
            var distance_miles=distance_meter/1609.34;
                distance_miles=distance_miles.toFixed(2);
            //console.log(google.maps.geometry.spherical.computeDistanceBetween(gmarkers[i].getPosition(),searchCenter)/1609.34 + 'Miles') ;
            if (distance_meter < radius) {
            bounds.extend(gmarkers[i].getPosition())
            gmarkers[i].set("mydistance", distance_kms);
            gmarkers[i].setVisible(true);
            //console.log(gmarkers[i]);
            //gmarkers[i].setMap(map);
            } else {
            //gmarkers[i].setMap(null);
            gmarkers[i].setVisible(false);
            }
        }
        //FIlter according to the distance DESC
        var visibleMarkers=gmarkers.filter(
            (marker)=>{return marker.getVisible()===true}
            );
            //sort filtered array by object key distance inside
        var markerSortedByDisance=visibleMarkers.sort(function (a, b) {
            return a.mydistance - b.mydistance;
        });
        //console.log(markerSortedByDisance);
        //Make html side
        makeSidebar(markerSortedByDisance);
        //Set zoom on circle.
        map.fitBounds(circle.getBounds())
        } else {
        // alert('Geocode was not successful for the following reason: ' + status);
        //alert('Enter Zip State or city');
        }
    });
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition((position) => {
        userslatlang = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
        };
        console.log(userslatlang);
        const circle = new google.maps.Circle({
            center: userslatlang,
            radius: position.coords.accuracy,
        });
        autocomplete.setBounds(circle.getBounds());



            geocoder.geocode( { location: userslatlang }, (results, status) => {
                if (status === "OK") {
                    if (results[0]) {
                        var address=results[0].formatted_address;
                        document.getElementById('autocomplete').value=address;
                        codeAddress(address);
                    } else {
                        window.alert("No results found");
                    }
                } else {
                        window.alert("Geocoder failed due to: " + status);
                }
            });

        });
    }
}

//initMap()
//console.log(gmarkers);