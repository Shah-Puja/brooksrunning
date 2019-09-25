@extends('customer.layouts.master')
@section('content')

<link rel="stylesheet" href="/css/find-store.css">

<style>
    #map {
        height: 100%;
    }
</style>

<section class="find-store wrapper">

    <div id="googleMap" style="overflow: hidden; width: 100%; height: 620px; position: relative;">    

        <div class="search_store">
            <h2>Find a retail store</h2>
            <input type="text" id="addressInput" placeholder="LOCATION" ><br>
            <div class="mapLoader" style="display: none;"><img src="/images/loader.gif" alt="Loading..."></div>
            <div class="findBtn" onclick="searchLocations()"></div>
        </div>
        <div id="sidebar" class="gsidebar" style="display: block;">
            <div class="viewport">
                <div class="overview" id="resContent"> 
                </div>
            </div>
        </div>
        <div id="map" ></div>
    </div>

</section>

<script>
    var map;
    var geocoder;
    var markersArray = [];
    function initMap() {
        geocoder = new google.maps.Geocoder();
        var sydney = {lat: -27.217116, lng: 133.567381};
        map = new google.maps.Map(document.getElementById('map'), {
            center: sydney,
            zoom: 4
        });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
                new ActiveXObject('Microsoft.XMLHTTP') :
                new XMLHttpRequest;

        request.onreadystatechange = function () {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}

    function searchLocations() {
        $(".mapLoader").show();
        var address = document.getElementById('addressInput').value;
        if(!(isNaN(address))){
            address+=" Australia";
        }  
        console.log(address);
        geocoder.geocode({'address': address , 'region': 'AU'}, function (results, status) {
            if (status == 'OK') {
                var latitude = results[0].geometry.location.lat();
                var longitude = results[0].geometry.location.lng();
                var url = '/stores?lat=' + latitude + '&lng=' + longitude + '&radius=100';

                downloadUrl(url, function (data) {

                    var infoWindow = new google.maps.InfoWindow;
                    var xml = data.responseXML;
                    var markers = xml.documentElement.getElementsByTagName('marker');
                    if (markers.length != 0) {
                        $(".store-error").hide();
                        clearOverlays();
                    } else {
                        $(".mapLoader").hide();
                        $('#resContent').html('');
                        $(".store-error").show();
                        $('#sidebar').show();
                        //alert("Location not found");
                        return false;
                    }
                    var i = 1;
                    var div_id = 0;
                    var resContent = '';
                    Array.prototype.forEach.call(markers, function (markerElem) {
                        var id = markerElem.getAttribute('id');
                        var name = markerElem.getAttribute('name');
                        var address = markerElem.getAttribute('address');
                        var type = markerElem.getAttribute('type');
                        var point = new google.maps.LatLng(
                                parseFloat(markerElem.getAttribute('lat')),
                                parseFloat(markerElem.getAttribute('lng')));

                        var infowincontent = document.createElement('div');
                        var strong = document.createElement('strong');
                        strong.textContent = name
                        infowincontent.appendChild(strong);
                        infowincontent.appendChild(document.createElement('br'));

                        var text = document.createElement('text');
                        text.textContent = address;
                        infowincontent.appendChild(text);
                        resContent += '<div class="result-item" data-id="' + div_id + '"><span class="num">' + i + '</span><a href="javascript:void(0)" class="reTitle">' + name + '</a><address>' + address + '</address></div>';
                        var marker = new google.maps.Marker({
                            map: map,
                            position: point,
                            country: 'australia',
                            icon: '/images/store-locator/locator/bg-map-results-num.png',
                            label: {text: String(i), color: 'white'},
                        });
                        markersArray.push(marker);
                        google.maps.event.addListener(marker, 'click', function () {
                            infoWindow.setContent(infowincontent);
                            infoWindow.open(map, marker);
                        });

                        i++;
                        div_id++;
                    });

                    map.setZoom(10);
                    map.setCenter(results[0].geometry.location);
                    $('#resContent').html(resContent);
                    $('#sidebar').show();
                    $(".mapLoader").hide();

                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
    function clearOverlays() {
        for (var i = 0; i < markersArray.length; i++) {
            markersArray[i].setMap(null);
        }
        markersArray.length = 0;
    }

    $(document).on('click', '.result-item', function () {
        var id = $(this).data('id');
        google.maps.event.trigger(markersArray[id], 'click');
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC50Qf6-qWyHefdnaPS_IK1H97DnlcsQF4&callback=initMap" async defer></script>
@endsection
