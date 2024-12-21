<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1>My Registered Events</h1>

    @if($registeredEvents->isEmpty())
        <p>You have not registered for any events yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Registered At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registeredEvents as $eventDetail)
                    <tr>
                    <td>{{ $eventDetail->event->title }}</td>
                    <td>{{ $eventDetail->event->description }}</td>
                    <td>{{ \Carbon\Carbon::parse($eventDetail->event->date)->format('d M Y') }}</td>
                    <td>{{ $eventDetail->event->location }}</td>
                    <td>{{ \Carbon\Carbon::parse($eventDetail->created_at)->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

</html>