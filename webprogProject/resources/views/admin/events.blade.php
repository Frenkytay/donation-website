<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Events</title>
</head>
<body>
    <h1>Admin Panel - Events</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h2>Event List</h2>
    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Event ID</th>
                <th>Donation ID</th>
                <th>Admin</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->donation_id }}</td>
                    <td>{{ $event->admin->name ?? 'N/A' }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                    <button onclick="showEditForm({{ json_encode(['id' => $event->id, 'title' => $event->title, 'description' => $event->description, 'date' => $event->date, 'location' => $event->location]) }})">Edit</button>

                        <form action="{{ route('admin.delete_event', $event->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this event?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div id="edit-form" style="display:none; border: 1px solid #000; padding: 10px; margin-top: 20px;">
        <h2>Edit Event</h2>
        <form id="editEventForm" action="" method="POST">
            @csrf
            @method('POST')
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

            <button type="submit">Save Changes</button>
        </form>
    </div>

    <script>
        function showEditForm(eventData) {
            console.log(eventData.id)
            const form = document.getElementById('editEventForm');
            form.action = `/admin/events/${eventData.id}/update`;

            document.getElementById('title').value = eventData.title;
            document.getElementById('description').value = eventData.description;
            document.getElementById('date').value = eventData.date;
            document.getElementById('location').value = eventData.location;

            document.getElementById('edit-form').style.display = 'block';
        }
    </script>
</body>
</html>
