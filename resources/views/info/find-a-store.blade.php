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
            <input type="text" id="addressInput" placeholder="LOCATION OR POSTCODE" ><br>
            <div class="mapLoader" style="display: none;"><img src="/images/loader.gif" alt="Loading..."></div>
            <div class="findBtn" onclick="searchLocations()"></div>
        </div>
        <div id="sidebar" class="gsidebar" style="display: block;">
            <div class="viewport">
              <div class="overview" id="resContent">
                <div class="result-item">
                  <span class="num">1</span><a href="#" class="reTitle">REBEL PITT ST MALL</a><address>SHOP L02 52/53, MID CITY CENTRE 197 PITT STREET, SYDNEY, NSW, AU 2000</address><address>(02) 8079 9000</address></div>
                  <div class="result-item"><span class="num">2</span><a href="#" class="reTitle">REBEL SYDNEY</a><address>77 KING STREET , SYDNEY, NSW, AU 2000</address><address>(02) 9221 8633</address></div>
                  <div class="result-item"><span class="num">3</span><a href="#" class="reTitle">THE ATHLETE'S FOOT THE GALERIES VICTORIA</a><address>SHOP RLG10 LOWER GROUND FLOOR 500 GEORGE STREET, SYDNEY, NSW, AU 2000</address><address>(02) 9283 0313</address></div>
                  <div class="result-item"><span class="num">4</span><a href="#" class="reTitle">PACE ATHLETIC KINGS CROSS</a><address>TG21, KINGS CROSS CENTRE, 82-94 DARLINGHURST ROAD, KINGS CROSS, NSW, AU 2011</address><address>(02) 9380 4702</address></div>
                  <div class="result-item"><span class="num">5</span><a href="#" class="reTitle">REBEL BROADWAY</a><address>1-21 BAY ST , BROADWAY, NSW, AU 2007</address><address>(02) 9211 5511</address></div>
                  <div class="result-item"><span class="num">6</span><a href="#" class="reTitle">THE ATHLETE'S FOOT BROADWAY</a><address>SHOP 203 BROADWAY SHOPPING CENTRE CORNER PARRAMATTA RD &amp; BAY STREET, BROADWAY, NSW, AU 2007</address><address>(02) 9211 2225</address></div>
                  <div class="result-item"><span class="num">7</span><a href="#" class="reTitle">SYDNEY RUNNING CENTRE</a><address>SHOP 11B, EDGECLIFF CENTRE 203-233 NEW SOUTH HEAD ROAD, EDGECLIFF, NSW, AU 2027</address><address>(02) 9362-0422</address></div>
                  <div class="result-item"><span class="num">8</span><a href="#" class="reTitle">THE VILLAGE SPORT</a><address>247 DARLING STREET , BALMAIN, NSW, AU 2041</address><address>(02) 9818-5909</address></div>
                  <div class="result-item"><span class="num">9</span><a href="#" class="reTitle">PACE ATHLETIC ROZELLE</a><address>634 DARLING STREET, ROZELLE, NSW, AU 2039</address><address>(02) 9555 9845</address></div>
                  <div class="result-item"><span class="num">10</span><a href="#" class="reTitle">JUST SPORT ALEXANDRIA</a><address>SHOP 6-7, 111 MC EVOY STREET , ALEXANDRIA, NSW, AU 2015</address><address>(02) 9699 9955</address></div>
                  <div class="result-item"><span class="num">11</span><a href="#" class="reTitle">RUNNING SCIENCE ROZELLE</a><address>186 VICTORIA ROAD , ROZELLE, NSW, AU 2039</address><address>(02) 9810-0032</address></div>
                  <div class="result-item"><span class="num">12</span><a href="#" class="reTitle">REBEL BONDI JUNCTION</a><address>SHOP 4062/63 WESTFIELD S/C OXFORD ST, BONDI JUNCTION, NSW, AU 2022</address><address>(02) 9389 3822</address></div>
                  <div class="result-item"><span class="num">13</span><a href="#" class="reTitle">OLYMPUS SPORTS</a><address>SHOP 17 THE GROVE 166-174 MILITARY ROAD, NEUTRAL BAY, NSW, AU 2089</address><address>(02) 9953 4522</address></div>
                  <div class="result-item"><span class="num">14</span><a href="#" class="reTitle">THE ATHLETE'S FOOT BONDI JUNCTION</a><address>SHOP 2041 BONDI WESTFIELD 500 OXFORD ST, BONDI JUNCTION, NSW, AU 2022</address><address>(02) 9389-5513</address></div>
                  <div class="result-item"><span class="num">15</span><a href="#" class="reTitle">KENSO SPORTS</a><address>212 ANZAC PARADE , KENSINGTON, NSW, AU 2033</address><address>(02) 9663 1714</address></div>
                  <div class="result-item"><span class="num">16</span><a href="#" class="reTitle">THE ATHLETE'S FOOT MOSMAN </a><address>854 MILITARY ROAD , MOSMAN, NSW, AU 2088</address><address>(02) 9969 4115</address></div>
                  <div class="result-item"><span class="num">17</span><a href="#" class="reTitle">PACE ATHLETIC MOSMAN</a><address>563 MILITARY ROAD , MOSMAN, NSW, AU 2088</address><address>(02) 9960 7986</address></div>
                  <div class="result-item"><span class="num">18</span><a href="#" class="reTitle">THE RUNNING COMPANY BONDI BEACH</a><address>72 HALL STREET , BONDI BEACH, NSW, AU 2026</address><address>(02) 9365 5485</address></div>
                  <div class="result-item"><span class="num">19</span><a href="#" class="reTitle">THE RUNNERS SHOP RANDWICK</a><address>223 CLOVELLY ROAD , CLOVELLY, NSW, AU 2031</address><address>(02) 9315 8711</address></div>
                  <div class="result-item"><span class="num">20</span><a href="#" class="reTitle">REBEL CHATSWOOD</a><address>SHOP 611, LEVEL 2 WESTFIELD S/TOWN , CHATSWOOD, NSW, AU 2067</address><address>(02) 9419 2333</address></div>
               </div>
           </div>
        </div>
        <div id="map" ></div>
</div>

</section>

    <script>
    var map;
    function initMap() {
        var sydney = {lat: -27.217116, lng: 133.567381};
        map = new google.maps.Map(document.getElementById('map'), {
            center: sydney,
            zoom: 4
        });
        var infoWindow = new google.maps.InfoWindow;
        var url = '/stores?lat=-27.217116&lng=133.567381&radius=5000';
       
        downloadUrl(url, function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
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
              text.textContent = address
              infowincontent.appendChild(text);
              var marker = new google.maps.Marker({
                map: map,
                position: point
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
        });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC50Qf6-qWyHefdnaPS_IK1H97DnlcsQF4&callback=initMap" async defer></script>


@endsection