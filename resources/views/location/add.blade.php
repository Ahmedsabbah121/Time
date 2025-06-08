<!-- resources/views/send-location.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Send Your Location</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 14px 25px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-top: 15px;
            font-size: 14px;
            color: green;
            min-height: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Send Your Location</h1>
        <button onclick="sendLocation()">Send My Location</button>
        <div class="message" id="msg"></div>
    </div>

<script>
function sendLocation() {
    const msg = document.getElementById('msg');
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            const data = {
                latitude: position.coords.latitude,
                longitude: position.coords.longitude
            };

            fetch('/store-location', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                msg.textContent = 'Location sent successfully!';
                msg.style.color = 'green';
            })
            .catch(error => {
                msg.textContent = 'Error sending location.';
                msg.style.color = 'red';
            });
        }, function() {
            msg.textContent = 'Unable to retrieve your location.';
            msg.style.color = 'red';
        });
    } else {
        msg.textContent = "Geolocation is not supported by this browser.";
        msg.style.color = 'red';
    }
}
</script>
</body>
</html>
