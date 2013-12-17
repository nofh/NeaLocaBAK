var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;
var maison  = new google.maps.LatLng(40.384066,23.921043);
var village = new google.maps.LatLng(40.380895,23.923801);
var region  = new google.maps.LatLng(40.327702,23.595457);

function initNearoda()
{
    initialize(maison, 15);
}

function initAcces()
{
    initialize(maison, 15);
    calcRoute('Thessalonique, Greece');
}


function initRegion()
{
    initialize(region, 8);
    afficheRegion();
}
function initVillage(cis)
{
    initialize(village, 15);
    centreInterets(cis);
}

function initialize(endroit, tailleZoom ) {
  directionsDisplay = new google.maps.DirectionsRenderer();
  var mapOptions = {
    zoom: tailleZoom,
    center: endroit,
    panControl: true,
    zoomControl: true,
    scaleControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
  directionsDisplay.setMap(map);
  
  // marker de la maison
  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading">NOM</h1>'+
      '<div id="bodyContent">'+
      '<p>ADRESSE <br/> TEL <br /> ETC <br /></p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString,
      maxWidth: 300
  });

  var marker = new google.maps.Marker({
      position: maison,
      map: map,
      title: 'NOM'
  });

  // listerner du marker
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });

}

function calcRoute(start) {
  var request = {
      origin:start,
      destination:maison,
      travelMode: google.maps.DirectionsTravelMode.DRIVING
  };
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });

 /* calcule des distances */
  calculateDistances(start);
}

function calculateDistances(start) {
  var service = new google.maps.DistanceMatrixService();
  service.getDistanceMatrix(
    {
      origins: [start],
      destinations: [maison],
      travelMode: google.maps.TravelMode.DRIVING,
      unitSystem: google.maps.UnitSystem.METRIC,
      avoidHighways: false,
      avoidTolls: false
    }, callback);

}

function callback(response, status) 
{
  if (status != google.maps.DistanceMatrixStatus.OK) 
  {
    alert('Error was: ' + status);
  } 
  else 
  {
    // preparation de l'info recuperer pour l'affichage
    var origins = response.originAddresses;
    var destinations = response.destinationAddresses;
    for (var i = 0; i < origins.length; i++) 
    {
      var results = response.rows[i].elements;
      for (var j = 0; j < results.length; j++)
      {
    
        var element = results[j];
        var distance = element.distance.text;
        var duration = element.duration.text;
        var from = origins[i];
        var to = destinations[j];
        
        var infos = [from, to, distance, duration];
        // affichage
        var elements = document.getElementById("distances").getElementsByTagName("tr");
        for ( var k = 0; k < elements.length; k++)
        {
            var aRemplacer = elements.item(k).getElementsByTagName("td");
            for ( var l = 0; l < aRemplacer.length; l++)
            {
                aRemplacer.item(l).innerHTML = infos[l];
            }
        }
      }
    }
  }
}

/* affichage de la region */
function afficheRegion()
{
    // Define the LatLng coordinates for the polygon's path.
  var regionCoordonnees = [
    new google.maps.LatLng(  40.32142,23.01213), 
    new google.maps.LatLng( 40.257521,23.194671 ),
    new google.maps.LatLng( 40.230267,23.305328 ),
    new google.maps.LatLng( 40.181496,23.324554 ),
    new google.maps.LatLng(  40.098559,23.305328),
    new google.maps.LatLng(  40.079648,23.311508),
    new google.maps.LatLng( 40.056001,23.341033 ),
    new google.maps.LatLng(  40.002898,23.381546),
    new google.maps.LatLng(  39.954491,23.355453),
    new google.maps.LatLng(  39.96028,23.415878),
    new google.maps.LatLng(  39.951859,23.509948),
    new google.maps.LatLng(  39.904469,23.627365),
    new google.maps.LatLng( 39.903416,23.713249),
    new google.maps.LatLng(  39.91553,23.759598),
    new google.maps.LatLng(  39.929221,23.762634),
    new google.maps.LatLng(39.936724,23.695595),
    new google.maps.LatLng( 39.984092,23.683063),
    new google.maps.LatLng(  40.00395,23.567626),
    new google.maps.LatLng(  40.050745,23.473556),
    new google.maps.LatLng(  40.110638,23.430984),
    new google.maps.LatLng(  40.14424,23.395278),
    new google.maps.LatLng(  40.182021,23.349273),
    new google.maps.LatLng( 40.218208,23.334854),
    new google.maps.LatLng( 40.273239,23.385665 ),
    new google.maps.LatLng(  40.260141,23.477676),
    new google.maps.LatLng(  40.231315,23.542221),
    new google.maps.LatLng(  40.198806,23.67749),
    new google.maps.LatLng(  40.060731,23.78598),
    new google.maps.LatLng(  40.00132,23.823745),
    new google.maps.LatLng(  39.929748,23.930862),
    new google.maps.LatLng(  39.949227,24.00296),
    new google.maps.LatLng( 40.030769,24.031799 ), 
    new google.maps.LatLng( 40.108013,24.001586 ), 
    new google.maps.LatLng(  40.162608,23.922622), 
    new google.maps.LatLng(  40.240226,23.78186), 
    new google.maps.LatLng( 40.283192,23.707702 ), 
    new google.maps.LatLng( 40.343404,23.847778 ), 
    new google.maps.LatLng(  40.30676,23.903396), 
    new google.maps.LatLng(  40.276906,24.110763), 
    new google.maps.LatLng(  40.10171,24.290664), 
    new google.maps.LatLng(  40.14214,24.430053), 
    /* fin athos */
    new google.maps.LatLng( 40.323514,24.268584 ), 
    new google.maps.LatLng( 40.37689,24.157348 ), 
    new google.maps.LatLng( 40.464711,24.006286 ), 
    new google.maps.LatLng( 40.552418,23.926635 ), 
    new google.maps.LatLng( 40.605091,23.808639 ), 
    new google.maps.LatLng(  40.636362,23.770874), 
    new google.maps.LatLng(  40.641573,23.662384), 
    new google.maps.LatLng(  40.605091,23.632858), 
    new google.maps.LatLng(  40.603527,23.545654), 
    new google.maps.LatLng(  40.571719,23.498962), 
    new google.maps.LatLng(  40.588407,23.407638), 
    new google.maps.LatLng(  40.536242,23.312194), 
    new google.maps.LatLng( 40.486649,23.299148 ), 
    new google.maps.LatLng(  40.480904,23.159072), 
    new google.maps.LatLng( 40.370089,23.11856 ), 
    new google.maps.LatLng( 40.351777,23.00801 ), 
    new google.maps.LatLng(  40.32142,23.01213)
  ];

  // Construct the polygon.
  var region = new google.maps.Polygon({
    paths: regionCoordonnees,
    strokeColor: '#FF0000',
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#FF0000',
    fillOpacity: 0.35
  });

  region.setMap(map);
}

