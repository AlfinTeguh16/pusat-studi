<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV File Upload</title>
</head>
<body>
    <h2>CSV File Upload</h2>

    @if(session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('import.users') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="file">Choose CSV File:</label>
        <input type="file" name="file" accept=".csv, .txt" required>
        <br>
        <button type="submit">Import Users</button>
    </form>
</body>
</html>
