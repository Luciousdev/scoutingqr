<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>CP</title>
    <style>
        body {
            background-color: #c1c1c1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>All items</h1>
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <th>Alias</th>
                        <th>Text</th>
                    </tr>
                    @foreach ($data as $entry)
                        <tr>
                            <td>{{ $entry->id }}</td>
                            <td>{{ $entry->alias }}</td>
                            <td>{{ $entry->text }}</td>
                            <td>
                                <form action="{{ route('generate.qr') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="text" value="127.0.0.1:8000/entries/{{ $entry->alias }}">
                                    <button type="submit" class="btn btn-success">Generate QR</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
        <div style="padding-top:20vh"></div>
        <div class="row">
            <div class="col">
                <h1>Add item</h1>
                <form action="/create-entry" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="alias" class="form-label">Alias</label>
                        <input type="text" class="form-control" id="alias" name="alias">
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Text</label>
                        <input type="text" class="form-control" id="text" name="text">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="/logout">Uitloggen</a>
            </div>
        </div>
    </div>
</body>
</html>
