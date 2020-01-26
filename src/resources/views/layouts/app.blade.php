<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <div id="map" style="height: 500px; width: 50%; margin: 2rem auto 0;"></div>
    <button id="getcurrentlocation" style="width:100%;">現在地</button>

    <!-- jqueryの読み込む -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1TjSwmVSFwmqrGggDhVLRusq9Ha-snos&libraries=places"
    ></script>
    <!-- js -->
    <script type="text/javascript">
    var map;
    var service;
    var infowindow;
    var pyrmont = new google.maps.LatLng(-33.8665433,151.1956316);
    createMap(pyrmont)


     // 現在地取得
     document.getElementById('getcurrentlocation').onclick = function() {
      geoLocationInit();
    }

    function geoLocationInit() {
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(success, fail);

        } else {
          createMap(pyrmont);
      }
    }

   // success
   function success(position) {
     var currentLat = position.coords.latitude;
     var currentLng = position.coords.longitude;

     var pyrmont = new google.maps.LatLng(currentLat,currentLng);

     createMap(pyrmont)

     CurrentPositionMarker(pyrmont);
   }

    // fail
    function fail(pyrmont) {
      createMap(pyrmont);
    }

    function createMap(pyrmont) {

      map = new google.maps.Map(document.getElementById('map'), {
        center: pyrmont,
        zoom: 15
      });
      nearbysearch(pyrmont)
    }

    function createMarker(latlng, icn, place)
    {
      var marker = new google.maps.Marker({
        position: latlng,
        map: map
      });

      var placename = place.name;
　　　　　　　　　　// 吹き出しにカフェの名前を埋め込む
      var contentString = `<div class="sample"><p id="place_name">${placename}</p></div>`;

     // 吹き出し
      var infoWindow = new google.maps.InfoWindow({ // 吹き出しの追加
		  content:  contentString// 吹き出しに表示する内容
		});


		marker.addListener('click', function() { // マーカーをクリックしたとき
			infoWindow.open(map, marker); // 吹き出しの表示
		});

      }

    // 現在地のアイコンを表示
    function CurrentPositionMarker(pyrmont) {
        var image = 'http://i.stack.imgur.com/orZ4x.png';
        var marker = new google.maps.Marker({
                position: pyrmont,
                map: map,
                icon: image
            });
        marker.setMap(map);
    }

    // 周辺のカフェを検索
    function nearbysearch(pyrmont) {
        var request = {
          location: pyrmont,
          radius: '1500',
          type: ['cafe']
        };

        service = new google.maps.places.PlacesService(map);
        service.nearbySearch(request, callback);

        function callback(results, status) {
          if (status == google.maps.places.PlacesServiceStatus.OK) {
	　　　　　　　　//取得したカフェ情報をそれぞれcreateMarkerに入れて、マーカーを作成
            for (var i = 0; i < results.length; i++) {
              var place = results[i];
              //console.log(place)
              var latlng = place.geometry.location;
              var icn = place.icon;

              createMarker(latlng, icn, place);
            }
          }
        }
    }

    </script>


</body>
</html>