function afficheVillesVoisine()
{
    initialize(village, 11);
    var ouranopolis = new google.maps.LatLng( 40.326213,23.981477);
    var ierissos = new google.maps.LatLng( 40.397647,23.877104);
    var villes = [ ouranopolis, ierissos];
    for ( var i = 0; i < villes.length; i++)
    {
        var marker = new google.maps.Marker({
            position: villes[i],
            map: map,
        });
    }
}
/* marker pour centre d'interet */
var markers = new Array();

function centreInterets(cis)
{
    console.log('base ' + cis);
    var interets = new Array();
    for ( var i = 0; i < cis.length; i++ )
    {
        var ci = cis[i];
        console.log('degre 1 ' + ci );
        for ( var j = 0; j < ci.length; j++)
        {
            console.log(' valeur ' + ci[j]['latitude'] );
            interets.push( new Array( new google.maps.LatLng( ci[j]['latitude'], ci[j]['longitude'] ), ci[j]['categorie'], ci[j]['urlicon']));
        } 
    }
    console.log(interets);
    /*
    interets.push( new Array( new google.maps.LatLng(40.381075,23.923842 ), "centre", "http://placehold.it/25x30&text=icon"));

    interets.push( new Array( new google.maps.LatLng(40.381826,23.933584 ), "port", "http://placehold.it/25x30&text=icon"));

    interets.push( new Array( new google.maps.LatLng( 40.381924,23.921868), "magasins", "http://placehold.it/25x30&text=icon"));
    interets.push( new Array( new google.maps.LatLng( 40.380813,23.92264), "magasins", "http://placehold.it/25x30&text=icon"));
    interets.push( new Array( new google.maps.LatLng( 40.380797,23.925752), "magasins", "http://placehold.it/25x30&text=icon"));
    interets.push( new Array( new google.maps.LatLng( 40.379015,23.925816), "magasins", "http://placehold.it/25x30&text=icon"));
    interets.push( new Array( new google.maps.LatLng( 40.380045,23.922082), "magasins", "http://placehold.it/25x30&text=icon"));

    interets.push( new Array( new google.maps.LatLng( 40.38315,23.923434), "resto", "http://placehold.it/25x30&text=icon"));
    interets.push( new Array( new google.maps.LatLng( 40.38284,23.924507), "resto", "http://placehold.it/25x30&text=icon"));
    interets.push( new Array( new google.maps.LatLng( 40.381516,23.927189), "resto", "http://placehold.it/25x30&text=icon"));
    interets.push( new Array( new google.maps.LatLng( 40.382497,23.924829), "resto", "http://placehold.it/25x30&text=icon"));
    interets.push( new Array( new google.maps.LatLng( 40.383199,23.923606), "resto", "http://placehold.it/25x30&text=icon"));

    interets.push( new Array( new google.maps.LatLng( 40.379227,23.922533), "essence", "http://placehold.it/25x30&text=icon"));

    interets.push( new Array( new google.maps.LatLng(40.38011,23.924207 ), "boulangerie", "http://placehold.it/25x30&text=icon"));
    */

// creation 
    for ( var i = 0; i < interets.length; i++)
    {
        var interet = interets[i];
            var tmp = new google.maps.Marker({ 
                position: interet[0],
               // map: map,
                icon: interet[2] }); 
            markers.push( new Array( tmp, interet[1]) );
    }
}
function affichageCentreInterets(categorie)
{
// aff selectif 
    for ( var i = 0; i < markers.length; i++)
    {
       var marker = markers[i];
        if ( marker[1] == categorie )
        {
            marker[0].setMap(map);
        }
        else
        {
            //alert('nettoie');
            marker[0].setMap(null);
        }
    }
}
google.maps.event.addDomListener(window, 'load', initNearoda);
