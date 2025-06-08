
<!-- resources/views/locations/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>All User Locations</title>
<style>
    body { font-family: Arial, sans-serif; background:#f9f9f9; padding:20px; }
    table { width: 100%; border-collapse: collapse; background: white; }
    th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
    th { background-color: #007bff; color: white; }
    tr:hover { background-color: #f1f1f1; }
</style>
</head>
<body>
    <h1>User Locations History</h1>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Timestamp</th>
                <th>View on Map</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $loc)
            <tr>
                <td>{{ $loc->user->name }}</td>
                <td>{{ $loc->latitude }}</td>
                <td>{{ $loc->longitude }}</td>
                <td>{{ $loc->created_at->format('Y-m-d H:i:s') }}</td>

                <td> <a href="{{ route('show.location', $loc->id) }}" class="text-blue-600 underline">View on Map</a></td>
               

            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
