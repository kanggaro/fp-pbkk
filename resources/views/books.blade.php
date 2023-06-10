<!-- books.blade.php -->

<html>
<head>
    <title>Book Database</title>
</head>
<body>
    <h1>Book Database</h1>

    <form method="GET" action="{{ route('books.index') }}">
        <input type="text" name="search" placeholder="Search by book name">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>ISBN</th>
                <th>Year Released</th>
                <th>Pages</th>
                <th>Quantity</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->isbn }}</td>
                <td>{{ $book->year_released }}</td>
                <td>{{ $book->pages }}</td>
                <td>{{ $book->quantity }}</td>
                <td>{{ $book->description }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
