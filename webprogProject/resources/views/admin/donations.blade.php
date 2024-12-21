<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Donations and Events</title>
</head>
<body>
    <h1>Admin Panel</h1>

    <!-- Success Message -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Error Messages -->
    @if ($errors->any())
        <div style="color: red;">
            <h3>There were some errors with your submission:</h3>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h2>Donations</h2>
    <h2><a href="/admin/event">Event</a></h2>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Status</th>
                <th>Total Items</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Expiration Date</th>
                <th>Update Status</th>
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
                        <!-- Form to Update Status -->
                        <form action="{{ route('admin.update_donation_status', $donation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <select name="status" required>
                                <option value="pending" {{ $donation->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ $donation->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="completed" {{ $donation->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="rejected" {{ $donation->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td>
                        <button onclick="showEventForm({{ $donation->id }})">Create Event</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Event Creation Form -->
    <div id="event-form" style="display:none; border: 1px solid #000; padding: 10px; margin-top: 20px;">
        <h2>Create Event</h2>
        <form action="{{ route('admin.create_event') }}" method="POST">
            @csrf
            <input type="hidden" name="donation_id" id="donation-id">

            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required>
            <br><br>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea>
            <br><br>

            <label for="date">Date:</label>
            <input type="date" name="date" id="date" required>
            <br><br>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>
            <br><br>

            <button type="submit">Create Event</button>
        </form>
    </div>

    <script>
        /**
         * Function to show the event creation form.
         * @param {Number} donationId - The ID of the donation.
         */
        function showEventForm(donationId) {
            const donationInput = document.getElementById('donation-id');
            const eventForm = document.getElementById('event-form');

            if (!donationId) {
                alert('Error: Donation ID is missing!');
                return;
            }

            donationInput.value = donationId;
            eventForm.style.display = 'block';
        }
    </script>
</body>
</html>
