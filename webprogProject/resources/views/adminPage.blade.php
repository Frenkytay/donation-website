<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Donations</title>
</head>
<body>
    <h1>Donations List</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Status</th>
                <th>Total Items</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Expiration Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($donations as $donation)
                <tr>
                    <td>{{ $donation->id }}</td>
                    <td>{{ $donation->user_id }}</td>
                    <td>{{ $donation->status }}</td>
                    <td>{{ $donation->total_items }}</td>
                    <td>{{ $donation->name }}</td>
                    <td>{{ $donation->quantity }}</td>
                    <td>{{ $donation->expiration_date }}</td>
                    <td>
                        <button onclick="showEventForm({{ $donation->id }})">Create Event</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="event-form" style="display:none; border: 1px solid #000; padding: 10px; margin-top: 20px;">
        <h2>Create Event</h2>
        <form action="{{ route('admin.create_event') }}" method="POST">
            @csrf
            <input type="hidden" name="donation_id" id="donation-id">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required><br><br>
            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea><br><br>
            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required><br><br>
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required><br><br>
            <button type="submit">Create Event</button>
        </form>
    </div>

    <script>
        function showEventForm(donationId) {
            document.getElementById('donation-id').value = donationId;
            document.getElementById('event-form').style.display = 'block';
        }
    </script>
</body>
</html>
