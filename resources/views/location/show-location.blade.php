<!-- resources/views/show-location.blade.php -->
<!DOCTYPE html>
<html lang="en">
<<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User Location Map</title>

    <link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
/>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f9fc;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .info {
            padding: 15px 20px;
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            text-align: center;
            font-size: 18px;
            color: #333;
            font-weight: 600;
        }

        #map {
            height: 80vh; /* الخريطة تشغل 60% من ارتفاع الشاشة */
            width: 100%;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin-top: 10px;
        }

        .btn-back {
            margin: 20px auto;
            padding: 12px 30px;
            font-size: 16px;
            background-color: #4f46e5; /* لون أزرق جميل */
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(79, 70, 229, 0.3);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            max-width: 200px;
            text-align: center;
            display: block;
        }

        .btn-back:hover {
            background-color: #3730a3;
            box-shadow: 0 6px 12px rgba(55, 48, 163, 0.6);
        }
    </style>
</head>
<body>
    <div class="info">
        User: {{ $userName ?? 'Unknown User' }} <br/>
        Event Time: {{ $timestamp ?? 'Unknown Time' }}
    </div>


    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
<div id="map"></div>
<!-- <button class="btn-back" onclick="window.history.back();">Back</button> -->
<button class="btn-back" onclick="window.history.back();">Back</button>
    <div id="map"></div>

    <script>
    const latitude = @json($latitude ?? 30.0444);
    const longitude = @json($longitude ?? 31.2357);

    const map = L.map('map').setView([latitude, longitude], 15);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    L.marker([latitude, longitude]).addTo(map)
        .bindPopup('User Location')
        .openPopup();
</script>


</body>
</html>
