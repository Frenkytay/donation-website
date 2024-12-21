<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Pickup</title>
</head>
<body>
    <h1>Request Pickup</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="/pick-up" method="POST">
        @csrf

       

        <label for="total_items">Total Items:</label>
        <input type="number" name="total_items" id="total_items" required>
        <br>

        <h3>Pickup Items</h3>
        <div id="items-container">
            <div class="item">
                <label for="items[0][name]">Name:</label>
                <input type="text" name="items[0][name]" required>
                <br>

                <label for="items[0][quantity]">Quantity:</label>
                <input type="number" name="items[0][quantity]" required>
                <br>

                <label for="items[0][expiration_date]">Expiration Date:</label>
                <input type="date" name="items[0][expiration_date]" required>
                <br><br>
            </div>
        </div>

        <button type="button" id="add-item">Add Item</button>
        <br><br>

        <button type="submit">Submit Pickup</button>
    </form>

    <script>
        document.getElementById('add-item').addEventListener('click', () => {
            const container = document.getElementById('items-container');
            const itemCount = container.children.length;
            const newItem = document.createElement('div');
            newItem.classList.add('item');
            newItem.innerHTML = `
                <label for="items[${itemCount}][name]">Name:</label>
                <input type="text" name="items[${itemCount}][name]" required>
                <br>
                <label for="items[${itemCount}][quantity]">Quantity:</label>
                <input type="number" name="items[${itemCount}][quantity]" required>
                <br>
                <label for="items[${itemCount}][expiration_date]">Expiration Date:</label>
                <input type="date" name="items[${itemCount}][expiration_date]" required>
                <br><br>
            `;
            container.appendChild(newItem);
        });
    </script>
</body>
</html>
