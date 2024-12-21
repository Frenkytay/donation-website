<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
        <h1>My Donations and Events</h1>
        @if($donations->isEmpty())
            <p>No donations have been made yet.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Donation Name</th>
                        <th>Status</th>
                        <th>Total Items</th>
                        <th>Quantity</th>
                        <th>Expiration Date</th>
                        <th>Event Title</th>
                        <th>Event Description</th>
                        <th>Event Date</th>
                        <th>Event Location</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donations as $donation)
                        <tr>
                            <td>{{ $donation->name }}</td>
                            <td>{{ ucfirst($donation->status) }}</td>
                            <td>{{ $donation->total_items }}</td>
                            <td>{{ $donation->quantity }}</td>
                            <td>{{ \Carbon\Carbon::parse($donation->expiration_date)->format('d M Y') }}</td>
                            @if ($donation->event)
                                <td>{{ $donation->event->title }}</td>
                                <td>{{ $donation->event->description }}</td>
                                <td>{{ \Carbon\Carbon::parse($donation->event->date)->format('d M Y') }}</td>
                                <td>{{ $donation->event->location }}</td>
                            @else
                                <td colspan="4">No event registered for this donation.</td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>