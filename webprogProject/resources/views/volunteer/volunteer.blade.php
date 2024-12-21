<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

@if (session('error'))
    <p style="color: red;">{{ session('error') }}</p>
@endif

<table border="1" cellspacing="0" cellpadding="10">
    <thead>
        <tr>
            <th>Event ID</th>
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
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->date }}</td>
                <td>{{ $event->location }}</td>
                <td>
                    <form action="{{ route('volunteer.register', $event->id) }}" method="POST">
                        @csrf
                        <button type="submit">Register</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


</body>
</html>